<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/daftar" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="username">Username  </label>
            <input type="text" name="Username" class="form-control @error('Username') is-invalid @enderror" placeholder="Masukan Username anda.." value="{{ old('Username') }}">
            @error('Username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="email">email</label>
            <input type="email" name="Email" class="form-control @error('Email') is-invalid @enderror" placeholder="Masukan email anda.." required value="{{ old('Email') }}">
            @error('Email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="Password" class="form-control @error('Password') is-invalid @enderror" placeholder="Masukan Password anda.." required>
            @error ('Password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="peran">Role</label>
            <select name="Peran" id="peran" class="form-control @error('Peran') is-invalid @enderror">
                <option value="">pilih role</option>
                <option value="Admin">admin</option>
                <option value="Petugas">petugas</option>
            </select>
            @error('Peran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">
                DAFTAR
            </button>
        </div>
    </form>

</x-layout-login>