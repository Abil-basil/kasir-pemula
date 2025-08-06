<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan', ['title' => 'pelanggan', 'data' => Pelanggan::all()]);
    }

    public function create()
    {
        return view('create-pelanggan', ['title' => 'Tambah Pelanggan']);
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'NamaPelanggan' => ['required'],
            'NoTelp' => ['required'],
            'Alamat' => ['required'],
        ]);

        Pelanggan::create([
            'NamaPelanggan' => $request->NamaPelanggan,
            'Alamat' => $request->Alamat,
            'NoTelp' => $request->NoTelp,
        ]);

        return redirect()->intended('pelanggan')->with('success', 'Tambah Pelanggan Berhasil');
    }
}
