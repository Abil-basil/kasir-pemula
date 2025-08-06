<?php

use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login']);

Route::get('/daftar', [LoginController::class, 'daftar']);

Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/tambah-pengguna', [PenggunaController::class, 'create']);
Route::post('/pengguna', [PenggunaController::class, 'store']);


Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/tambah-pelanggan', [PelangganController::class, 'create']);
Route::post('/pelanggan', [PelangganController::class, 'store']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/detail-produk/{produk}', [ProdukController::class, 'produk']);
Route::get('/tambah-produk', [ProdukController::class, 'create']);
Route::post('/produk', [ProdukController::class, 'store']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/{penjualan}', [PenjualanController::class, 'show']);
Route::get('/download-pdf', [PenjualanController::class, 'pdf']);

Route::get('/detail-penjualan', [DetailPenjualanController::class, 'index']);

