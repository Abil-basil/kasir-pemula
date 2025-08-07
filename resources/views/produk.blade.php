<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="tambah-produk" class="btn btn-warning mb-3">Tambah Produk</a>
    <table class="table table-stripped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->NamaProduk }}</td>
                <td>{{ $isi->Harga }}</td>
                <td>{{ $isi->Stok }}</td>
                <td>
                    <a href="/produk/{{ $isi->id}}/edit" class="btn btn-warning">Edit</a>
                    <a href="/produk/{{ $isi->id }}/hapus" onclick="return confirm('yakin ingin menghapus')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>