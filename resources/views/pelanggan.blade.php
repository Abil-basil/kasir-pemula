<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="tambah-pelanggan" class="btn btn-warning mb-3">Tambah Pelanggan</a>
    <table class="table table-stripped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Nama Pelanggan</td>
            <td>Alamat</td>
            <td>No Telepon</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->NamaPelanggan }}</td>
                <td>{{ $isi->Alamat }}</td>
                <td>{{ $isi->NoTelp }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>