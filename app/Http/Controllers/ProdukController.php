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
}
