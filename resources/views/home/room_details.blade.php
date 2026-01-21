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
            --approved-color: #28a745;
            --pending-color: #ffc107;
            --rejected-color: #dc3545;
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
        
        /* 🆕 IMPROVEMENT 4: Availability Badge - Moved above calendar */
        .availability-badge {
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            margin-bottom: 15px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .availability-badge.available {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
        }
        
        .availability-badge.conflict {
            background: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
        }
        
        .availability-badge.checking {
            background: #fff3cd;
            border: 2px solid #ffc107;
            color: #856404;
        }
        
        .badge-icon {
            font-size: 1.2rem;
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
        
        /* 🆕 IMPROVEMENT 2: Calendar Legend */
        .calendar-legend {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-color);
        }
        
        .calendar-legend h5 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }
        
        .legend-items {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
        }
        
        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 3px;
            display: inline-block;
        }
        
        .legend-color.approved {
            background-color: var(--approved-color);
        }
        
        .legend-color.pending {
            background-color: var(--pending-color);
        }
        
        .legend-color.rejected {
            background-color: var(--rejected-color);
        }
        
        /* 🆕 IMPROVEMENT 2: Event Color Coding */
        .fc-event {
            border: none !important;
            border-radius: 4px !important;
        }
        
        .fc-event.status-approved {
            background-color: var(--approved-color) !important;
        }
        
        .fc-event.status-pending {
            background-color: var(--pending-color) !important;
            color: #333 !important;
        }
        
        .fc-event.status-rejected {
            background-color: var(--rejected-color) !important;
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
        
        /* 🆕 IMPROVEMENT 1: Operational Hours Info */
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid var(--primary-color);
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        
        .info-box .icon {
            color: var(--primary-color);
            margin-right: 8px;
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
            
            .legend-items {
                flex-direction: column;
                gap: 8px;
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
                    
                    <!-- 🆕 IMPROVEMENT 2: Legend -->
                    <div class="calendar-legend">
                        <h5>📌 Keterangan Status Booking</h5>
                        <div class="legend-items">
                            <div class="legend-item">
                                <span class="legend-color approved"></span>
                                <span>Disetujui</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color pending"></span>
                                <span>Menunggu Persetujuan</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color rejected"></span>
                                <span>Ditolak</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 🆕 IMPROVEMENT 4: Availability Badge - Moved above calendar -->
                    <div class="availability-badge checking" id="availabilityBadge">
                        <span class="badge-icon" id="badgeIcon">⏱️</span>
                        <span id="badgeText">Pilih Tanggal & Waktu untuk Cek Ketersediaan</span>
                    </div>
                    
                    <div id="calendar"></div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-lg-4">
                <div class="form-container">
                    <h4 class="form-title">Booking Ruangan</h4>

                    <!-- 🆕 IMPROVEMENT 1: Operational Hours Info -->
                    <div class="info-box">
                        <span class="icon">🕐</span>
                        <strong>Jam Operasional:</strong> 07:00 - 21:00
                    </div>

                    <form action="{{url('add_booking',$room->id)}}" method="POST" id="bookingForm">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
                        </div>

                        <div class="form-group">
                            <label for="nim" class="form-label">Nim atau Npp</label>
                            <input type="text" name="nim" id="nim" class="form-control" 
                                @if(Auth::id()) value="{{Auth::user()->nim}}" @endif required>
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
                                    <input type="time" name="startTime" id="startTime" class="form-control" 
                                           min="07:00" max="21:00" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="endTime" class="form-label">Jam Selesai</label>
                                    <input type="time" name="endTime" id="endTime" class="form-control" 
                                           min="07:00" max="21:00" required>
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
    // 🆕 IMPROVEMENT 1: Operational Hours Configuration
    const OPERATIONAL_HOURS = {
        start: '07:00',
        end: '21:00'
    };
    
    // Buffer time disabled (0 minutes)
    const BUFFER_TIME_MINUTES = 0;

    // Set minimum date untuk booking
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
    let calendar;

    // 🆕 IMPROVEMENT 4: Update Availability Badge
    function updateAvailabilityBadge() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;
        const badge = document.getElementById('availabilityBadge');
        const badgeText = document.getElementById('badgeText');
        const badgeIcon = document.getElementById('badgeIcon');

        console.log('=== updateAvailabilityBadge called ===');
        console.log('Form values:', {startDate, endDate, startTime, endTime});
        console.log('Total bookedEvents:', bookedEvents.length);
        console.log('All bookedEvents:', bookedEvents);

        // Cek apakah semua field sudah diisi
        if (!startDate || !endDate || !startTime || !endTime) {
            badge.className = 'availability-badge checking';
            badgeIcon.textContent = '⏱️';
            badgeText.textContent = 'Pilih Tanggal & Waktu untuk Cek Ketersediaan';
            console.log('Badge: CHECKING (not all fields filled)');
            return;
        }

        // Validasi waktu mulai harus lebih kecil dari waktu selesai
        if (startTime >= endTime) {
            badge.className = 'availability-badge conflict';
            badgeIcon.textContent = '⚠️';
            badgeText.textContent = 'Waktu Tidak Valid! Jam selesai harus lebih besar dari jam mulai';
            console.log('Badge: CONFLICT (invalid time range)');
            return;
        }

        // 🆕 IMPROVEMENT 3: Check availability across date range
        const hasConflict = checkDateRangeConflict(startDate, endDate, startTime, endTime);

        console.log('Final conflict result:', hasConflict);

        if (hasConflict) {
            badge.className = 'availability-badge conflict';
            badgeIcon.textContent = '❌';
            badgeText.textContent = 'Bentrok! Waktu yang dipilih sudah terpakai';
            console.log('Badge: CONFLICT');
        } else {
            badge.className = 'availability-badge available';
            badgeIcon.textContent = '✅';
            badgeText.textContent = 'Tersedia! Ruangan bisa di-booking';
            console.log('Badge: AVAILABLE');
        }
    }

    // 🆕 IMPROVEMENT 3: Check conflict across multiple dates
    function checkDateRangeConflict(startDate, endDate, startTime, endTime) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        
        // Convert time string to minutes for easier comparison
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }
        
        const requestStartMinutes = timeToMinutes(startTime);
        const requestEndMinutes = timeToMinutes(endTime);
        
        // Debug log
        console.log('=== Checking conflict ===');
        console.log('Request:', {startDate, endDate, startTime, endTime});
        console.log('Request time in minutes:', {start: requestStartMinutes, end: requestEndMinutes});
        console.log('Total booked events:', bookedEvents.length);
        console.log('Booked events:', bookedEvents);
        
        // Loop through each date in the range
        for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
            const checkDate = d.toISOString().split('T')[0];
            
            console.log(`\nChecking date: ${checkDate}`);
            
            const hasConflictOnDate = bookedEvents.some(event => {
                console.log(`  Evaluating event: "${event.title}" (${event.status})`);
                
                // 🔧 FIX: Check ALL bookings except rejected ones
                // We should consider both "approved" and "pending/waiting" bookings as conflicts
                const status = event.status.toLowerCase().trim();
                const isRejected = status === 'di tolak' || status === 'ditolak' || status === 'rejected';
                
                if (isRejected) {
                    console.log(`    ✗ Skipped - Status is rejected: "${event.status}"`);
                    return false;
                }
                
                console.log(`    ✓ Status is valid (not rejected): "${event.status}"`);
                
                // Check if event overlaps with this date
                const eventStart = new Date(event.start.split('T')[0]);
                const eventEnd = new Date(event.end ? event.end.split('T')[0] : event.start.split('T')[0]);
                const checkDateObj = new Date(checkDate);
                
                const dateInRange = checkDateObj >= eventStart && checkDateObj <= eventEnd;
                
                if (!dateInRange) {
                    console.log(`    ✗ Date not in range`);
                    console.log(`      Event: ${eventStart.toISOString().split('T')[0]} to ${eventEnd.toISOString().split('T')[0]}`);
                    console.log(`      Check: ${checkDate}`);
                    return false;
                }
                
                console.log(`    ✓ Date matches! Checking time...`);
                console.log(`    Event time: ${event.startTime} - ${event.endTime}`);
                console.log(`    Request time: ${startTime} - ${endTime}`);
                
                // Convert event times to minutes
                const eventStartMinutes = timeToMinutes(event.startTime);
                const eventEndMinutes = timeToMinutes(event.endTime);
                
                // Apply buffer time (currently set to 0, so no buffer)
                const eventEndWithBuffer = eventEndMinutes + BUFFER_TIME_MINUTES;
                
                console.log(`    Event minutes: ${eventStartMinutes} - ${eventEndMinutes}`);
                if (BUFFER_TIME_MINUTES > 0) {
                    console.log(`    Event with buffer: ${eventStartMinutes} - ${eventEndWithBuffer} (+${BUFFER_TIME_MINUTES} min buffer)`);
                }
                console.log(`    Request minutes: ${requestStartMinutes} - ${requestEndMinutes}`);
                
                // Time overlap formula: (StartA < EndB) AND (EndA > StartB)
                // Example cases (no buffer):
                // Event 07:00-09:00 vs Request 09:00-11:00 → NO CONFLICT (touching exactly)
                // Event 07:00-09:00 vs Request 08:59-11:00 → CONFLICT (overlaps by 1 minute)
                // Event 07:00-09:00 vs Request 08:00-10:00 → CONFLICT (overlaps)
                
                const timeOverlap = (requestStartMinutes < eventEndWithBuffer && requestEndMinutes > eventStartMinutes);
                
                console.log(`    Time overlap check: (${requestStartMinutes} < ${eventEndWithBuffer}) AND (${requestEndMinutes} > ${eventStartMinutes}) = ${timeOverlap}`);
                
                if (timeOverlap) {
                    console.log(`    ❌ CONFLICT FOUND!`);
                    console.log('Conflict details:', {
                        checkDate,
                        eventTitle: event.title,
                        eventTime: `${event.startTime} - ${event.endTime}`,
                        requestTime: `${startTime} - ${endTime}`,
                        eventStatus: event.status
                    });
                } else {
                    console.log(`    ✓ No conflict`);
                }
                
                return timeOverlap;
            });
            
            if (hasConflictOnDate) {
                console.log(`\n✗✗✗ CONFLICT DETECTED ON ${checkDate} ✗✗✗\n`);
                return true;
            }
        }
        
        console.log('\n✓✓✓ NO CONFLICTS FOUND ✓✓✓\n');
        return false;
    }

    // 🆕 IMPROVEMENT 2: Get status class for event styling
    function getStatusClass(status) {
        if (status === 'Di Setujui') return 'status-approved';
        if (status === 'Menunggu Persetujuan') return 'status-pending';
        if (status === 'Di Tolak') return 'status-rejected';
        return 'status-pending';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const roomId = "{{ $room->id }}";

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: function(info, successCallback, failureCallback) {
                fetch(`/room-bookings/${roomId}`)
                    .then(response => response.json())
                    .then(data => {
                        // 🆕 IMPROVEMENT 2: Add className based on status
                        const eventsWithClass = data.map(event => ({
                            ...event,
                            className: getStatusClass(event.status)
                        }));
                        successCallback(eventsWithClass);
                    })
                    .catch(error => {
                        console.error('Error fetching events:', error);
                        failureCallback(error);
                    });
            },
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
                updateAvailabilityBadge();
            },

            dateClick: function (info) {
                const clickedDate = info.dateStr;
                const today = new Date();
                today.setHours(0,0,0,0);

                if (info.date < today) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Tanggal Tidak Bisa Dipilih!',
                        text: 'Anda tidak dapat melakukan booking untuk tanggal yang sudah lewat.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    return;
                }

                const bookingsToday = bookedEvents.filter(event => {
                    const eventStart = new Date(event.start.split('T')[0]);
                    const eventEnd = new Date(event.end ? event.end.split('T')[0] : event.start.split('T')[0]);
                    const clicked = new Date(clickedDate);
                    return clicked >= eventStart && clicked <= eventEnd;
                });

                if (bookingsToday.length > 0) {
                    // 🆕 IMPROVEMENT 2: Color-coded status in popup
                    let htmlList = bookingsToday.map(b => {
                        let statusColor = '#ffc107';
                        if (b.status === 'Di Setujui') statusColor = '#28a745';
                        if (b.status === 'Di Tolak') statusColor = '#dc3545';
                        
                        return `
                            <div style="text-align:left; margin-bottom:8px; padding: 10px; background: #f8f9fa; border-radius: 6px;">
                                <b>${b.title}</b><br>
                                🕓 ${b.startTime} - ${b.endTime}<br>
                                📌 <span style="color:${statusColor}; font-weight: 600;">
                                    ${b.status}
                                </span>
                            </div>
                        `;
                    }).join('');

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
                            updateAvailabilityBadge();
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
                    updateAvailabilityBadge();
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

    // 🆕 IMPROVEMENT 3: Auto-update endDate when startDate changes
    document.getElementById('startDate').addEventListener('change', function() {
        const startDate = this.value;
        const endDateInput = document.getElementById('endDate');
        
        // Set minimum endDate = startDate
        endDateInput.min = startDate;
        
        // If endDate is before startDate, update it
        if (endDateInput.value && endDateInput.value < startDate) {
            endDateInput.value = startDate;
        }
        
        updateAvailabilityBadge();
    });

    // Update badge when any time/date field changes
    ['startDate', 'endDate', 'startTime', 'endTime'].forEach(id => {
        document.getElementById(id).addEventListener('change', updateAvailabilityBadge);
    });

    // 🆕 IMPROVEMENT 1: Validate operational hours
    function validateOperationalHours(time) {
        return time >= OPERATIONAL_HOURS.start && time <= OPERATIONAL_HOURS.end;
    }

    // Enhanced form validation
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const participants = parseInt(document.getElementById('participants').value);
        const capacity = {{ $room->capacity ?? 0 }};
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;

        // Validate capacity
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

        // 🆕 IMPROVEMENT 1: Validate operational hours
        if (!validateOperationalHours(startTime) || !validateOperationalHours(endTime)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Jam Di Luar Operasional!',
                text: `Booking hanya dapat dilakukan antara ${OPERATIONAL_HOURS.start} - ${OPERATIONAL_HOURS.end}.`,
                showConfirmButton: true
            });
            return;
        }

        // Validate time logic
        if (startTime >= endTime) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Waktu Tidak Valid!',
                text: 'Jam selesai harus lebih besar dari jam mulai.',
                showConfirmButton: true
            });
            return;
        }

        // 🆕 IMPROVEMENT 3: Validate date range and check conflicts
        if (endDate < startDate) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Tanggal Tidak Valid!',
                text: 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
                showConfirmButton: true
            });
            return;
        }

        const hasConflict = checkDateRangeConflict(startDate, endDate, startTime, endTime);

        if (hasConflict) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Bentrok Jadwal!',
                text: 'Waktu yang Anda pilih sudah terpakai di rentang tanggal tersebut. Silakan pilih waktu lain.',
                showConfirmButton: true
            });
        }
    });

    // Laravel notifications
    @if(session()->has('success'))
        Swal.fire({ 
            icon: 'success', 
            title: 'Berhasil!', 
            text: "{{ session()->get('success') }}", 
            timer: 3000, 
            showConfirmButton: false 
        });
    @endif

    @if(session()->has('error'))
        Swal.fire({ 
            icon: 'error', 
            title: 'Gagal!', 
            text: "{{ session()->get('error') }}", 
            showConfirmButton: true 
        });
    @endif
</script>

</body>
</html>