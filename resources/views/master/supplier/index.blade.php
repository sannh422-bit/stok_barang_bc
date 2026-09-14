@extends('layouts.app')

@section('title', 'Data Supplier')

@section('content')

<div class="container-fluid">

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <i class="bi bi-check-circle me-2"></i>

    {{ session('success') }}

    <button
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Data Supplier
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh data supplier Business Center.
            </p>

        </div>

        <a href="{{ route('supplier.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Supplier

        </a>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="80">No</th>
                        <th>Nama Supplier</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($suppliers as $supplier)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $supplier->nama_supplier }}
                            </td>

                            <td>
                                {{ $supplier->no_hp ?? '-' }}
                            </td>

                            <td>
                                {{ $supplier->alamat ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('supplier.edit', $supplier->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form
                                    action="{{ route('supplier.destroy', $supplier->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus supplier ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                Belum ada data supplier.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection