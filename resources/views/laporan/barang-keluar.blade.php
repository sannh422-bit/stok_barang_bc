@extends('layouts.app')

@section('title', 'Laporan Barang Keluar')

@section('content')

<div class="container-fluid">

    {{-- HEADER WEBSITE --}}
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <div>

            <h2 class="fw-bold mb-1">
                Laporan Barang Keluar
            </h2>

            <p class="text-muted mb-0">
                Riwayat transaksi seluruh barang yang keluar.
            </p>

        </div>


        <div class="d-flex gap-2">

            {{-- KEMBALI --}}
            <a href="{{ route('laporan.stok') }}"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Laporan

            </a>


            {{-- CETAK --}}
            <button onclick="window.print()"
                    class="btn btn-primary">

                <i class="bi bi-printer me-1"></i>
                Cetak Laporan

            </button>

        </div>

    </div>


    {{-- HEADER PRINT --}}
    <div class="print-header d-none">

        <h3 class="fw-bold mb-1">
            BUSINESS CENTER
        </h3>

        <h5 class="fw-bold mb-1">
            SMKN 5 KABUPATEN TANGERANG
        </h5>

        <h4 class="fw-bold mt-3 mb-1">
            LAPORAN BARANG KELUAR
        </h4>

        <p class="mb-1">
            Riwayat transaksi seluruh barang yang keluar.
        </p>

        <small>

            Periode:

            {{ request('tanggal_mulai')
                ? \Carbon\Carbon::parse(request('tanggal_mulai'))->format('d-m-Y')
                : 'Semua' }}

            s/d

            {{ request('tanggal_akhir')
                ? \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d-m-Y')
                : 'Semua' }}

        </small>

        <br>

        <small>
            Dicetak pada {{ now()->format('d-m-Y H:i') }}
        </small>

    </div>


    {{-- RINGKASAN --}}
    <div class="row g-3 mb-4">

        <div class="col-md-6">

            <div class="card border-0 shadow-sm h-100">

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

            <div class="card border-0 shadow-sm h-100">

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


    {{-- FILTER --}}
    <div class="card border-0 shadow-sm mb-4 no-print">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-funnel text-primary me-2"></i>

                Filter Laporan

            </h5>

        </div>


        <div class="card-body">

            <form method="GET"
                  action="{{ route('laporan.barang-keluar') }}">

                <div class="row g-3 align-items-end">

                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Tanggal Mulai
                        </label>

                        <input type="date"
                               name="tanggal_mulai"
                               class="form-control"
                               value="{{ request('tanggal_mulai') }}">

                    </div>


                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Tanggal Akhir
                        </label>

                        <input type="date"
                               name="tanggal_akhir"
                               class="form-control"
                               value="{{ request('tanggal_akhir') }}">

                    </div>


                    <div class="col-md-2">

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary flex-grow-1">

                                <i class="bi bi-search me-1"></i>
                                Filter

                            </button>


                            <a href="{{ route('laporan.barang-keluar') }}"
                               class="btn btn-light border">

                                <i class="bi bi-arrow-clockwise"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- INFORMASI FILTER --}}
    @if(request()->filled('tanggal_mulai') || request()->filled('tanggal_akhir'))

        <div class="alert alert-light border mb-4 no-print">

            <i class="bi bi-info-circle me-2"></i>

            Menampilkan data barang keluar berdasarkan periode
            tanggal yang dipilih.

        </div>

    @endif


    {{-- DATA --}}
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
                                Kode Barang
                            </th>

                            <th>
                                Nama Barang
                            </th>

                            <th class="text-center">
                                Jumlah
                            </th>

                            <th>
                                Keterangan
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
                                        {{ $item->barang->kode_barang ?? '-' }}
                                    </strong>

                                </td>

                                <td>
                                    {{ $item->barang->nama_barang ?? '-' }}
                                </td>

                                <td class="text-center">

                                    <strong>
                                        {{ $item->jumlah }}
                                    </strong>

                                </td>

                                <td>
                                    {{ $item->keterangan ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="bi bi-inbox display-5 text-muted"></i>

                                    <br><br>

                                    <strong>
                                        Belum ada data barang keluar.
                                    </strong>

                                    <br>

                                    <small class="text-muted">
                                        Coba ubah periode tanggal atau
                                        tambahkan transaksi barang keluar.
                                    </small>

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