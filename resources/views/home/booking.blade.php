<!DOCTYPE html>
<html lang="id">
<head>
    @include('home.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      body {
        background-color: #f8f9fa;
        font-family: "Poppins", sans-serif;
      }

      .table-container {
        margin: 40px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
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
        width: 100px;
        height: 70px;
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

      /* Tombol PDF */
      .btn-pdf {
  background-color: #e74c3c;
  color: white;
  border: none;
  padding: 8px 16px; /* Menambahkan sedikit padding agar lebih besar */
  border-radius: 8px; /* Membuat sudut lebih bulat */
  cursor: pointer;
  text-decoration: none;
  font-weight: 500;
  font-size: 14px; /* Menyesuaikan ukuran font agar lebih proporsional */
  transition: 0.3s;
  display: inline-block; /* Agar tombol berada dalam satu baris */
  margin: 8px 0; /* Memberikan jarak atas dan bawah */
}

.btn-pdf:hover {
  background-color: #c0392b;
}

/* Sesuaikan tombol dalam tabel */
.table_deg td {
  padding: 12px 10px;
  border-bottom: 1px solid #e0e0e0;
  vertical-align: middle;
}

.table_deg td a {
  display: inline-block; /* Memastikan tombol tetap berada dalam baris */
}
      
    </style>
</head>

<body>
  @include('home.header')

  <div class="container-fluid">
    <div class="table-container">
      <h2 class="table-title">📋 Daftar Peminjaman Ruangan</h2>

      <table class="table_deg">
        <thead>
          <tr>
            <th>Id Ruangan</th>
            <th>Nama </th>
            <th>Nim atau Npp</th>
            <th>Email</th>
            <th>No Telpon</th>
            <th>Jumlah Peserta</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Selesai</th>
            <th>Jam Pinjam</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Nama Ruangan</th>
            <th>Foto Ruangan</th>
            <th>Cetak</th>
          </tr>
        </thead>

        <tbody>
          @foreach($data as $item)
            <tr>
              <td>{{ $item->room_id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->nim }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->participants ?? '-' }}</td>
              <td>{{ $item->start_date }}</td>
              <td>{{ $item->end_date }}</td>
              <td>{{ $item->start_time }}</td>
              <td>{{ $item->end_time }}</td>
              <td>
                @if($item->status == 'Di Setujui')
                  <span class="status approved">Di Setujui</span>
                @elseif($item->status == 'Di Tolak')
                  <span class="status rejected">Di Tolak</span>
                @else
                  <span class="status waiting">Menunggu</span>
                @endif
              </td>
              <td>{{ $item->room->room_title ?? '-' }}</td>
              <td>
                @if($item->room && $item->room->image)
                  <img src="/room/{{ $item->room->image }}" alt="Foto Ruangan">
                @else
                  <span>-</span>
                @endif
              </td>
              <td>
                <a href="{{ route('export.jadwal.pdf', $item->id) }}" class="btn-pdf" target="_blank">
                  📄 PDF
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
