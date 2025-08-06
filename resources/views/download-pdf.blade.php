<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-pdf</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            margin-top: 20px;
        }
        th, td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    
    @if ($title == 'penjualan')
        <table>
            <tr>
                <th>No</th>
                <th>Tanggal Penjualan</th>
                <th>Total Harga</th>
                <th>Pengguna</th>
                <th>Pelanggan</th>
            </tr>
            @forelse ($data as $isi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $isi->TanggalPenjualan }}</td>
                    <td>{{ $isi->TotalHarga }}</td>
                    <td>{{ $isi->Pengguna->Username }}</td>
                    <td>{{ $isi->Pelanggan->NamaPelanggan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center"><h5>data kosong</h5></td>
                </tr>
            @endforelse
        </table>
    @endif

</body>
</html>