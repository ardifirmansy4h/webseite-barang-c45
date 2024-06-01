<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Models\HistoriPenjualan;
use Illuminate\Support\Facades\Route;


//dashboard
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard.index');

//barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang/tambah', [BarangController::class, 'store'])->name('barang.store');
Route::post('/barang/edit/', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.hapus');
Route::post('/barang/tambah/stok', [BarangController::class, 'storeStok'])->name('barang.store.stok');
Route::post('/barang/penjualan', [BarangController::class, 'penjualan'])->name('barang.penjualan');

//penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');

//Stok
Route::get('/stok', [BarangController::class, 'tersedia'])->name('stok.tersedia');
Route::get('/stok/barang/habis', [BarangController::class, 'habisBarang'])->name('stok.habis');
