<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (request()->is('detail-produk/*'))
        <a href="/penjualan" class="btn btn-secondary mb-3">← Kembali ke Data Penjualan</a>
    @endif

    @if(isset($penjualan))
        {{-- Header informasi penjualan --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Informasi Penjualan</strong></h6>
                        <p><strong>Tanggal:</strong> {{ $penjualan->TanggalPenjualan }}</p>
                        <p><strong>Total Harga:</strong> Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kasir:</strong> {{ $penjualan->pengguna->Username }}</p>
                        <p><strong>Pembeli:</strong> {{ $penjualan->pelanggan->NamaPelanggan }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="/penjualan" class="btn btn-secondary mb-3">← Kembali ke Data Penjualan</a>
    @endif

    <table class="table table-striped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Nama Produk</td>
            <td>Jumlah Produk</td>
            <td>Harga Satuan</td>
            <td>Subtotal</td>
            @if(!isset($penjualan))
                <td>Tanggal Penjualan</td>
            @endif
        </tr>

        @php
            $dataToLoop = isset($details) ? $details : (isset($isi) ? $isi : []);
        @endphp

        @forelse ($dataToLoop as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="/detail-produk/{{ $dt->ProdukID }}" class="text-decoration-none">
                        {{ $dt->produk->NamaProduk }}
                    </a>
                </td>
                <td>{{ $dt->JumlahProduk }}</td>
                <td>Rp {{ number_format($dt->Subtotal / $dt->JumlahProduk, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($dt->Subtotal, 0, ',', '.') }}</td>
                @if(!isset($penjualan))
                    <td>
                        <a href="/penjualan/{{ $dt->PenjualanID }}" class="text-decoration-none">
                            {{ $dt->penjualan->TanggalPenjualan }}
                        </a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="{{ isset($penjualan) ? '5' : '6' }}" class="text-center"><h5>Data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>