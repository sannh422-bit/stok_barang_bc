@extends('layouts.app')

@section('title', 'Laporan Barang Keluar')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Laporan Barang Keluar
            </h2>

            <p class="text-muted mb-0">
                Riwayat transaksi seluruh barang yang keluar.
            </p>
        </div>

        <button onclick="window.print()" class="btn btn-primary">

            <i class="bi bi-printer me-1"></i>

            Cetak Laporan

        </button>

    </div>


    {{-- RINGKASAN --}}
    <div class="row g-3 mb-4">

        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">
                        Total Transaksi
                    </small>

                    <h3 class="fw-bold mt-2 mb-0">

                        {{ $totalTransaksi }}

                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">
                        Total Barang Keluar
                    </small>

                    <h3 class="fw-bold text-danger mt-2 mb-0">

                        {{ $totalJumlah }}

                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- FILTER TANGGAL --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('laporan.barang-keluar') }}">

                <div class="row g-3 align-items-end">

                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="{{ request('tanggal_mulai') }}"
                        >

                    </div>


                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="{{ request('tanggal_akhir') }}"
                        >

                    </div>


                    <div class="col-md-2 d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-search me-1"></i>

                            Filter

                        </button>


                        <a
                            href="{{ route('laporan.barang-keluar') }}"
                            class="btn btn-secondary">

                            <i class="bi bi-arrow-counterclockwise"></i>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- TABEL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-box-arrow-up text-danger me-2"></i>

                Data Barang Keluar

            </h5>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Barang
                            </th>

                            <th class="text-center">
                                Jumlah
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($barangKeluar as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                            </td>


                            <td>

                                <strong>

                                    {{ $item->barang->nama_barang ?? '-' }}

                                </strong>

                            </td>


                            <td class="text-center">

                                <span class="badge bg-danger">

                                    {{ $item->jumlah }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center py-5">

                                <i class="bi bi-inbox display-5 text-muted"></i>

                                <br><br>

                                Belum ada data barang keluar.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection