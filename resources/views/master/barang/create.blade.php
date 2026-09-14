@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">Tambah Barang</h3>
            <p class="text-muted mb-0">
                Tambahkan data barang Business Center.
            </p>
        </div>

        

    </div>

    {{-- Card --}}
    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('barang.store') }}" method="POST">

                @csrf

                <div class="row">

                    {{-- Kode Barang --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Kode Barang</label>

                        <input
                            type="text"
                            name="kode_barang"
                            class="form-control @error('kode_barang') is-invalid @enderror"
                            value="{{ old('kode_barang') }}">

                        @error('kode_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Nama Barang --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Nama Barang</label>

                        <input
                            type="text"
                            name="nama_barang"
                            class="form-control @error('nama_barang') is-invalid @enderror"
                            value="{{ old('nama_barang') }}">

                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Kategori</label>

                        <select
                            name="kategori_id"
                            class="form-select @error('kategori_id') is-invalid @enderror">

                            <option value="">Pilih Kategori</option>

                            @foreach($kategoris as $kategori)

                                <option
                                    value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>

                                    {{ $kategori->nama_kategori }}

                                </option>

                            @endforeach

                        </select>

                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Supplier --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Supplier</label>

                        <select
                            name="supplier_id"
                            class="form-select @error('supplier_id') is-invalid @enderror">

                            <option value="">Pilih Supplier</option>

                            @foreach($suppliers as $supplier)

                                <option
                                    value="{{ $supplier->id }}"
                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>

                                    {{ $supplier->nama_supplier }}

                                </option>

                            @endforeach

                        </select>

                        @error('supplier_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Stok --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">Stok</label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            value="{{ old('stok',0) }}">

                    </div>

                    {{-- Satuan --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">Satuan</label>

                        <input
                            type="text"
                            name="satuan"
                            class="form-control"
                            value="{{ old('satuan') }}">

                    </div>

                    {{-- Harga Beli --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">Harga Beli</label>

                        <input
                            type="number"
                            name="harga_beli"
                            class="form-control"
                            value="{{ old('harga_beli') }}">

                    </div>

                    
                    {{-- Harga Jual --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">Harga Jual</label>

                        <input
                            type="number"
                            name="harga_jual"
                            class="form-control"
                            value="{{ old('harga_jual') }}">

                    </div>

                </div>

                <hr>

                
 <button class="btn btn-primary">

                    <i class="bi bi-save me-2"></i>

                    Simpan

                </button>

                <a href="{{ route('barang.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection