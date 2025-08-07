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

    public function edit(Pelanggan $pelanggan)
    {
        return view('edit-pelanggan', ['title' => 'Edit Pelanggan', 'data' => $pelanggan]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'NamaPelanggan' => ['required', 'min:5'],
            'Alamat' => ['required'],
            'NoTelp' => ['required', 'min:10', 'max:13']
        ]);

        Pelanggan::WHERE('id', $id)->UPDATE([
            'NamaPelanggan' => $request->NamaPelanggan,
            'Alamat' => $request->Alamat,
            'NoTelp' => $request->NoTelp
        ]);

        return redirect()->intended('pelanggan')->with('success', 'Edit Pelanggan Berhasil');
    }
}
