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
                    <div class="d-flex gap-2">
                    <a href="/penjualan/{{$isi->id}}" class="btn btn-info">Detail</a>
                    <a href="/penjualan/{{ $isi->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/penjualan/{{ $isi->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>