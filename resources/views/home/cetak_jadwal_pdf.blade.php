<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Peminjaman Ruangan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #2c2c2c;
            margin: 30px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            text-transform: uppercase;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #555;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 4px;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 160px;
            font-weight: bold;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data-table th {
            background-color: #f2f2f2;
            border: 1px solid #999;
            padding: 6px;
            font-size: 11px;
        }

        table.data-table td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
            font-size: 11px;
        }

        .status {
            font-weight: bold;
        }

        .approved { color: #07f93fff; }
        .rejected { color: #ff0606ff; }
        .waiting  { color: #f8c222ff; }

        .room-image {
            margin-top: 15px;
            text-align: center;
            page-break-inside: avoid;
        }

        .room-image img {
            max-width: 300px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .footer {
            margin-top: 40px;
            font-size: 10px;
            text-align: right;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Jadwal Peminjaman Ruangan</h1>
        <p>Sistem Informasi Peminjaman Ruangan</p>
    </div>

    <div class="section">
        <div class="section-title">Data Peminjam</div>
        <table class="info-table">
            <tr>
                <td>Nama</td>
                <td>: {{ $data->name }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: {{ $data->nim }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $data->email }}</td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: {{ $data->phone }}</td>
            </tr>
            <tr>
                <td>Nama Ruangan</td>
                <td>: {{ $data->room->room_title ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Detail Peminjaman</div>

        <table class="data-table">
            <tr>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Jumlah Peserta</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{{ \Carbon\Carbon::parse($data->start_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}</td>
                <td>{{ $data->start_time }}</td>
                <td>{{ $data->end_time }}</td>
                <td>{{ $data->participants ?? '-' }} Orang</td>
                <td class="status
                    @if($data->status === 'Di Setujui') approved
                    @elseif($data->status === 'Di Tolak') rejected
                    @else waiting
                    @endif
                ">
                    {{ $data->status ?? 'Menunggu Persetujuan' }}
                </td>
            </tr>
        </table>
    </div>

    <!-- FOTO RUANGAN DENGAN BASE64 -->
    @if($data->room && $data->room->image)
        <div class="room-image">
            <p><strong>Foto Ruangan</strong></p>
            @php
                $imagePath = public_path('room/' . $data->room->image);
                
                if(file_exists($imagePath)) {
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
                    
                    // Mapping extension ke MIME type
                    $mimeTypes = [
                        'jpg' => 'jpeg',
                        'jpeg' => 'jpeg',
                        'png' => 'png',
                        'gif' => 'gif',
                        'webp' => 'webp'
                    ];
                    
                    $mimeType = $mimeTypes[strtolower($extension)] ?? 'jpeg';
                    $src = 'data:image/' . $mimeType . ';base64,' . $imageData;
                } else {
                    $src = null;
                }
            @endphp
            
            @if($src)
                <img src="{{ $src }}">
            @else
                <p style="color: #999; font-style: italic;">Gambar tidak tersedia</p>
            @endif
        </div>
    @endif

    <div class="footer">
        Dicetak pada {{ \Carbon\Carbon::now()->format('d F Y, H:i') }} WIB
    </div>

</body>
</html>