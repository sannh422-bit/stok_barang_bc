<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'asc')->get();

        return view('master.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('master.supplier.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_supplier' => 'required|max:100',
        'no_hp'         => 'nullable|max:20',
        'alamat'        => 'nullable',
    ]);

    Supplier::create([
        'nama_supplier' => $request->nama_supplier,
        'no_hp'         => $request->no_hp,
        'alamat'        => $request->alamat,
    ]);

    return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Supplier $supplier)
{
    return view('master.supplier.edit', compact('supplier'));
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Supplier $supplier)
{
    $request->validate([
        'nama_supplier' => 'required|max:100',
        'no_hp'         => 'nullable|max:20',
        'alamat'        => 'nullable',
    ]);

    $supplier->update([
        'nama_supplier' => $request->nama_supplier,
        'no_hp'         => $request->no_hp,
        'alamat'        => $request->alamat,
    ]);

    return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Supplier $supplier)
{
    $supplier->delete();

    return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus.');
}
}