<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Laporan Barang Masuk
     */
    public function barangMasuk(Request $request)
    {
        $query = BarangMasuk::with('barang');

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
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


    /**
     * Laporan Barang Keluar
     */
    public function barangKeluar(Request $request)
    {
        $query = BarangKeluar::with('barang');

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
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


    /**
     * Laporan Stok
     */
    public function stok(Request $request)
    {
        $query = Barang::with(['kategori', 'supplier']);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'kode_barang',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'nama_barang',
                    'like',
                    '%' . $search . '%'
                );

            });
        }

        if ($request->filled('kategori_id')) {

            $query->where(
                'kategori_id',
                $request->kategori_id
            );
        }

        if ($request->filled('status')) {

            switch ($request->status) {

                case 'aman':

                    $query->where('stok', '>', 5);

                    break;

                case 'menipis':

                    $query
                        ->where('stok', '>', 0)
                        ->where('stok', '<=', 5);

                    break;

                case 'habis':

                    $query->where('stok', '<=', 0);

                    break;
            }
        }

        $barang = $query
            ->orderBy('nama_barang')
            ->get();

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

        $kategoris = Kategori::orderBy('nama_kategori')
            ->get();

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


    /**
     * Laporan Pendapatan
     */
    public function pendapatan(Request $request)
    {
        $query = BarangKeluar::with('barang');

        /*
        |--------------------------------------------------------------------------
        | Filter tanggal
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | Ambil data
        |--------------------------------------------------------------------------
        */

        $barangKeluar = $query
            ->latest('tanggal')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Hitung total
        |--------------------------------------------------------------------------
        */

        $totalTransaksi = $barangKeluar->count();

        $totalJumlah = $barangKeluar->sum('jumlah');


        /*
        |--------------------------------------------------------------------------
        | Hitung pendapatan
        |
        | jumlah barang keluar × harga jual
        |--------------------------------------------------------------------------
        */

        $totalPendapatan = $barangKeluar->sum(function ($item) {

            if (!$item->barang) {
                return 0;
            }

            return $item->jumlah * $item->barang->harga_jual;
        });


        /*
        |--------------------------------------------------------------------------
        | Kirim ke view
        |--------------------------------------------------------------------------
        */

        return view('laporan.pendapatan', compact(
            'barangKeluar',
            'totalTransaksi',
            'totalJumlah',
            'totalPendapatan'
        ));
    }
}