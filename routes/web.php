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
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | MASTER DATA - BISA DILIHAT ADMIN & USER
    |--------------------------------------------------------------------------
    */

    // =========================
    // BARANG
    // =========================

    Route::get('/barang', [BarangController::class, 'index'])
        ->name('barang.index');

    Route::get('/barang/{barang}', [BarangController::class, 'show'])
        ->name('barang.show');


    // =========================
    // KATEGORI
    // =========================

    Route::get('/kategori', [KategoriController::class, 'index'])
        ->name('kategori.index');

    Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])
        ->name('kategori.show');


    // =========================
    // SUPPLIER
    // =========================

    Route::get('/supplier', [SupplierController::class, 'index'])
        ->name('supplier.index');

    Route::get('/supplier/{supplier}', [SupplierController::class, 'show'])
        ->name('supplier.show');


    /*
    |--------------------------------------------------------------------------
    | MASTER DATA - ADMIN SAJA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        // Barang
        Route::get('/barang/create', [BarangController::class, 'create'])
            ->name('barang.create');

        Route::post('/barang', [BarangController::class, 'store'])
            ->name('barang.store');

        Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])
            ->name('barang.edit');

        Route::put('/barang/{barang}', [BarangController::class, 'update'])
            ->name('barang.update');

        Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])
            ->name('barang.destroy');


        // Kategori
        Route::get('/kategori/create', [KategoriController::class, 'create'])
            ->name('kategori.create');

        Route::post('/kategori', [KategoriController::class, 'store'])
            ->name('kategori.store');

        Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])
            ->name('kategori.edit');

        Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])
            ->name('kategori.update');

        Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])
            ->name('kategori.destroy');


        // Supplier
        Route::get('/supplier/create', [SupplierController::class, 'create'])
            ->name('supplier.create');

        Route::post('/supplier', [SupplierController::class, 'store'])
            ->name('supplier.store');

        Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])
            ->name('supplier.edit');

        Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])
            ->name('supplier.update');

        Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])
            ->name('supplier.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI - ADMIN & USER
    |--------------------------------------------------------------------------
    */

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);

    // Barang Keluar
    Route::resource('barang-keluar', BarangKeluarController::class);


    /*
    |--------------------------------------------------------------------------
    | LAPORAN - ADMIN & USER
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
    | KELOLA PENGGUNA - ADMIN SAJA
    |--------------------------------------------------------------------------
    */
Route::middleware('role:admin')->group(function () {

    Route::resource('users', \App\Http\Controllers\UserController::class)
        ->except(['show']);
});


    /*
    |--------------------------------------------------------------------------
    | PROFILE - ADMIN & USER
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
    | PENDAPATAN - ADMIN & USER
    |--------------------------------------------------------------------------
    */

    Route::get('/pendapatan', [DashboardController::class, 'pendapatan'])
        ->name('pendapatan.index');
});


require __DIR__.'/auth.php';