<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="/tambah-pengguna" class="btn btn-warning mb-3">Tambah Pengguna</a>
    <table class="table table-stripped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
            <td>Peran</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->Username }}</td>
                <td>**************</td>
                <td>{{ $isi->Email }}</td>
                <td>{{ $isi->Peran }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="/pengguna/{{ $isi->id }}/edit" class="btn btn-warning">Edit</a> 
                        <form action="/pengguna/{{ $isi->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Apakah Yakin Ingin Menghapus {{$isi->Username}}')" type="submit" class="btn btn-danger">Hapus</button>
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