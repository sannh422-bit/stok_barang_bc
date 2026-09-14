<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
{
    $kategoris = Kategori::orderBy('id', 'asc')->get();

    return view('master.kategori.index', compact('kategoris'));
}
    /**
     * Menampilkan form tambah kategori.
     */
   public function create()
{
    return view('master.kategori.create');
}

    /**
     * Menyimpan data kategori.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required|max:100|unique:kategoris,nama_kategori',
        'deskripsi' => 'nullable',
    ]);

    Kategori::create([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()
        ->route('kategori.index')
        ->with('success', 'Kategori berhasil ditambahkan.');
}

    /**
     * Menampilkan detail kategori.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(Kategori $kategori)
{
    return view('master.kategori.edit', compact('kategori'));
}

    /**
     * Update data kategori.
     */
   public function update(Request $request, Kategori $kategori)
{
    $request->validate([
        'nama_kategori' => 'required|max:100|unique:kategoris,nama_kategori,' . $kategori->id,
        'deskripsi' => 'nullable'
    ]);

    $kategori->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()
        ->route('kategori.index')
        ->with('success', 'Kategori berhasil diubah.');
}

    /**
     * Hapus kategori.
     */
   public function destroy(Kategori $kategori)
{
    $kategori->delete();

    return redirect()
        ->route('kategori.index')
        ->with('success', 'Kategori berhasil dihapus.');
}
}