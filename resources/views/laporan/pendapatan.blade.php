@extends('layouts.app')

@section('title', 'Laporan Pendapatan')

@section('content')

<div class="container-fluid">


    {{-- =====================================================
         HEADER WEBSITE
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <div>

            <h2 class="fw-bold mb-1">
                Laporan Pendapatan
            </h2>

            <p class="text-muted mb-0">
                Rekap pendapatan berdasarkan transaksi barang keluar.
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

            <button
                onclick="window.print()"
                class="btn btn-primary">

                <i class="bi bi-printer me-1"></i>

                Cetak Laporan

            </button>

        </div>

    </div>



    {{-- =====================================================
         HEADER KHUSUS PRINT
    ====================================================== --}}

    <div class="print-header d-none">

        <h3>
            BUSINESS CENTER
        </h3>

        <h5>
            SMKN 5 KABUPATEN TANGERANG
        </h5>

        <h4>
            LAPORAN PENDAPATAN
        </h4>

        <p>
            Rekap pendapatan berdasarkan transaksi barang keluar.
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

            <br>

            Dicetak pada {{ now()->format('d-m-Y H:i') }}

        </small>

    </div>



    {{-- =====================================================
         RINGKASAN
    ====================================================== --}}

    <div class="row g-3 mb-4 report-summary">


        {{-- TOTAL TRANSAKSI --}}

        <div class="col-md-4">

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


        {{-- TOTAL BARANG --}}

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Total Barang Terjual
                    </small>

                    <h3 class="fw-bold mt-2 mb-0">
                        {{ $totalJumlah }}
                    </h3>

                </div>

            </div>

        </div>


        {{-- TOTAL PENDAPATAN --}}

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Total Pendapatan
                    </small>

                    <h3 class="fw-bold text-success mt-2 mb-0">

                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                    </h3>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <div class="card border-0 shadow-sm mb-4 no-print">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-funnel text-primary me-2"></i>

                Filter Laporan

            </h5>

        </div>


        <div class="card-body">

            <form
                method="GET"
                action="{{ route('laporan.pendapatan') }}">

                <div class="row g-3 align-items-end">


                    {{-- TANGGAL MULAI --}}

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


                    {{-- TANGGAL AKHIR --}}

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


                    {{-- BUTTON --}}

                    <div class="col-md-2">

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary flex-grow-1">

                                <i class="bi bi-search me-1"></i>

                                Filter

                            </button>


                            <a
                                href="{{ route('laporan.pendapatan') }}"
                                class="btn btn-light border"
                                title="Reset Filter">

                                <i class="bi bi-arrow-clockwise"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>



    {{-- =====================================================
         INFORMASI FILTER
    ====================================================== --}}

    @if(request()->filled('tanggal_mulai') || request()->filled('tanggal_akhir'))

        <div class="alert alert-light border mb-4 no-print">

            <i class="bi bi-info-circle me-2"></i>

            Menampilkan data pendapatan berdasarkan periode
            tanggal yang dipilih.

        </div>

    @endif



    {{-- =====================================================
         DATA PENDAPATAN
    ====================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-cash-stack text-success me-2"></i>

                Data Pendapatan

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

                            <th class="text-end">
                                Harga Jual
                            </th>

                            <th class="text-end">
                                Pendapatan
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($barangKeluar as $item)

                            @php

                                $hargaJual = $item->barang->harga_jual ?? 0;

                                $pendapatan =
                                    $item->jumlah * $hargaJual;

                            @endphp


                            <tr>

                                {{-- NO --}}

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- TANGGAL --}}

                                <td>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                </td>


                                {{-- KODE --}}

                                <td>

                                    <strong>

                                        {{ $item->barang->kode_barang ?? '-' }}

                                    </strong>

                                </td>


                                {{-- NAMA --}}

                                <td>

                                    {{ $item->barang->nama_barang ?? '-' }}

                                </td>


                                {{-- JUMLAH --}}

                                <td class="text-center">

                                    {{ $item->jumlah }}

                                </td>


                                {{-- HARGA JUAL --}}

                                <td class="text-end">

                                    Rp {{ number_format($hargaJual, 0, ',', '.') }}

                                </td>


                                {{-- PENDAPATAN --}}

                                <td class="text-end">

                                    <strong>

                                        Rp {{ number_format($pendapatan, 0, ',', '.') }}

                                    </strong>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5">

                                    <i class="bi bi-inbox display-5 text-muted"></i>

                                    <br><br>

                                    <strong>
                                        Belum ada data pendapatan.
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


                    @if($barangKeluar->count() > 0)

                        <tfoot>

                            <tr>

                                <th colspan="4"
                                    class="text-end">

                                    TOTAL

                                </th>

                                <th class="text-center">

                                    {{ $totalJumlah }}

                                </th>

                                <th></th>

                                <th class="text-end">

                                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                                </th>

                            </tr>

                        </tfoot>

                    @endif

                </table>

            </div>

        </div>

    </div>

</div>

@endsection