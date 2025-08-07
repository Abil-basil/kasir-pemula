<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk', ['title' => 'produk', 'data' => Produk::all()]);
    }

    public function produk (produk $produk)
    {
        $data = [
            'isi' => $produk->DetailPenjualan,
            'title' => 'History Penjualan Dari Barang ' . $produk->NamaProduk,
        ];

        return view('/detail-penjualan', $data);
    }

    public function create()
    {
        return view('create-produk', ['title' => 'Tambah Produk']);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'NamaProduk' => ['required'],
            'Harga' => ['required'],
            'Stok' => ['required'],
        ]);

        Produk::create([
            'NamaProduk' => $request->NamaProduk,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok
        ]);

        return redirect()->intended('produk')->with('success', 'Tambah Data Berhasil');
    }

    public function edit(Produk $produk)
    {
        return view('edit-produk', ['title' => 'Edit Produk', 'data' => $produk]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'NamaProduk' => ['required'],
            'Harga' => ['required'],
            'Stok' => ['required']
        ]);

        Produk::WHERE('id', $id)->UPDATE([
            'NamaProduk' => $request->NamaProduk,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok
        ]);

        return redirect()->intended('produk')->with('success', 'Edit Produk Berhasil');
    }

    public function delete(Produk $produk)
    {
        if ( $produk->DetailPenjualan()->count() > 0 )
        {
            return redirect('produk')->with('success', 'Produk tidak bisa dihapus karena masih memiliki penjualan.');
        }

        Produk::WHERE('id', $produk->id)->DELETE();

        return redirect()->intended('produk')->with('success', 'Hapus produk '. $produk->NamaProduk .' Berhasil');
    }
}
