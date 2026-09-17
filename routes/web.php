<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */

    // Barang (CRUD)
    Route::resource('barang', BarangController::class);

    // Kategori (CRUD)
    Route::resource('kategori', KategoriController::class);

    // Supplier (CRUD)
    Route::resource('supplier', SupplierController::class);

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    // Barang Masuk (CRUD)
    Route::resource('barang-masuk', BarangMasukController::class);

    Route::resource('barang-keluar', BarangKeluarController::class);

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */
Route::get('/laporan/stok', [LaporanController::class, 'stok'])
    ->name('laporan.stok');
    
Route::get('/laporan/barang-masuk', [LaporanController::class, 'barangMasuk'])
    ->name('laporan.barang-masuk');

Route::get('/laporan/barang-keluar', [LaporanController::class, 'barangKeluar'])
    ->name('laporan.barang-keluar');

    Route::get('/laporan/pendapatan', [LaporanController::class, 'pendapatan'])
    ->name('laporan.pendapatan');
    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::view('/users', 'users.index')
        ->name('users.index');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

        /*
    |--------------------------------------------------------------------------
    | pendapatan
    |--------------------------------------------------------------------------
    */

        Route::get('/pendapatan', [DashboardController::class, 'pendapatan'])
    ->name('pendapatan.index');
});

require __DIR__.'/auth.php';