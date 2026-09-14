@extends('layouts.app')

@section('title', 'Barang Keluar')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                Data Barang Keluar
            </h3>

            <p class="text-muted mb-0">
                Kelola transaksi barang keluar Business Center.
            </p>

        </div>

        <a href="{{ route('barang-keluar.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Barang Keluar

        </a>

    </div>

    {{-- Card --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($barangKeluars as $keluar)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $keluar->barang->nama_barang }}</td>

                        <td>{{ $keluar->jumlah }}</td>

                        <td>{{ \Carbon\Carbon::parse($keluar->tanggal)->format('d-m-Y') }}</td>

                        <td>{{ $keluar->keterangan ?? '-' }}</td>

                        <td>

                            <a href="{{ route('barang-keluar.edit',$keluar->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('barang-keluar.destroy',$keluar->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            Belum ada data barang keluar.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection