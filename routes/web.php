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

Route::get('login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login']);

Route::get('daftar', [LoginController::class, 'daftar']);

// pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
// create
Route::get('/tambah-pengguna', [PenggunaController::class, 'create']);
Route::post('/pengguna', [PenggunaController::class, 'store']);
// update
Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit']);
Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
// delete
Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'delete']);


// pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
// create
Route::get('/tambah-pelanggan', [PelangganController::class, 'create']);
Route::post('/pelanggan', [PelangganController::class, 'store']);
// update
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit']);
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
// delete
Route::delete('pelanggan/{pelanggan}', [PelangganController::class, 'delete']); 



// produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/detail-produk/{produk}', [ProdukController::class, 'produk']);
// create
Route::get('/tambah-produk', [ProdukController::class, 'create']);
Route::post('/produk', [ProdukController::class, 'store']);
// update
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);
// delete
Route::delete('/produk/{produk}', [ProdukController::class, 'delete']);


Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/{penjualan}', [PenjualanController::class, 'show']);
Route::get('/download-pdf', [PenjualanController::class, 'pdf']);

// untuk detail penjualan disatukan di controller penjualan
// Route::get('detail-penjualan', [DetailPenjualanController::class, 'index']);

