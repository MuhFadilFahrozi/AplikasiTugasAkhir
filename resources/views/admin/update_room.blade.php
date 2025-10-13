<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')

    <style>
      .form-section {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .form-section h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #333;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #444;
      }

      input[type="text"],
      input[type="number"],
      select,
      textarea,
      input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
      }

      textarea {
        resize: vertical;
      }

      .btn-submit {
        display: block;
        width: 100%;
        font-weight: 600;
        padding: 10px;
        border-radius: 6px;
      }

      img.preview {
        display: block;
        margin: 10px auto;
        border-radius: 8px;
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

            <div class="form-section">
              <h1>Edit Ruangan</h1>

              <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Ruangan --}}
                <div class="form-group">
                  <label for="room_title">Nama Ruangan</label>
                  <input type="text" id="room_title" name="room_title" value="{{ $data->room_title }}" required>
                </div>

                {{-- Kapasitas --}}
                <div class="form-group">
                  <label for="capacity">Kapasitas (Orang)</label>
                  <input type="number" id="capacity" name="capacity" min="1" value="{{ $data->capacity }}">
                </div>

<div class="form-group">
  <label for="facilities">Fasilitas</label>
  <select id="facilities" name="facilities[]" multiple="multiple" class="form-control select2">
    <option value="AC">AC</option>
    <option value="Proyektor">Proyektor</option>
    <option value="Sound System">Sound System</option>
    <option value="WiFi">WiFi</option>
    <option value="Mic Wireless">Mic </option>
    <option value="Kursi dan Meja">Kursi</option>
    <option value="Kursi dan Meja">Meja</option>
    <option value="Smart TV">Screen</option>
    
  </select>
</div>



                {{-- Gambar Saat Ini --}}
                <div class="form-group">
                  <label>Gambar Saat Ini</label>
                  <img class="preview" src="/room/{{ $data->image }}" width="150">
                </div>

                {{-- Upload Gambar Baru --}}
                <div class="form-group">
                  <label for="image">Upload Gambar Baru (opsional)</label>
                  <input type="file" id="image" name="image">
                </div>

                {{-- Tombol Update --}}
                <button type="submit" class="btn btn-primary btn-submit">Update Ruangan</button>
              </form>
            </div>

            {{-- SweetAlert Notifikasi --}}
            @if(session('message'))
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: "{{ session('message') }}",
                  timer: 2000,
                  showConfirmButton: false
                });
              </script>
            @endif

          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
    <!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('.select2').select2({
          placeholder: "Pilih fasilitas ruangan",
          allowClear: true
      });
  });
</script>

  </body>
</html>
