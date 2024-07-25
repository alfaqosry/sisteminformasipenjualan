<?php

use App\Models\Barang;
use App\Models\Cabangtoko;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\CabangtokoController;

Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



    Route::get('/cabang', [CabangtokoController::class, 'index'])->name('cabang.index');
    Route::get('/cabang/create', [CabangtokoController::class, 'create'])->name('cabang.create');
    Route::post('/cabang/store', [CabangtokoController::class, 'store'])->name('cabang.store');


    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');

    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
});
