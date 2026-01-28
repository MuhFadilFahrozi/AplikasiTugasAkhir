<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function room_details($id)
    {
        
        $room = Room::find($id);

        return view('home.room_details',compact('room'));
    }

    public function add_booking(Request $request, $id)
{
    // Validasi input tanggal dan waktu
    $request->validate([
        'startDate' => 'required|date',
        'endDate'   => 'required|date|after_or_equal:startDate',
        'startTime' => 'required',
        'endTime'   => 'required|after:startTime',
        'participants' => 'required|integer|min:1'
    ]);

    $room = Room::find($id);

    // 🔴 Cek kapasitas
    if ($room && $request->participants > $room->capacity) {
        return redirect()->back()->with('error', 
            'Jumlah peserta (' . $request->participants . ') melebihi kapasitas ruangan (' . $room->capacity . ').');
    }

    // 🔴 Cek bentrok jadwal di database
    $isConflict = Booking::where('room_id', $id)
        ->whereDate('start_date', $request->startDate)
        ->where(function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('start_time', '<', $request->endTime)
                  ->where('end_time', '>', $request->startTime);
            });
        })
        ->whereIn('status', ['waiting', 'Di Setujui']) // hanya bentrok dengan booking aktif
        ->exists();

    if ($isConflict) {
        return redirect()->back()->with('error', 
            'Ruangan sudah dibooking pada jam ' . $request->startTime . ' - ' . $request->endTime . ' di tanggal tersebut.');
    }

    // Jika tidak bentrok → simpan booking
    $data = new Booking;
    $data->room_id = $id;
    $data->name = $request->name;
    $data->nim = $request->nim;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->participants = $request->participants;
    $data->start_date = $request->startDate;
    $data->end_date = $request->endDate;
    $data->start_time = $request->startTime;
    $data->end_time = $request->endTime;
    $data->status = 'waiting';
    $data->save();

    return redirect()->back()->with('success', 'Booking berhasil! Menunggu persetujuan admin.');
}



    public function showContactForm()
    {
        return view('home.contact');
    }

    public function contact(Request $request)
    {
        // Validasi data form
        $request->validate([
            'name'    => 'required|string|max:255',
            'nim'   => 'required|varchar|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        $contact = new Contact;
        $contact->name    = $request->name;
        $contact->nim    = $request->nim;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('message', 'Pesan berhasil dikirim!');
    }

public function bookings()
{
    $userEmail = Auth::user()->email;
    
    // GANTI ->get() jadi ->paginate(10)
    $data = Booking::with('room')
        ->where('email', $userEmail)
        ->orderBy('created_at', 'desc')
        ->paginate(10);  // ← INI YANG PENTING!

    // Calculate statistics
    $totalBookings = Booking::where('email', $userEmail)->count();
    $approvedCount = Booking::where('email', $userEmail)->where('status', 'Di Setujui')->count();
    $rejectedCount = Booking::where('email', $userEmail)->where('status', 'Di Tolak')->count();
    $waitingCount = Booking::where('email', $userEmail)->where('status', 'waiting')->count();

    return view('home.booking', compact(
        'data',
        'totalBookings',
        'approvedCount',
        'rejectedCount',
        'waitingCount'
    ));
}

    public function delete_booking($id)
    {

        $data = Booking::find($id);

        $data->delete();

        return redirect()->back();
    }


    public function approve_book($id)
    {
        $booking = Booking::find($id);

        $booking->status='Di Setujui';
        $booking->save();

        return redirect()->back();

    }


    public function reject_book($id)
    {
        $booking = Booking::find($id);

        $booking->status='Di Tolak';
        $booking->save();

        return redirect()->back();

    }

    public function checkAvailability($id, Request $request)
{
    $startDate = $request->startDate;
    $endDate = $request->endDate;
    $startTime = $request->startTime;
    $endTime = $request->endTime;

    $booked = Booking::where('room_id', $id)
        ->where(function ($query) use ($startDate, $endDate, $startTime, $endTime) {
            $query->where(function ($q) use ($startDate, $endDate, $startTime, $endTime) {
                $q->where('startDate', '<=', $endDate)
                  ->where('endDate', '>=', $startDate)
                  ->where('startTime', '<', $endTime)
                  ->where('endTime', '>', $startTime);
            });
        })
        ->exists();

    if ($booked) {
        return response()->json(['available' => false]);
    } else {
        return response()->json(['available' => true]);
    }
}

public function getRoomBookings($id)
{
    $bookings = Booking::where('room_id', $id)
        ->whereIn('status', ['waiting', 'Di Setujui']) // hanya booking aktif
        ->get(['name', 'start_date', 'end_date', 'start_time', 'end_time', 'status']);

    $events = $bookings->map(function ($booking) {
        // Warna sesuai status
        $color = match ($booking->status) {
            'Di Setujui' => '#28a745', // hijau
            'waiting'    => '#ffc107', // kuning
            default      => '#dc3545', // merah
        };

        return [
            'title' => $booking->name, // tampilkan nama peminjam di kalender
            'start' => $booking->start_date . 'T' . $booking->start_time, // format lengkap
            'end'   => $booking->end_date . 'T' . $booking->end_time,
            'color' => $color,
            'textColor' => 'white',
            'extendedProps' => [
                'start_time' => $booking->start_time,
                'end_time'   => $booking->end_time,
                'status'     => $booking->status,
            ],
        ];
    });

    return response()->json($events);
}


public function exportJadwalPDF($id)
{
    $data = Booking::with('room')->findOrFail($id);

    if (!$data) {
        abort(404, 'Data peminjaman tidak ditemukan');
    }

    $pdf = Pdf::loadView('home.cetak_jadwal_pdf', ['data' => $data])
        ->setPaper('a4', 'portrait')
        ->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif'
        ]);
    
    return $pdf->download('jadwal_peminjaman_'.$data->id.'.pdf');
}

// Tambahkan 3 method ini di bawah method exportJadwalPDF()

/**
 * Display booking history with filters and pagination
 */
public function history(Request $request)
{
    $user = Auth::user();
    
    $query = Booking::with('room')
        ->where('email', $user->email);

    // Search filter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('nim', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhereHas('room', function($q) use ($search) {
                  $q->where('room_title', 'like', "%{$search}%");
              });
        });
    }

    // Status filter
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Date range filter
    if ($request->filled('start_date')) {
        $query->where('start_date', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->where('end_date', '<=', $request->end_date);
    }

    // Get paginated data
    $data = $query->orderBy('created_at', 'desc')->paginate(10);

    // Calculate statistics
    $totalBookings = Booking::where('email', $user->email)->count();
    $approvedCount = Booking::where('email', $user->email)->where('status', 'Di Setujui')->count();
    $rejectedCount = Booking::where('email', $user->email)->where('status', 'Di Tolak')->count();
    $waitingCount = Booking::where('email', $user->email)->where('status', 'waiting')->count();

    return view('home.history', compact(
        'data',
        'totalBookings',
        'approvedCount',
        'rejectedCount',
        'waitingCount'
    ));
}

/**
 * Get booking detail for modal
 */
public function getBookingDetail($id)
{
    $user = Auth::user();
    
    $booking = Booking::with('room')
        ->where('id', $id)
        ->where('email', $user->email)
        ->firstOrFail();

    return response()->json($booking);
}

/**
 * Cancel booking (only for "waiting" status)
 */
public function cancelBooking($id)
{
    $user = Auth::user();
    
    $booking = Booking::where('id', $id)
        ->where('email', $user->email)
        ->firstOrFail();

    if ($booking->status !== 'waiting' && $booking->status !== 'Menunggu') {
        return response()->json([
            'success' => false,
            'message' => 'Hanya peminjaman dengan status "Menunggu" yang dapat dibatalkan.'
        ], 400);
    }

    $booking->delete();

    return response()->json([
        'success' => true,
        'message' => 'Peminjaman berhasil dibatalkan.'
    ]);
}




}
