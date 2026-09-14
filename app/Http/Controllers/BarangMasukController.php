<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Menampilkan daftar barang masuk.
     */
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang')
            ->latest()
            ->get();

        return view('transaksi.barang_masuk.index', compact('barangMasuks'));
    }

    /**
     * Menampilkan form tambah.
     */
    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('transaksi.barang_masuk.create', compact('barangs'));
    }

    /**
     * Simpan data.
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

    BarangMasuk::create([
        'barang_id'   => $request->barang_id,
        'jumlah'      => $request->jumlah,
        'tanggal'     => $request->tanggal,
        'keterangan'  => $request->keterangan,
    ]);

    // Tambah stok otomatis
    $barang->increment('stok', $request->jumlah);

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Barang masuk berhasil ditambahkan.');
}

    /**
     * Edit.
     */
   public function edit(BarangMasuk $barangMasuk)
{
    $barangs = Barang::orderBy('nama_barang')->get();

    return view(
        'transaksi.barang_masuk.edit',
        compact('barangMasuk', 'barangs')
    );
}

    /**
     * Update.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|max:255',
    ]);

    $barang = Barang::findOrFail($barangMasuk->barang_id);

    // Kembalikan stok lama
    $barang->decrement('stok', $barangMasuk->jumlah);

    // Jika barang diganti
    if ($barangMasuk->barang_id != $request->barang_id) {

        $barang = Barang::findOrFail($request->barang_id);

    }

    // Tambahkan stok baru
    $barang->increment('stok', $request->jumlah);

    $barangMasuk->update([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Hapus.
     */
    public function destroy(BarangMasuk $barangMasuk)
{
    $barang = Barang::findOrFail($barangMasuk->barang_id);

    // Kurangi stok
    $barang->decrement('stok', $barangMasuk->jumlah);

    $barangMasuk->delete();

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Data berhasil dihapus.');
}
}