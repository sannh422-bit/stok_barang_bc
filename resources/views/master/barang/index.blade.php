@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Data Barang
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh data barang Business Center.
            </p>

        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Barang

        </a>

    </div>

    <!-- Card -->

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($barangs as $barang)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $barang->kode_barang }}</td>

                        <td>{{ $barang->nama_barang }}</td>

                        <td>{{ $barang->kategori->nama_kategori }}</td>

                        <td>{{ $barang->supplier->nama_supplier }}</td>

                        <td>{{ $barang->stok }}</td>

                        <td>Rp {{ number_format($barang->harga_beli,0,',','.') }}</td>

                        <td>Rp {{ number_format($barang->harga_jual,0,',','.') }}</td>

                        <td>

                            <a href="{{ route('barang.edit',$barang->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('barang.destroy',$barang->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus barang ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center py-5">

                            Belum ada data barang.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection