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

      /* Modal Styles */
      .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        justify-content: center;
        align-items: center;
      }

      .modal-overlay.active {
        display: flex;
      }

      .modal-content {
        background: white;
        border-radius: 15px;
        padding: 30px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: modalSlideIn 0.3s ease-out;
      }

      @keyframes modalSlideIn {
        from {
          transform: translateY(-50px);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
      }

      .modal-header h3 {
        margin: 0;
        color: #e74c3c;
        font-size: 20px;
        font-weight: 600;
      }

      .modal-close {
        background: none;
        border: none;
        font-size: 28px;
        color: #999;
        cursor: pointer;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.3s;
      }

      .modal-close:hover {
        color: #333;
      }

      .modal-body {
        margin-bottom: 20px;
      }

      .modal-body label {
        display: block;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
      }

      .modal-body textarea {
        width: 100%;
        min-height: 120px;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        resize: vertical;
        transition: border-color 0.3s;
      }

      .modal-body textarea:focus {
        outline: none;
        border-color: #e74c3c;
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.15);
      }

      .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
      }

      .modal-footer .btn {
        padding: 10px 20px;
        font-size: 14px;
      }

      .booking-info {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
      }

      .booking-info p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
      }

      .booking-info strong {
        color: #2c3e50;
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

        .modal-content {
          padding: 20px;
        }

        .modal-header h3 {
          font-size: 18px;
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
                      data-booking-id="{{ $booking->id }}"
                      data-name="{{ strtolower($booking->name) }}"
                      data-nim="{{ $booking->nim }}"
                      data-email="{{ strtolower($booking->email) }}"
                      data-status-type="{{ 
                        $booking->status == 'Di Setujui' ? 'approved' : 
                        ($booking->status == 'Di Tolak' ? 'rejected' : 'waiting') 
                      }}"
                      data-status-text="{{ $booking->status }}"
                      data-room="{{ strtolower($booking->room->room_title ?? '') }}"
                      data-room-title="{{ $booking->room->room_title ?? '' }}"
                      data-start-date="{{ $booking->start_date }}"
                      data-end-date="{{ $booking->end_date }}"
                      data-start-time="{{ $booking->start_time }}"
                      data-end-time="{{ $booking->end_time }}">
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
                        <span class="status approved">✓ Di Setujui</span>
                      @elseif($booking->status == 'Di Tolak')
                        <span class="status rejected">✗ Di Tolak</span>
                      @else
                        <span class="status waiting">⏳ Menunggu</span>
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
                        @if($booking->status == 'waiting')
                          <!-- Approve langsung -->
                          <a class="btn btn-success btn-sm" 
                             href="{{ url('approve_book', $booking->id) }}"
                             onclick="return confirm('Setujui peminjaman ini?')">
                            <i class="bi bi-check-circle"></i> Setuju
                          </a>
                          <!-- Reject dengan modal -->
                          <button class="btn btn-warning btn-sm reject-btn" 
                                  data-booking-id="{{ $booking->id }}"
                                  data-customer-name="{{ $booking->name }}"
                                  data-room-title="{{ $booking->room->room_title ?? '-' }}"
                                  data-start-date="{{ $booking->start_date }}"
                                  data-end-date="{{ $booking->end_date }}">
                            <i class="bi bi-x-circle"></i> Tolak
                          </button>
                        @else
                          <span class="text-muted" style="font-size: 12px;">
                            {{ $booking->status }}
                          </span>
                        @endif
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

    <!-- Rejection Modal -->
    <div class="modal-overlay" id="rejectModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3>⚠️ Tolak Peminjaman Ruangan</h3>
          <button class="modal-close" id="closeModal">&times;</button>
        </div>
        
        <div class="modal-body">
          <div class="booking-info" id="bookingInfo">
            <!-- Will be filled by JavaScript -->
          </div>
          
          <form id="rejectForm" method="POST">
            @csrf
            <label for="rejectNote">Alasan Penolakan <span style="color: red;">*</span></label>
            <textarea 
              id="rejectNote" 
              name="rejection_note" 
              placeholder="Contoh: Ruangan sudah dibooking di tanggal tersebut, atau kegiatan tidak sesuai dengan kebijakan kampus..."
              required
            ></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">
              Catatan ini akan dikirimkan ke email peminjam
            </small>
          </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="cancelReject">Batal</button>
          <button type="button" class="btn btn-danger" id="confirmReject">
            <i class="bi bi-x-circle"></i> Tolak Peminjaman
          </button>
        </div>
      </div>
    </div>

    @include('admin.footer')

    <script>
      // ==========================================
      // REJECTION MODAL FUNCTIONALITY
      // ==========================================
      document.addEventListener('DOMContentLoaded', function() {
        const rejectModal = document.getElementById('rejectModal');
        const closeModalBtn = document.getElementById('closeModal');
        const cancelRejectBtn = document.getElementById('cancelReject');
        const confirmRejectBtn = document.getElementById('confirmReject');
        const rejectForm = document.getElementById('rejectForm');
        const rejectNote = document.getElementById('rejectNote');
        const bookingInfo = document.getElementById('bookingInfo');
        const rejectButtons = document.querySelectorAll('.reject-btn');

        let currentBookingId = null;

        // Open modal when reject button clicked
        rejectButtons.forEach(button => {
          button.addEventListener('click', function() {
            currentBookingId = this.getAttribute('data-booking-id');
            const customerName = this.getAttribute('data-customer-name');
            const roomTitle = this.getAttribute('data-room-title');
            const startDate = this.getAttribute('data-start-date');
            const endDate = this.getAttribute('data-end-date');

            // Fill booking info
            bookingInfo.innerHTML = `
              <p><strong>Nama Peminjam:</strong> ${customerName}</p>
              <p><strong>Ruangan:</strong> ${roomTitle}</p>
              <p><strong>Tanggal:</strong> ${startDate} s/d ${endDate}</p>
            `;

            // Clear previous note
            rejectNote.value = '';

            // Show modal
            rejectModal.classList.add('active');
          });
        });

        // Close modal functions
        function closeModal() {
          rejectModal.classList.remove('active');
          currentBookingId = null;
        }

        closeModalBtn.addEventListener('click', closeModal);
        cancelRejectBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside
        rejectModal.addEventListener('click', function(e) {
          if (e.target === rejectModal) {
            closeModal();
          }
        });

        // Confirm rejection
        confirmRejectBtn.addEventListener('click', function() {
          if (rejectNote.value.trim() === '') {
            alert('Harap isi alasan penolakan!');
            rejectNote.focus();
            return;
          }

          if (confirm('Yakin ingin menolak peminjaman ini?')) {
            // Set form action
            rejectForm.action = `{{ url('reject_book') }}/${currentBookingId}`;
            
            // Submit form
            rejectForm.submit();
          }
        });

        // ==========================================
        // FILTER FUNCTIONALITY
        // ==========================================
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

        // Initialize statistics
        updateStatistics();

        // Apply filter function
        function applyFilters() {
          const searchTerm = searchInput.value.toLowerCase().trim();
          const statusValue = statusFilter.value;
          const roomValue = roomFilter.value.toLowerCase().trim();
          const startDateValue = startDate.value;
          const endDateValue = endDate.value;

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

            // Status matching
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