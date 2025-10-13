<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Jadwal Peminjaman Ruangan</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 30px;
            color: #2c3e50;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #34495e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 10px;
            font-size: 14px;
        }

        td {
            padding: 10px;
            font-size: 13px;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .approved {
            background-color: #d4edda;
            color: #155724;
        }

        .rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .waiting {
            background-color: #fff3cd;
            color: #856404;
        }

        .info-section {
            margin-top: 15px;
            line-height: 1.6;
        }

        .info-section strong {
            color: #2c3e50;
        }

        img {
            border-radius: 8px;
            margin-top: 8px;
            width: 180px;
            height: 120px;
            object-fit: cover;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
            font-size: 13px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <h2>📄 Jadwal Peminjaman Ruangan</h2>

    <div class="info-section">
        <p><strong>Nama Peminjam:</strong> {{ $data->name }}</p>
        <p><strong>Email:</strong> {{ $data->email }}</p>
        <p><strong>No Telepon:</strong> {{ $data->phone }}</p>
        <p><strong>Nama Ruangan:</strong> {{ $data->room->room_title ?? '-' }}</p>
    </div>

    <table>
        <tr>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Selesai</th>
            <th>Jam Pinjam</th>
            <th>Jam Selesai</th>
            <th>Jumlah Peserta</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{ $data->start_date }}</td>
            <td>{{ $data->end_date }}</td>
            <td>{{ $data->start_time }}</td>
            <td>{{ $data->end_time }}</td>
            <td>{{ $data->participants ?? '-' }}</td>
            <td>
                @if($data->status == 'Di Setujui')
                    <span class="status approved">Di Setujui</span>
                @elseif($data->status == 'Di Tolak')
                    <span class="status rejected">Di Tolak</span>
                @else
                    <span class="status waiting">Menunggu</span>
                @endif
            </td>
        </tr>
    </table>

    @if($data->room && $data->room->image)
        <div style="text-align:center; margin-top:20px;">
            <p><strong>Foto Ruangan:</strong></p>
            <img src="{{ public_path('room/'.$data->room->image) }}" alt="Foto Ruangan">
        </div>
    @endif

    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}</p>
    </div>
</body>
</html>
