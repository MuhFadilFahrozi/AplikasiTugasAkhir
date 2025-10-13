<!DOCTYPE html>
<html lang="en">
  <head> 
    @include('admin.css')

    <style>
      .table-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
      }

      th, td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
      }

      tr:hover {
        background-color: #f2f2f2;
      }

      img.room-img {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
      }

      .btn {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
      }

      .btn-danger {
        background-color: #dc3545;
        color: #fff;
      }

      .btn-warning {
        background-color: #ffc107;
        color: #000;
      }

      .btn:hover {
        opacity: 0.85;
      }

      h1.title {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #333;
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="table-container">
              <h1 class="title">Daftar Ruangan</h1>

              <table>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Fasilitas</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $index => $room)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $room->room_title }}</td>
                    <td>{{ $room->capacity ?? '-' }} Orang</td>
                    <td>
                      @if($room->facilities)
                        {{ Str::limit($room->facilities, 80) }}
                      @else
                        <span class="text-muted">Tidak ada data</span>
                      @endif
                    </td>
                    <td>
                      @if($room->image)
                        <img class="room-img" src="{{ asset('room/' . $room->image) }}" alt="Gambar Ruangan">
                      @else
                        <span class="text-muted">Belum ada gambar</span>
                      @endif
                    </td>
                    <td>
                      <a 
                        onclick="return confirm('Apakah kamu yakin ingin menghapus ruangan ini?');"
                        class="btn btn-danger"
                        href="{{ url('room_delete', $room->id) }}">
                        Hapus
                      </a>
                      <a 
                        class="btn btn-warning"
                        href="{{ url('room_update', $room->id) }}">
                        Edit
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
