<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ===========================
        // CARD STATISTIK
        // ===========================

        $totalBarang = Barang::count();

        $totalKategori = Kategori::count();

        $totalSupplier = Supplier::count();

        $totalStok = Barang::sum('stok');

        // ===========================
        // BARANG MASUK / KELUAR HARI INI
        // ===========================

        $barangMasukHariIni = BarangMasuk::whereDate(
            'tanggal',
            Carbon::today()
        )->sum('jumlah');

        $barangKeluarHariIni = BarangKeluar::whereDate(
            'tanggal',
            Carbon::today()
        )->sum('jumlah');

        // ===========================
        // TOTAL PENDAPATAN
        // ===========================

        $totalPendapatan = BarangKeluar::join(
            'barangs',
            'barang_keluars.barang_id',
            '=',
            'barangs.id'
        )
        ->sum(DB::raw('barang_keluars.jumlah * barangs.harga_jual'));

        // ===========================
        // STOK MENIPIS
        // ===========================

        $stokMenipis = Barang::where('stok', '<=', 5)
            ->orderBy('stok')
            ->take(5)
            ->get();

        // ===========================
        // GRAFIK HARIAN
        // ===========================

        $labelHarian = [];
        $grafikMasuk = [];
        $grafikKeluar = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = Carbon::today()->subDays($i);

            $labelHarian[] = $tanggal->format('d M');

            $grafikMasuk[] = BarangMasuk::whereDate(
                'tanggal',
                $tanggal
            )->sum('jumlah');

            $grafikKeluar[] = BarangKeluar::whereDate(
                'tanggal',
                $tanggal
            )->sum('jumlah');
        }

        // ===========================
        // GRAFIK BULANAN
        // ===========================

        $labelBulanan = [];
        $masukBulanan = [];
        $keluarBulanan = [];

        for ($i = 1; $i <= 12; $i++) {

            $labelBulanan[] = Carbon::create()->month($i)->translatedFormat('M');

            $masukBulanan[] = BarangMasuk::whereMonth('tanggal', $i)
                ->whereYear('tanggal', now()->year)
                ->sum('jumlah');

            $keluarBulanan[] = BarangKeluar::whereMonth('tanggal', $i)
                ->whereYear('tanggal', now()->year)
                ->sum('jumlah');
        }

        // ===========================
        // BARANG TERLARIS
        // ===========================

        $barangTerlaris = BarangKeluar::selectRaw(
                'barang_id, SUM(jumlah) as total_keluar'
            )
            ->with('barang')
            ->groupBy('barang_id')
            ->orderByDesc('total_keluar')
            ->take(5)
            ->get();


            
        // ===========================
        // AKTIVITAS TERBARU
        // ===========================

        $aktivitasMasuk = BarangMasuk::with('barang')
            ->get()
            ->map(function ($item) {

                return (object)[
                    'jenis' => 'Masuk',
                    'barang' => $item->barang,
                    'jumlah' => $item->jumlah,
                    'tanggal' => $item->tanggal,
                    'created_at' => $item->created_at,
                ];

            });

        $aktivitasKeluar = BarangKeluar::with('barang')
            ->get()
            ->map(function ($item) {

                return (object)[
                    'jenis' => 'Keluar',
                    'barang' => $item->barang,
                    'jumlah' => $item->jumlah,
                    'tanggal' => $item->tanggal,
                    'created_at' => $item->created_at,
                ];

            });

        $aktivitasTerbaru = $aktivitasMasuk
            ->merge($aktivitasKeluar)
            ->sortByDesc('created_at')
            ->take(10);

        return view('dashboard.index', compact(

            'totalBarang',
            'totalKategori',
            'totalSupplier',
            'totalStok',

            'barangMasukHariIni',
            'barangKeluarHariIni',

            'totalPendapatan',

            'stokMenipis',

            'labelHarian',
            'grafikMasuk',
            'grafikKeluar',

            'labelBulanan',
            'masukBulanan',
            'keluarBulanan',

            'barangTerlaris',

            'aktivitasTerbaru'

        ));
    }

    public function pendapatan()
{
    $pendapatan = BarangKeluar::with('barang')
        ->latest('tanggal')
        ->get();

    $totalPendapatan = BarangKeluar::join(
            'barangs',
            'barang_keluars.barang_id',
            '=',
            'barangs.id'
        )
        ->select(
            DB::raw('SUM(barang_keluars.jumlah * barangs.harga_jual) as total')
        )
        ->value('total');

    return view('dashboard.pendapatan', compact(
        'pendapatan',
        'totalPendapatan'
    ));
}

}