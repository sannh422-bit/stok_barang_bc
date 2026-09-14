@extends('layouts.app')

@section('title', 'Data Kategori')

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
                Data Kategori
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh kategori barang Business Center.
            </p>

        </div>

        <a href="{{ route('kategori.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Kategori

        </a>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="80">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

               <tbody>

    @forelse($kategoris as $kategori)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $kategori->nama_kategori }}
            </td>

            <td>
                {{ $kategori->deskripsi ?? '-' }}
            </td>

            <td>

                <a href="{{ route('kategori.edit',$kategori->id) }}"
                   class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>

                </a>

                <form
                    action="{{ route('kategori.destroy',$kategori->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus kategori ini?')">

                        <i class="bi bi-trash"></i>

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4" class="text-center py-5">

                Belum ada data kategori.

            </td>

        </tr>

    @endforelse

</tbody>
            </table>

        </div>

    </div>

</div>

@endsection