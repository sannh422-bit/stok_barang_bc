@extends('layouts.app')

@section('title', 'Tambah Barang Masuk')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">Tambah Barang Masuk</h3>
            <p class="text-muted mb-0">
                Tambahkan transaksi barang masuk.
            </p>
        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('barang-masuk.store') }}" method="POST">

                @csrf

                <div class="row">

                    {{-- Barang --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Barang
                        </label>

                        <select
                            name="barang_id"
                            class="form-select @error('barang_id') is-invalid @enderror">

                            <option value="">
                                Pilih Barang
                            </option>

                            @foreach($barangs as $barang)

                                <option
                                    value="{{ $barang->id }}"
                                    {{ old('barang_id') == $barang->id ? 'selected' : '' }}>

                                    {{ $barang->kode_barang }}
                                    -
                                    {{ $barang->nama_barang }}

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

                        <label class="form-label">
                            Jumlah
                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah') }}">

                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', date('Y-m-d')) }}">

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Keterangan --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <input
                            type="text"
                            name="keterangan"
                            class="form-control"
                            value="{{ old('keterangan') }}">

                    </div>

                </div>

                <hr>

                <button class="btn btn-primary">

                    <i class="bi bi-save me-2"></i>

                    Simpan

                </button>

                <a href="{{ route('barang-masuk.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection