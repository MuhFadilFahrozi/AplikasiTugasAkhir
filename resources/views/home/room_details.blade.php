<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ruangan - {{$room->room_title}}</title>
    
    <base href="/public">
    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- FullCalendar -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet'/>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-color: #004aad;
            --secondary-color: #f8f9fa;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-content {
            min-height: calc(100vh - 200px);
        }
        
        .page-title {
            margin-bottom: 2rem;
        }
        
        .page-title h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-title p {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .booking-card {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            height: 100%;
            transition: transform 0.3s ease;
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
        }
        
        .room-image {
            border-radius: var(--border-radius);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        .room-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        
        .room-details h3 {
            color: #333;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .room-details .capacity {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .room-details .facilities {
            color: #6c757d;
            line-height: 1.6;
        }
        
        #calendar {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 1.5rem;
        }
        
        .form-container {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
        }
        
        .form-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.75rem;
            width: 100%;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 74, 173, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            font-weight: 600;
            padding: 0.75rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #003a8c;
            border-color: #003a8c;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .room-image img {
                height: 250px;
            }
        }
        
        @media (max-width: 768px) {
            .booking-card, .form-container {
                padding: 1rem;
            }
            
            .page-title h2 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body class="main-layout">
<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#"/></div>
</div>

<header>
    @include('home.header')
</header>

<div class="main-content py-5">
    <div class="container">
            <div class="titlepage">
               <h2 class="fw-bold mb-3 text-primary">Ruangan Yang Tersedia</h2>
               <p class="text-muted fs-5">
                  Ruangan dan Aula yang tersedia di Kampus Universitas Dian Nuswantoro Semarang
               </p>
            </div>

        <div class="row g-4">
            <!-- Detail Ruangan -->
            <div class="col-lg-8">
                <div class="booking-card">
                    <div class="room-image">
                        <img src="/room/{{$room->image}}" alt="{{$room->room_title}}" class="img-fluid">
                    </div>
                    <div class="room-details">
                        <h3>{{$room->room_title}}</h3>
                        <div class="capacity">Kapasitas: {{$room->capacity ?? 'Belum Ditentukan'}} orang</div>
                        <p class="facilities">{{$room->facilities}}</p>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-lg-4">
                <div class="form-container">
                    <h4 class="form-title">Booking Ruangan</h4>

                    <form action="{{url('add_booking',$room->id)}}" method="POST" id="bookingForm">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="number" name="phone" id="phone" class="form-control"
                                @if(Auth::id()) value="{{Auth::user()->phone}}" @endif required>
                        </div>

                        <div class="form-group">
                            <label for="participants" class="form-label">Jumlah Peserta</label>
                            <input type="number" name="participants" id="participants" class="form-control" 
                                min="1" placeholder="Masukkan jumlah peserta" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startDate" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="startDate" id="startDate" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="endDate" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="endDate" id="endDate" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startTime" class="form-label">Jam Mulai</label>
                                    <input type="time" name="startTime" id="startTime" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="endTime" class="form-label">Jam Selesai</label>
                                    <input type="time" name="endTime" id="endTime" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Book Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.footer')

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

<script>
    $(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#startDate').attr('min', maxDate);
    $('#endDate').attr('min', maxDate);

});
    let bookedEvents = [];

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const roomId = "{{ $room->id }}";

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: `/room-bookings/${roomId}`,
            eventDisplay: 'block',
            height: 450,
            selectable: true,

            eventDidMount: function(info) {
                const { start_time, end_time, status } = info.event.extendedProps;
                $(info.el).attr('title', `${info.event.title}\nStatus: ${status}\nWaktu: ${start_time} - ${end_time}`);
            },

            eventsSet: function(events) {
                bookedEvents = events.map(e => ({
                    title: e.title,
                    start: e.startStr,
                    end: e.endStr,
                    startTime: e.extendedProps.start_time,
                    endTime: e.extendedProps.end_time,
                    status: e.extendedProps.status
                }));
            },

            dateClick: function (info) {
    const clickedDate = info.dateStr;
    const today = new Date();
    today.setHours(0,0,0,0); // Hapus jam agar perbandingan hanya tanggal

    // 🔒 Cegah klik tanggal yang sudah lewat
    if (info.date < today) {
        Swal.fire({
            icon: 'warning',
            title: 'Tanggal Tidak Bisa Dipilih!',
            text: 'Anda tidak dapat melakukan booking untuk tanggal yang sudah lewat.',
            timer: 2000,
            showConfirmButton: false
        });
        return; // hentikan proses klik
    }

    // Lanjutkan logika yang sudah kamu punya
    const bookingsToday = bookedEvents.filter(event => event.start.includes(clickedDate));

    if (bookingsToday.length > 0) {
        let htmlList = bookingsToday.map(b => `
            <div style="text-align:left; margin-bottom:8px;">
                <b>${b.title}</b><br>
                🕓 ${b.startTime} - ${b.endTime}<br>
                📌 <span style="color:${b.status === 'Di Setujui' ? '#28a745' : '#ffc107'}">
                    ${b.status}
                </span>
            </div>
        `).join('<hr>');

        Swal.fire({
            title: `📅 Jadwal Booking (${clickedDate})`,
            html: `<div style="max-height:300px; overflow-y:auto;">${htmlList}</div>`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Pilih Tanggal Ini',
            cancelButtonText: 'Tutup'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#startDate').val(clickedDate);
                $('#endDate').val(clickedDate);
                Swal.fire({
                    icon: 'success',
                    title: 'Tanggal Dipilih!',
                    text: 'Silakan isi jam dan lanjutkan booking.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    } else {
        $('#startDate').val(clickedDate);
        $('#endDate').val(clickedDate);
        Swal.fire({
            icon: 'success',
            title: 'Tanggal Kosong!',
            text: 'Belum ada booking di tanggal ini, silakan pesan!',
            timer: 2000,
            showConfirmButton: false
        });
    }
}

        });

        calendar.render();
    });

    // Validasi sebelum submit (masih sama seperti sebelumnya)
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const participants = parseInt(document.getElementById('participants').value);
        const capacity = {{ $room->capacity ?? 0 }};
        const startDate = document.getElementById('startDate').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;

        if (capacity > 0 && participants > capacity) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Jumlah Peserta Melebihi Kapasitas!',
                text: `Jumlah peserta (${participants}) melebihi kapasitas ruangan (${capacity}).`,
                showConfirmButton: true
            });
            return;
        }

        const hasConflict = bookedEvents.some(event => {
            const sameDate = event.start.includes(startDate);
            if (!sameDate) return false;
            return (startTime < event.endTime && endTime > event.startTime);
        });

        if (hasConflict) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Bentrok Jadwal!',
                text: 'Jam yang Anda pilih sudah terpakai di tanggal tersebut.',
                showConfirmButton: true
            });
        }
    });

    // Notifikasi Laravel
    @if(session()->has('success'))
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: "{{ session()->get('success') }}", timer: 2000, showConfirmButton: false });
    @endif

    @if(session()->has('error'))
        Swal.fire({ icon: 'error', title: 'Gagal!', text: "{{ session()->get('error') }}", showConfirmButton: true });
    @endif
</script>

</body>
</html>