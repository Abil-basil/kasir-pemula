<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna', ['title' => 'pengguna', 'data' => Pengguna::all()]);
    }

    public function create()
    {
        return view('create-pengguna', ['title' => 'Tambah Pengguna']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8'],
            'email' => ['email', 'required'],
            'peran' => ['required']
        ]);


        Pengguna::create([               
            'Username' => $request->username,
            'Password' => $request->password,
            'Email' => $request->email,
            'Peran' => $request->peran
        ]);
    
        return redirect()->intended('pengguna')->with('success', 'Tambah Pengguna Berhasil');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('edit-pengguna', ['title' => 'Edit Pengguna', 'data' => $pengguna]);
    }

    public function update($id, Request $request)
    {
       $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8'],
            'email' => ['email', 'required'],
            'peran' => ['required']
        ]);

        Pengguna::WHERE('id', $id)->UPDATE([
            'Username' => $request->username,
            'Password' => bcrypt($request->password),
            'Email' => $request->email,
            'Peran' => $request->peran
        ]);

        return redirect()->intended('pengguna')->with('success', 'Edit Pengguna Berhasil');
    }

    public function delete(Pengguna $pengguna)
    {
        // untuk mengecek apakah pengguna ini masih ada kaitannya dengan tabel penjualan
        if ($pengguna->penjualan()->count() > 0) {
            // jika true kirim success dengan pesan berikut
            return redirect('/pengguna')->with('success', 'Pengguna tidak bisa dihapus karena masih memiliki penjualan.');
        }

        // jika tidak ada jalankan code di bawah
        Pengguna::WHERE('id', $pengguna->id)->DELETE();

        return redirect()->intended('pengguna')->with('success', 'Hapus Data Berhasil');
    }
}
