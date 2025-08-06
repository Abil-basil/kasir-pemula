<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    <table class="table table-stripped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Tanggal Penjualan</td>
            <td>Total Harga</td>
            <td>Pengguna</td>
            <td>Pelanggan</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->TanggalPenjualan }}</td>
                <td>{{ $isi->TotalHarga }}</td>
                <td>{{ $isi->Pengguna->Username }}</td>
                <td>{{ $isi->Pelanggan->NamaPelanggan }}</td>
                <td>
                    <a href="/penjualan/{{$isi->id}}" class="btn btn-warning">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>