@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Tambah Supplier
        </h3>

        <p class="text-muted">
            Tambahkan supplier baru Business Center.
        </p>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('supplier.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nama Supplier
                    </label>

                    <input
                        type="text"
                        name="nama_supplier"
                        class="form-control"
                        value="{{ old('nama_supplier') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        No. HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ old('no_hp') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control">{{ old('alamat') }}</textarea>

                </div>

                <button class="btn btn-primary">

                    <i class="bi bi-save me-2"></i>

                    Simpan

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