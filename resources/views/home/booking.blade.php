<!DOCTYPE html>
<html lang="id">
<head>
    @include('home.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      body {
        background-color: #f8f9fa;
        font-family: "Poppins", sans-serif;
      }

      .container-fluid {
        padding: 20px;
      }

      /* Summary Cards */
      .summary-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
      }

      .summary-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
      }

      .summary-card.approved {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      }

      .summary-card.rejected {
        background: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
      }

      .summary-card.waiting {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      }

      .summary-card h3 {
        font-size: 32px;
        font-weight: 700;
        margin: 0;
      }

      .summary-card p {
        font-size: 14px;
        margin: 5px 0 0 0;
        opacity: 0.9;
      }

      /* Filter Section */
      .filter-section {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 30px;
      }

      .filter-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
      }

      .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
      }

      .filter-input {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.3s;
      }

      .filter-input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
      }

      .filter-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }

      .btn-filter {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        font-size: 14px;
        transition: 0.3s;
      }

      .btn-filter.primary {
        background-color: #3498db;
        color: white;
      }

      .btn-filter.primary:hover {
        background-color: #2980b9;
      }

      .btn-filter.secondary {
        background-color: #95a5a6;
        color: white;
      }

      .btn-filter.secondary:hover {
        background-color: #7f8c8d;
      }

      /* Table Container */
      .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 30px;
        overflow-x: auto;
      }

      .table-title {
        text-align: center;
        font-size: 22px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
      }

      table.table_deg {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-size: 14px;
        min-width: 1000px;
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
      }

      .table_deg th {
        font-size: 15px;
        font-weight: 600;
      }

      .table_deg tr:hover {
        background-color: #f4faff;
        transition: background-color 0.3s;
      }

      .table_deg img {
        width: 80px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
      }

      /* Badge Status */
      .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 13px;
        white-space: nowrap;
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

      /* Admin Notes in Table */
      .notes-cell {
        max-width: 300px;
        text-align: left;
        padding: 12px 15px !important;
      }

      .notes-badge {
        display: block;
        background-color: #fff3cd;
        color: #856404;
        padding: 10px 12px;
        border-radius: 6px;
        font-size: 12px;
        border-left: 3px solid #ffc107;
        line-height: 1.5;
        word-wrap: break-word;
      }

      .notes-badge strong {
        display: block;
        margin-bottom: 5px;
        font-size: 13px;
        color: #856404;
      }

      .no-notes {
        color: #999;
        font-style: italic;
        font-size: 12px;
      }

      /* Action Buttons */
      .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: wrap;
      }

      .btn-action {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
      }

      .btn-action.detail {
        background-color: #3498db;
        color: white;
      }

      .btn-action.detail:hover {
        background-color: #2980b9;
      }

      .btn-action.pdf {
        background-color: #e74c3c;
        color: white;
      }

      .btn-action.pdf:hover {
        background-color: #c0392b;
      }

      .btn-action.cancel {
        background-color: #f39c12;
        color: white;
      }

      .btn-action.cancel:hover {
        background-color: #d68910;
      }

      /* Modal */
      .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-y: auto;
      }

      .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .modal-content {
        background-color: #fff;
        margin: 20px;
        padding: 0;
        border-radius: 12px;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
        animation: modalSlideIn 0.3s ease;
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
        background-color: #3498db;
        color: white;
        padding: 20px 25px;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .modal-header h2 {
        margin: 0;
        font-size: 20px;
      }

      .close-modal {
        background: none;
        border: none;
        color: white;
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .close-modal:hover {
        opacity: 0.8;
      }

      .modal-body {
        padding: 25px;
      }

      .detail-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
      }

      .detail-row:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
      }

      .detail-label {
        font-weight: 600;
        color: #555;
      }

      .detail-value {
        color: #333;
      }

      .admin-notes {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px;
        border-radius: 6px;
        margin-top: 20px;
      }

      .admin-notes h4 {
        margin: 0 0 10px 0;
        color: #856404;
        font-size: 16px;
      }

      .admin-notes p {
        margin: 0;
        color: #856404;
        line-height: 1.6;
      }

      /* Pagination */
      .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
      }

      .pagination a,
      .pagination span {
        padding: 8px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        color: #333;
        transition: 0.3s;
      }

      .pagination a:hover {
        background-color: #3498db;
        color: white;
        border-color: #3498db;
      }

      .pagination .active {
        background-color: #3498db;
        color: white;
        border-color: #3498db;
      }

      .pagination .disabled {
        opacity: 0.5;
        cursor: not-allowed;
      }

      /* Empty State */
      .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #7f8c8d;
      }

      .empty-state i {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.3;
      }

      .empty-state h3 {
        font-size: 20px;
        margin-bottom: 10px;
      }

      .empty-state p {
        font-size: 14px;
      }

      /* Responsive */
      @media (max-width: 768px) {
        .filter-grid {
          grid-template-columns: 1fr;
        }

        .table-container {
          padding: 15px;
        }

        .table_deg {
          font-size: 12px;
        }

        .table_deg th,
        .table_deg td {
          padding: 8px 5px;
        }

        .action-buttons {
          flex-direction: column;
        }

        .detail-row {
          grid-template-columns: 1fr;
          gap: 5px;
        }

        .notes-cell {
          max-width: 200px;
        }
      }
    </style>
</head>

<body>
  @include('home.header')

  <div class="container-fluid">
    <!-- Summary Cards -->
    <div class="summary-cards">
      <div class="summary-card">
        <h3>{{ $totalBookings }}</h3>
        <p>Total Peminjaman</p>
      </div>
      <div class="summary-card approved">
        <h3>{{ $approvedCount }}</h3>
        <p>Di Setujui</p>
      </div>
      <div class="summary-card rejected">
        <h3>{{ $rejectedCount }}</h3>
        <p>Di Tolak</p>
      </div>
      <div class="summary-card waiting">
        <h3>{{ $waitingCount }}</h3>
        <p>Menunggu</p>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
      <h3 class="filter-title">🔍 Filter & Pencarian</h3>
      <form method="GET" action="{{ route('history.peminjaman') }}" id="filterForm">
        <div class="filter-grid">
          <input type="text" name="search" class="filter-input" placeholder="Cari nama, NIM, atau ruangan..." value="{{ request('search') }}">
          
          <select name="status" class="filter-input">
            <option value="">Semua Status</option>
            <option value="Di Setujui" {{ request('status') == 'Di Setujui' ? 'selected' : '' }}>Di Setujui</option>
            <option value="Di Tolak" {{ request('status') == 'Di Tolak' ? 'selected' : '' }}>Di Tolak</option>
            <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Menunggu</option>
          </select>

          <input type="date" name="start_date" class="filter-input" placeholder="Dari Tanggal" value="{{ request('start_date') }}">
          
          <input type="date" name="end_date" class="filter-input" placeholder="Sampai Tanggal" value="{{ request('end_date') }}">
        </div>

        <div class="filter-buttons">
          <button type="submit" class="btn-filter primary">🔍 Cari</button>
          <a href="{{ route('history.peminjaman') }}" class="btn-filter secondary">🔄 Reset</a>
        </div>
      </form>
    </div>

    <!-- Table Container -->
    <div class="table-container">
      <h2 class="table-title">📋 Daftar Peminjaman Ruangan</h2>

      @if($data->count() > 0)
        <table class="table_deg">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nim/Npp</th>
              <th>Tanggal Pinjam</th>
              <th>Jam</th>
              <th>Status</th>
              <th>Ruangan</th>
              <th>Catatan Admin</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach($data as $index => $item)
              <tr>
                <td>{{ $data->firstItem() + $index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nim }}</td>
                <td>
                  {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                  @if($item->start_date != $item->end_date)
                    <br><small>s/d {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</small>
                  @endif
                </td>
                <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
                <td>
                  @if($item->status == 'Di Setujui')
                    <span class="status approved">✓ Di Setujui</span>
                  @elseif($item->status == 'Di Tolak')
                    <span class="status rejected">✗ Di Tolak</span>
                  @else
                    <span class="status waiting">⏳ Menunggu</span>
                  @endif
                </td>
                <td>{{ $item->room->room_title ?? '-' }}</td>
                <td class="notes-cell">
                  @if($item->status == 'Di Tolak' && $item->admin_notes)
                    <div class="notes-badge">
                      <strong>⚠️ Alasan Penolakan:</strong>
                      {{ $item->admin_notes }}
                    </div>
                  @else
                    <span class="no-notes">-</span>
                  @endif
                </td>
                <td>
                  <div class="action-buttons">
                    <button class="btn-action detail" onclick="showDetail({{ $item->id }})">
                      👁️ Detail
                    </button>
                    
                    @if($item->status == 'Di Setujui')
                      <a href="{{ route('export.jadwal.pdf', $item->id) }}" class="btn-action pdf" target="_blank">
                        📄 PDF
                      </a>
                    @endif

                    @if($item->status == 'waiting' || $item->status == 'Menunggu')
                      <button class="btn-action cancel" onclick="cancelBooking({{ $item->id }})">
                        🚫 Batalkan
                      </button>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
          {{ $data->links() }}
        </div>
      @else
        <div class="empty-state">
          <div style="font-size: 80px; margin-bottom: 20px;">📭</div>
          <h3>Tidak Ada Data Peminjaman</h3>
          <p>Belum ada riwayat peminjaman atau data tidak ditemukan dengan filter yang dipilih.</p>
        </div>
      @endif
    </div>
  </div>

  <!-- Modal Detail -->
  <div id="detailModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>📋 Detail Peminjaman</h2>
        <button class="close-modal" onclick="closeModal()">&times;</button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Content will be loaded here -->
        <div style="text-align: center; padding: 40px;">
          <p>Loading...</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Show Detail Modal
    function showDetail(id) {
      const modal = document.getElementById('detailModal');
      const modalBody = document.getElementById('modalBody');
      
      modal.classList.add('active');
      
      // Fetch detail data
      fetch(`/booking/detail/${id}`)
        .then(response => response.json())
        .then(data => {
          let statusClass = '';
          let statusText = '';
          
          if(data.status === 'Di Setujui') {
            statusClass = 'approved';
            statusText = '✓ Di Setujui';
          } else if(data.status === 'Di Tolak') {
            statusClass = 'rejected';
            statusText = '✗ Di Tolak';
          } else {
            statusClass = 'waiting';
            statusText = '⏳ Menunggu';
          }

          let adminNotesHtml = '';
          if(data.admin_notes && data.admin_notes.trim() !== '') {
            adminNotesHtml = `
              <div class="admin-notes">
                <h4>📝 Catatan Admin / Alasan Penolakan:</h4>
                <p>${data.admin_notes}</p>
              </div>
            `;
          }

          let roomImageHtml = '-';
          if(data.room && data.room.image) {
            roomImageHtml = `<img src="/room/${data.room.image}" alt="Foto Ruangan" style="max-width: 200px; border-radius: 8px;">`;
          }

          modalBody.innerHTML = `
            <div class="detail-row">
              <div class="detail-label">ID Peminjaman:</div>
              <div class="detail-value">#${data.id}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Nama:</div>
              <div class="detail-value">${data.name}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">NIM/NPP:</div>
              <div class="detail-value">${data.nim}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Email:</div>
              <div class="detail-value">${data.email}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">No. Telepon:</div>
              <div class="detail-value">${data.phone}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Jumlah Peserta:</div>
              <div class="detail-value">${data.participants || '-'}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Ruangan:</div>
              <div class="detail-value">${data.room ? data.room.room_title : '-'}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Foto Ruangan:</div>
              <div class="detail-value">${roomImageHtml}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Tanggal Pinjam:</div>
              <div class="detail-value">${formatDate(data.start_date)}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Tanggal Selesai:</div>
              <div class="detail-value">${formatDate(data.end_date)}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Jam Pinjam:</div>
              <div class="detail-value">${data.start_time}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Jam Selesai:</div>
              <div class="detail-value">${data.end_time}</div>
            </div>
            <div class="detail-row">
              <div class="detail-label">Status:</div>
              <div class="detail-value"><span class="status ${statusClass}">${statusText}</span></div>
            </div>
            ${adminNotesHtml}
          `;
        })
        .catch(error => {
          modalBody.innerHTML = '<p style="color: red; text-align: center;">Gagal memuat data. Silakan coba lagi.</p>';
          console.error('Error:', error);
        });
    }

    // Close Modal
    function closeModal() {
      document.getElementById('detailModal').classList.remove('active');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('detailModal');
      if (event.target == modal) {
        closeModal();
      }
    }

    // Cancel Booking
    function cancelBooking(id) {
      if(confirm('Apakah Anda yakin ingin membatalkan peminjaman ini?')) {
        fetch(`/booking/cancel/${id}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        })
        .then(response => response.json())
        .then(data => {
          if(data.success) {
            alert('Peminjaman berhasil dibatalkan!');
            location.reload();
          } else {
            alert('Gagal membatalkan peminjaman: ' + data.message);
          }
        })
        .catch(error => {
          alert('Terjadi kesalahan. Silakan coba lagi.');
          console.error('Error:', error);
        });
      }
    }

    // Format Date
    function formatDate(dateString) {
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
      const date = new Date(dateString);
      return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    }
  </script>
</body>
</html>