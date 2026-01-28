<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class AdminController extends Controller
{
    // 🔹 Dashboard Redirect Logic
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->usertype === 'user') {
            $room = Room::all();
            return view('home.index', compact('room'));
        }

        if ($user->usertype === 'admin') {
            return view('admin.index');
        }

        return redirect()->back();
    }

    // 🔹 Landing Page
    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    // 🔹 CRUD Room
    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $request->validate([
            'room_title' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'facilities' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = new Room();
        $data->room_title = $request->room_title;
        $data->capacity = $request->capacity;
        $data->facilities = implode(', ', $request->facilities ?? []);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Ruangan berhasil ditambahkan!');
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function room_update($id)
    {
        $data = Room::findOrFail($id);
        return view('admin.update_room', compact('data'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::findOrFail($id);

        $data->room_title = $request->room_title;
        $data->capacity = $request->capacity;
        $data->facilities = implode(', ', $request->facilities ?? []);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($data->image && file_exists(public_path('room/' . $data->image))) {
                unlink(public_path('room/' . $data->image));
            }

            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Data ruangan berhasil diperbarui!');
    }

    public function room_delete($id)
    {
        $data = Room::findOrFail($id);

        if ($data->image && file_exists(public_path('room/' . $data->image))) {
            unlink(public_path('room/' . $data->image));
        }

        $data->delete();
        return redirect()->back()->with('message', 'Ruangan berhasil dihapus!');
    }

    // 🔹 Booking Management
    public function bookings()
    {
        $data = Booking::with('room')->get();
        $rooms = Room::all();

        return view('admin.booking', compact('data', 'rooms'));
    }

    public function delete_booking($id)
    {
        $data = Booking::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Data booking berhasil dihapus!');
    }

    public function approve_book($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Di Setujui';
        $booking->save();

        return redirect()->back()->with('message', 'Booking telah disetujui!');
    }


    public function reject_book(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Di Tolak';
        

        if ($request->has('rejection_note')) {
            $booking->admin_notes = $request->input('rejection_note');
        }
        
        $booking->save();


        return redirect()->back()->with('message', 'Booking telah ditolak!');
    }

    // 🔹 Pesan Masuk
    public function all_messages()
    {
        $data = Contact::all();
        return view('admin.all_messages', compact('data'));
    }

    // 🔹 Debug Routes (Optional - bisa dihapus di production)
    public function listRoutes()
    {
        $routes = \Route::getRoutes()->getRoutesByName();
        return response()->json([
            'reject_book_route' => route('reject_book', ['id' => 'test']),
            'available_routes' => array_keys($routes)
        ]);
    }
}