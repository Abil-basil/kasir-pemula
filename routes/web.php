<?php

use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/pengguna', [PenggunaController::class, 'index']);

Route::get('/pelanggan', [PelangganController::class, 'index']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/detail-produk/{produk}', [ProdukController::class, 'produk']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/{penjualan}', [PenjualanController::class, 'show']);
Route::get('/penjualan/view/pdf', [PenjualanController::class, 'view_pdf']);

Route::get('/detail-penjualan', [DetailPenjualanController::class, 'index']);

