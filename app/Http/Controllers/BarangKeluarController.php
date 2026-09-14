<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Menampilkan daftar barang keluar.
     */
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')
            ->orderBy('id', 'asc')
            ->get();

        return view('transaksi.barang_keluar.index', compact('barangKeluars'));
    }

    /**
     * Menampilkan form tambah barang keluar.
     */
    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('transaksi.barang_keluar.create', compact('barangs'));
    }

    /**
     * Simpan barang keluar.
     */
   public function store(Request $request)
{
    $request->validate([
        'barang_id'   => 'required|exists:barangs,id',
        'jumlah'      => 'required|integer|min:1',
        'tanggal'     => 'required|date',
        'keterangan'  => 'nullable|max:255',
    ]);

    $barang = Barang::findOrFail($request->barang_id);

    // Validasi stok
    if ($request->jumlah > $barang->stok) {

        return back()
            ->withInput()
            ->withErrors([
                'jumlah' => 'Stok barang tidak mencukupi.'
            ]);

    }

    BarangKeluar::create([
        'barang_id'   => $request->barang_id,
        'jumlah'      => $request->jumlah,
        'tanggal'     => $request->tanggal,
        'keterangan'  => $request->keterangan,
    ]);

    // Kurangi stok
    $barang->decrement('stok', $request->jumlah);

    return redirect()
        ->route('barang-keluar.index')
        ->with('success', 'Barang keluar berhasil ditambahkan.');
}

    /**
     * Form edit.
     */
   public function edit(BarangKeluar $barangKeluar)
{
    $barangs = Barang::orderBy('nama_barang')->get();

    return view(
        'transaksi.barang_keluar.edit',
        compact('barangKeluar', 'barangs')
    );
}

    /**
     * Update barang keluar.
     */
   public function update(Request $request, BarangKeluar $barangKeluar)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|max:255',
    ]);

    // Kembalikan stok lama
    $barangLama = Barang::findOrFail($barangKeluar->barang_id);
    $barangLama->increment('stok', $barangKeluar->jumlah);

    // Barang yang dipilih setelah diedit
    $barangBaru = Barang::findOrFail($request->barang_id);

    // Cek stok
    if ($request->jumlah > $barangBaru->stok) {

        // Balikin lagi stok lama karena update dibatalkan
        $barangLama->decrement('stok', $barangKeluar->jumlah);

        return back()
            ->withInput()
            ->withErrors([
                'jumlah' => 'Stok barang tidak mencukupi.'
            ]);
    }

    // Kurangi stok baru
    $barangBaru->decrement('stok', $request->jumlah);

    $barangKeluar->update([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()
        ->route('barang-keluar.index')
        ->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Hapus barang keluar.
     */
   public function destroy(BarangKeluar $barangKeluar)
{
    $barang = Barang::findOrFail($barangKeluar->barang_id);

    // Kembalikan stok
    $barang->increment('stok', $barangKeluar->jumlah);

    $barangKeluar->delete();

    return redirect()
        ->route('barang-keluar.index')
        ->with('success', 'Data berhasil dihapus.');
}
}