@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Supplier
            </h3>

            <p class="text-muted mb-0">
                Ubah data supplier Business Center.
            </p>

        </div>

       

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Supplier
                    </label>

                    <input
                        type="text"
                        name="nama_supplier"
                        class="form-control @error('nama_supplier') is-invalid @enderror"
                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}">

                    @error('nama_supplier')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        No. HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp', $supplier->no_hp) }}">

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $supplier->alamat) }}</textarea>

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

               <hr>

                <button class="btn btn-warning">

                    <i class="bi bi-pencil-square me-2"></i>

                    Update

                </button>

                <a href="{{ route('supplier.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection