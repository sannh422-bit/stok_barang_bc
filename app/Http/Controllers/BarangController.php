<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Menampilkan daftar barang.
     */
    public function index()
    {
        $barangs = Barang::with(['kategori', 'supplier'])
            ->orderBy('id', 'asc')
            ->get();

        return view('master.barang.index', compact('barangs'));
    }

    /**
     * Menampilkan form tambah barang.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('master.barang.create', compact('kategoris', 'suppliers'));
    }

    /**
     * Menyimpan barang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required|max:100',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|max:30',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit barang.
     */
    public function edit(Barang $barang)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('master.barang.edit', compact(
            'barang',
            'kategoris',
            'suppliers'
        ));
    }

    /**
     * Update barang.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|max:100',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|max:30',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        $barang->update($request->all());

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Hapus barang.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}