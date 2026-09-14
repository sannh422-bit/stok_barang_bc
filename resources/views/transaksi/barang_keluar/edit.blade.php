@extends('layouts.app')

@section('title', 'Edit Barang Keluar')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">Edit Barang Keluar</h3>
            <p class="text-muted mb-0">
                Ubah transaksi barang keluar.
            </p>
        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('barang-keluar.update',$barangKeluar->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Barang --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Barang</label>

                        <select
                            name="barang_id"
                            class="form-select @error('barang_id') is-invalid @enderror">

                            <option value="">Pilih Barang</option>

                            @foreach($barangs as $barang)

                                <option
                                    value="{{ $barang->id }}"
                                    {{ old('barang_id',$barangKeluar->barang_id) == $barang->id ? 'selected' : '' }}>

                                    {{ $barang->kode_barang }}
                                    -
                                    {{ $barang->nama_barang }}
                                    (Stok : {{ $barang->stok }})

                                </option>

                            @endforeach

                        </select>

                        @error('barang_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Jumlah --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Jumlah</label>

                        <input
                            type="number"
                            name="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah',$barangKeluar->jumlah) }}">

                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Tanggal</label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal',$barangKeluar->tanggal) }}">

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Keterangan --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Keterangan</label>

                        <input
                            type="text"
                            name="keterangan"
                            class="form-control"
                            value="{{ old('keterangan',$barangKeluar->keterangan) }}">

                    </div>

                </div>

                <hr>

                <button class="btn btn-warning">

                    <i class="bi bi-pencil-square me-2"></i>

                    Update

                </button>

                <a href="{{ route('barang-keluar.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection