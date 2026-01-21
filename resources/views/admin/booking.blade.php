<!DOCTYPE html>
<html lang="id">
  <head>
    @include('admin.css')

    <style>
      body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f9fa;
      }

      .filter-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-top: 20px;
      }

      .table_deg {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
      }

      .table_deg thead {
        background-color: #3498db;
        color: #fff;
      }

      .table_deg th,
      .table_deg td {
        padding: 12px 10px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: middle;
        font-size: 14px;
      }

      .table_deg th {
        font-weight: 600;
      }

      .table_deg tr:hover {
        background-color: #f4faff;
        transition: background-color 0.3s;
      }

      .table_deg img {
        width: 100px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
      }

      /* Status Badge */
      .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 13px;
      }

      .status.approved {
        background-color: #d4edda;
        color: #155724;
      }

      .status.rejected {
        background-color: #f8d7da;
        color: #721c24;
      }

      .status.waiting {
        background-color: #fff3cd;
        color: #856404;
      }

      /* Button spacing */
      .btn {
        border-radius: 20px;
        font-size: 13px;
        padding: 6px 14px;
      }

      .btn + .btn {
        margin-left: 6px;
      }

      /* Filter Styles */
      .filter-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 15px;
        align-items: end;
      }

      .filter-group {
        flex: 1;
        min-width: 200px;
      }

      .filter-group label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #2c3e50;
        display: block;
      }

      .filter-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
      }

      .search-box {
        position: relative;
        flex: 2;
        min-width: 300px;
      }

      .search-box .form-control {
        padding-left: 40px;
      }

      .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
      }

      .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        font-size: 14px;
        transition: all 0.3s;
      }

      .form-control:focus, .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
      }

      .stats-card {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        margin-bottom: 15px;
      }

      .stats-number {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .stats-label {
        font-size: 12px;
        opacity: 0.9;
      }

      /* Responsive */
      @media (max-width: 992px) {
        .table_deg th,
        .table_deg td {
          font-size: 13px;
          padding: 10px;
        }

        .table_deg img {
          width: 80px;
          height: 55px;
        }

        .filter-group {
          min-width: 150px;
        }

        .search-box {
          min-width: 250px;
        }
      }

      @media (max-width: 768px) {
        .table-container, .filter-container {
          padding: 15px;
        }

        table.table_deg {
          display: block;
          overflow-x: auto;
          white-space: nowrap;
        }

        .filter-row {
          flex-direction: column;
        }

        .filter-group, .search-box {
          min-width: 100%;
        }
      }
    </style>
  </head>

  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation -->
      @include('admin.sidebar')
      <!-- End Sidebar -->

      <!-- Page Content -->
      <div class="page-content">
        <div class="container-fluid">
          
          <!-- Filter Section -->
          <div class="filter-container">
            <h4 class="fw-bold mb-4 text-primary">🔍 Filter Data Booking</h4>
            
            <form id="filterForm">
              <div class="filter-row">
                <!-- Search by Name/NIM -->
                <div class="search-box">
                  <i class="bi bi-search"></i>
                  <input type="text" class="form-control" id="searchInput" 
                         placeholder="Cari berdasarkan nama, NIM, atau email...">
                </div>

                <!-- Filter by Status -->
                <div class="filter-group">
                  <label for="statusFilter">Status Booking</label>
                  <select class="form-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="waiting">Menunggu Persetujuan</option>
                    <option value="approved">Di Setujui</option>
                    <option value="rejected">Di Tolak</option>
                  </select>
                </div>

                <!-- Filter by Room -->
                <div class="filter-group">
                  <label for="roomFilter">Nama Ruangan</label>
                  <select class="form-select" id="roomFilter">
                    <option value="">Semua Ruangan</option>
                    @foreach($rooms as $room)
                      <option value="{{ $room->room_title }}">{{ $room->room_title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="filter-row">
                <!-- Date Range -->
                <div class="filter-group">
                  <label for="startDate">Dari Tanggal</label>
                  <input type="date" class="form-control" id="startDate">
                </div>

                <div class="filter-group">
                  <label for="endDate">Sampai Tanggal</label>
                  <input type="date" class="form-control" id="endDate">
                </div>

                <!-- Quick Date Filters -->
                <div class="filter-group">
                  <label>Filter Cepat</label>
                  <div class="btn-group w-100">
                    <button type="button" class="btn btn-outline-primary btn-sm" data-days="1">Hari Ini</button>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-days="7">7 Hari</button>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-days="30">30 Hari</button>
                  </div>
                </div>
              </div>

              <div class="filter-actions">
                <button type="button" class="btn btn-primary" id="applyFilter">
                  <i class="bi bi-funnel"></i> Terapkan Filter
                </button>
                <button type="button" class="btn btn-outline-secondary" id="resetFilter">
                  <i class="bi bi-arrow-clockwise"></i> Reset
                </button>
              </div>
            </form>
          </div>

          <!-- Statistics Cards -->
          <div class="row">
            <div class="col-md-3">
              <div class="stats-card">
                <div class="stats-number" id="totalBookings">0</div>
                <div class="stats-label">TOTAL BOOKING</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stats-card" style="background: linear-gradient(135deg, #f39c12, #e67e22);">
                <div class="stats-number" id="waitingBookings">0</div>
                <div class="stats-label">MENUNGGU</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stats-card" style="background: linear-gradient(135deg, #27ae60, #229954);">
                <div class="stats-number" id="approvedBookings">0</div>
                <div class="stats-label">DISETUJUI</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stats-card" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
                <div class="stats-number" id="rejectedBookings">0</div>
                <div class="stats-label">DITOLAK</div>
              </div>
            </div>
          </div>

          <!-- Table Section -->
          <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-bold text-primary mb-0">📋 Daftar Peminjaman Ruangan</h3>
              <div class="text-muted" id="resultCount">Menampilkan 0 data</div>
            </div>

            <table class="table_deg">
              <thead>
                <tr>
                  <th>Id Ruangan</th>
                  <th>Nama Customer</th>
                  <th>Nim</th>
                  <th>Email</th>
                  <th>No Telpon</th>
                  <th>Jumlah Peserta</th>
                  <th>Tanggal Pinjam</th>
                  <th>Selesai Pinjam</th>
                  <th>Status</th>
                  <th>Nama Ruangan</th>
                  <th>Foto Ruangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody id="bookingTableBody">
                @foreach($data as $booking)
                  <tr class="booking-row" 
                      data-name="{{ strtolower($booking->name) }}"
                      data-nim="{{ $booking->nim }}"
                      data-email="{{ strtolower($booking->email) }}"
                      data-status-type="{{ 
                        $booking->status == 'Di Setujui' ? 'approved' : 
                        ($booking->status == 'Di Tolak' ? 'rejected' : 'waiting') 
                      }}"
                      data-status-text="{{ $booking->status }}"
                      data-room="{{ strtolower($booking->room->room_title ?? '') }}"
                      data-start-date="{{ $booking->start_date }}"
                      data-end-date="{{ $booking->end_date }}">
                    <td>{{ $booking->room_id }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->nim }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->participants ?? '-' }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>

                    <td>
                      @if($booking->status == 'Di Setujui')
                        <span class="status approved">Di Setujui</span>
                      @elseif($booking->status == 'Di Tolak')
                        <span class="status rejected">Di Tolak</span>
                      @else
                        <span class="status waiting">Menunggu Persetujuan</span>
                      @endif
                    </td>

                    <td>{{ $booking->room->room_title ?? '-' }}</td>

                    <td>
                      <img src="/room/{{ $booking->room->image ?? '-' }}" alt="Foto Ruangan">
                    </td>

                    <td>
                      <a onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"
                         class="btn btn-danger btn-sm"
                         href="{{ url('delete_booking', $booking->id) }}">
                         <i class="bi bi-trash"></i> Hapus
                      </a>
                      <div class="mt-2">
                        <a class="btn btn-success btn-sm" href="{{ url('approve_book', $booking->id) }}">Setuju</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('reject_book', $booking->id) }}">Tolak</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- End Page Content -->
    </div>

    @include('admin.footer')

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const roomFilter = document.getElementById('roomFilter');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        const applyFilter = document.getElementById('applyFilter');
        const resetFilter = document.getElementById('resetFilter');
        const bookingRows = document.querySelectorAll('.booking-row');
        const resultCount = document.getElementById('resultCount');
        
        // Statistik elements
        const totalBookings = document.getElementById('totalBookings');
        const waitingBookings = document.getElementById('waitingBookings');
        const approvedBookings = document.getElementById('approvedBookings');
        const rejectedBookings = document.getElementById('rejectedBookings');

        // Quick date filter buttons
        const quickFilterButtons = document.querySelectorAll('[data-days]');

        // Debug: Log all statuses on page load
        console.log('=== DEBUG INFO ===');
        bookingRows.forEach((row, index) => {
          console.log(`Row ${index}:`, {
            statusType: row.getAttribute('data-status-type'),
            statusText: row.getAttribute('data-status-text')
          });
        });

        // Initialize statistics
        updateStatistics();

        // Apply filter function
        function applyFilters() {
          const searchTerm = searchInput.value.toLowerCase().trim();
          const statusValue = statusFilter.value;
          const roomValue = roomFilter.value.toLowerCase().trim();
          const startDateValue = startDate.value;
          const endDateValue = endDate.value;

          console.log('Filter applied:', {
            search: searchTerm,
            status: statusValue,
            room: roomValue,
            startDate: startDateValue,
            endDate: endDateValue
          });

          let visibleCount = 0;

          bookingRows.forEach(row => {
            const name = row.getAttribute('data-name') || '';
            const nim = row.getAttribute('data-nim') || '';
            const email = row.getAttribute('data-email') || '';
            const statusType = row.getAttribute('data-status-type') || '';
            const room = row.getAttribute('data-room') || '';
            const startDateRow = row.getAttribute('data-start-date') || '';
            const endDateRow = row.getAttribute('data-end-date') || '';

            // Search matching
            let matchesSearch = !searchTerm || 
                              name.includes(searchTerm) || 
                              nim.includes(searchTerm) || 
                              email.includes(searchTerm);

            // Status matching - PERBAIKAN UTAMA
            let matchesStatus = !statusValue || statusType === statusValue;

            // Room matching
            let matchesRoom = !roomValue || room.includes(roomValue);
            
            // Date matching
            let matchesDate = true;
            if (startDateValue) {
              matchesDate = matchesDate && (startDateRow >= startDateValue);
            }
            if (endDateValue) {
              matchesDate = matchesDate && (endDateRow <= endDateValue);
            }

            // Show or hide row
            if (matchesSearch && matchesStatus && matchesRoom && matchesDate) {
              row.style.display = '';
              visibleCount++;
            } else {
              row.style.display = 'none';
            }
          });

          resultCount.textContent = `Menampilkan ${visibleCount} data`;
          updateStatistics();
        }

        // Update statistics
        function updateStatistics() {
          let total = 0;
          let waiting = 0;
          let approved = 0;
          let rejected = 0;

          bookingRows.forEach(row => {
            if (row.style.display !== 'none') {
              total++;
              const statusType = row.getAttribute('data-status-type');
              
              if (statusType === 'waiting') waiting++;
              else if (statusType === 'approved') approved++;
              else if (statusType === 'rejected') rejected++;
            }
          });

          totalBookings.textContent = total;
          waitingBookings.textContent = waiting;
          approvedBookings.textContent = approved;
          rejectedBookings.textContent = rejected;

          console.log('Statistics:', { total, waiting, approved, rejected });
        }

        // Quick date filter
        function setQuickDateFilter(days) {
          const end = new Date();
          const start = new Date();
          start.setDate(end.getDate() - days + 1);
          
          startDate.value = start.toISOString().split('T')[0];
          endDate.value = end.toISOString().split('T')[0];
          applyFilters();
        }

        // Event listeners
        applyFilter.addEventListener('click', applyFilters);
        
        resetFilter.addEventListener('click', function() {
          searchInput.value = '';
          statusFilter.value = '';
          roomFilter.value = '';
          startDate.value = '';
          endDate.value = '';
          applyFilters();
        });

        searchInput.addEventListener('input', applyFilters);
        statusFilter.addEventListener('change', applyFilters);
        roomFilter.addEventListener('change', applyFilters);
        startDate.addEventListener('change', applyFilters);
        endDate.addEventListener('change', applyFilters);

        quickFilterButtons.forEach(button => {
          button.addEventListener('click', function() {
            const days = parseInt(this.getAttribute('data-days'));
            setQuickDateFilter(days);
          });
        });

        // Apply filters on page load
        applyFilters();
      });
    </script>
  </body>
</html>