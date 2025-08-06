<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container my-5">
        <h3>Aplikasi Kasir</h3>
        <div class="alert alert-info">
            Selamat Datang <b>Ahay</b> Sebagai <b>Admin</b>
        </div>

        @if (!request()->is('penjualan/*') && !request()->is('detail-produk/*'))
            <a href="pengguna" class="btn btn-warning">pengguna</a>
            <a href="pelanggan" class="btn btn-warning">pelanggan</a>
            <a href="produk" class="btn btn-warning">produk</a>
            <a href="penjualan" class="btn btn-warning">penjualan</a>
            <a href="#" class="btn btn-danger">Logout</a>
            @if (request()->is('penjualan'))
                <a href="download-pdf" class="btn btn-info">Download Pdf</a>
            @endif
        @endif

        <div class="card mt-2">
            <div class="card-body">
                <h4 class="mb-3">{{ $title }}</h4>
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>