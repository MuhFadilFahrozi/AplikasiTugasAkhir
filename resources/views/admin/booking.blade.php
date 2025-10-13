<!DOCTYPE html>
<html lang="id">
  <head>
    @include('admin.css')

    <style>
      body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f9fa;
      }

      .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-top: 40px;
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
      }

      @media (max-width: 768px) {
        .table-container {
          padding: 15px;
        }

        table.table_deg {
          display: block;
          overflow-x: auto;
          white-space: nowrap;
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
        <div class="page-header">
          <div class="container-fluid">
            
            <div class="table-container">
              <h3 class="fw-bold mb-4 text-primary text-center">📋 Daftar Peminjaman Ruangan</h3>

              <table class="table_deg">
                <thead>
                  <tr>
                    <th>Id Ruangan</th>
                    <th>Nama Customer</th>
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

                <tbody>
                  @foreach($data as $data)
                    <tr>
                      <td>{{ $data->room_id }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->participants ?? '-' }}</td>
                      <td>{{ $data->start_date }}</td>
                      <td>{{ $data->end_date }}</td>

                      <td>
                        @if($data->status == 'Di Setujui')
                          <span class="status approved">Di Setujui</span>
                        @elseif($data->status == 'Di Tolak')
                          <span class="status rejected">Di Tolak</span>
                        @else
                          <span class="status waiting">Menunggu Persetujuan</span>
                        @endif
                      </td>

                      <td>{{ $data->room->room_title ?? '-' }}</td>

                      <td>
                        <img src="/room/{{ $data->room->image ?? '-' }}" alt="Foto Ruangan">
                      </td>

                      <td>
                        <a onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"
                           class="btn btn-danger"
                           href="{{ url('delete_booking', $data->id) }}">
                           <i class="bi bi-trash"></i> Hapus
                        </a>
                        <div class="mt-2">
                          <a class="btn btn-success" href="{{ url('approve_book', $data->id) }}">Setuju</a>
                          <a class="btn btn-warning" href="{{ url('reject_book', $data->id) }}">Tolak</a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
      <!-- End Page Content -->
    </div>

    @include('admin.footer')
  </body>
</html>
