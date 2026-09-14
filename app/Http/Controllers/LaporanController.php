<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LAPORAN BARANG MASUK
    |--------------------------------------------------------------------------
    */

    public function barangMasuk(Request $request)
    {
        $query = BarangMasuk::with('barang');

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'tanggal',
                '<=',
                $request->tanggal_akhir
            );
        }

        $barangMasuk = $query
            ->latest('tanggal')
            ->get();

        $totalTransaksi = $barangMasuk->count();

        $totalJumlah = $barangMasuk->sum('jumlah');

        return view('laporan.barang-masuk', compact(
            'barangMasuk',
            'totalTransaksi',
            'totalJumlah'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | LAPORAN BARANG KELUAR
    |--------------------------------------------------------------------------
    */

    public function barangKeluar(Request $request)
    {
        $query = BarangKeluar::with('barang');

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'tanggal',
                '<=',
                $request->tanggal_akhir
            );
        }

        $barangKeluar = $query
            ->latest('tanggal')
            ->get();

        $totalTransaksi = $barangKeluar->count();

        $totalJumlah = $barangKeluar->sum('jumlah');

        return view('laporan.barang-keluar', compact(
            'barangKeluar',
            'totalTransaksi',
            'totalJumlah'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | LAPORAN STOK
    |--------------------------------------------------------------------------
    */

    public function stok(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | QUERY DATA BARANG
        |--------------------------------------------------------------------------
        */

        $query = Barang::with([
            'kategori',
            'supplier'
        ]);


        /*
        |--------------------------------------------------------------------------
        | PENCARIAN BARANG
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('kode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%');

            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER KATEGORI
        |--------------------------------------------------------------------------
        */

        if ($request->filled('kategori_id')) {

            $query->where(
                'kategori_id',
                $request->kategori_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS STOK
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            switch ($request->status) {

                case 'aman':

                    $query->where('stok', '>', 5);

                    break;


                case 'menipis':

                    $query->where('stok', '>', 0)
                        ->where('stok', '<=', 5);

                    break;


                case 'habis':

                    $query->where('stok', '<=', 0);

                    break;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $barang = $query
            ->orderBy('nama_barang')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATISTIK BERDASARKAN HASIL FILTER
        |--------------------------------------------------------------------------
        */

        $totalBarang = $barang->count();

        $totalStok = $barang->sum('stok');

        $stokAman = $barang
            ->where('stok', '>', 5)
            ->count();

        $stokMenipis = $barang
            ->where('stok', '>', 0)
            ->where('stok', '<=', 5)
            ->count();

        $stokHabis = $barang
            ->where('stok', '<=', 0)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DATA KATEGORI UNTUK FILTER
        |--------------------------------------------------------------------------
        */

        $kategoris = Kategori::orderBy('nama_kategori')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('laporan.stok', compact(
            'barang',
            'kategoris',
            'totalBarang',
            'totalStok',
            'stokAman',
            'stokMenipis',
            'stokHabis'
        ));
    }
}