@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Kategori
            </h3>

            <p class="text-muted mb-0">
                Ubah data kategori barang.
            </p>

        </div>

        

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control @error('nama_kategori') is-invalid @enderror"
                        value="{{ old('nama_kategori', $kategori->nama_kategori) }}">

                    @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="form-control">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

                </div>

             <hr>

                <button class="btn btn-warning">

                    <i class="bi bi-pencil-square me-2"></i>

                    Update

                </button>

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>
            </form>

        </div>

    </div>

</div>

@endsection