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
        return view('create-pengguna', ['title' => 'pengguna']);
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
}
