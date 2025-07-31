<x-layout-page>
    <x-slot:title>{{ $title }}</x-slot:title>

    <table class="table table-stripped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
            <td>Peran</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->Username }}</td>
                <td>**************</td>
                <td>{{ $isi->Email }}</td>
                <td>{{ $isi->Peran }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>