@extends('layouts.app')

@section('title', 'Laporan Barang Masuk')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <div>
            <h2 class="fw-bold mb-1">
                Laporan Barang Masuk
            </h2>

            <p class="text-muted mb-0">
                Riwayat transaksi seluruh barang yang masuk.
            </p>
        </div>

        <button
            onclick="window.print()"
            class="btn btn-primary">

            <i class="bi bi-printer me-1"></i>
            Cetak Laporan

        </button>

    </div>


    {{-- HEADER KHUSUS PRINT --}}
    <div class="print-header d-none text-center mb-4">

        <h3 class="fw-bold mb-1">
            BUSINESS CENTER
        </h3>

        <h5 class="fw-bold mb-1">
            SMKN 5 KABUPATEN TANGERANG
        </h5>

        <h4 class="fw-bold mt-3 mb-1">
            LAPORAN BARANG MASUK
        </h4>

        <p class="mb-1">
            Riwayat transaksi seluruh barang yang masuk.
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
    <div class="row g-3 mb-4 no-print">

        {{-- TOTAL TRANSAKSI --}}
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


        {{-- TOTAL BARANG MASUK --}}
        <div class="col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Total Barang Masuk
                    </small>

                    <h3 class="fw-bold text-success mt-2 mb-0">
                        {{ $totalJumlah }}
                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- FILTER TANGGAL --}}
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
                action="{{ route('laporan.barang-masuk') }}">

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


                    {{-- TOMBOL --}}
                    <div class="col-md-2">

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary flex-grow-1">

                                <i class="bi bi-search me-1"></i>
                                Filter

                            </button>


                            <a
                                href="{{ route('laporan.barang-masuk') }}"
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


    {{-- INFO FILTER --}}
    @if(request()->filled('tanggal_mulai') ||
        request()->filled('tanggal_akhir'))

        <div class="alert alert-light border mb-4 no-print">

            <i class="bi bi-info-circle me-2"></i>

            Menampilkan data barang masuk berdasarkan periode yang dipilih.

        </div>

    @endif


    {{-- TABEL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-box-arrow-in-down text-success me-2"></i>

                Data Barang Masuk

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

                    @forelse($barangMasuk as $item)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $item->tanggal
                                )->format('d-m-Y') }}

                            </td>


                            {{-- KODE BARANG --}}
                            <td>

                                <span class="fw-semibold">
                                    {{ $item->barang->kode_barang ?? '-' }}
                                </span>

                            </td>


                            {{-- NAMA BARANG --}}
                            <td>

                                {{ $item->barang->nama_barang ?? '-' }}

                            </td>


                            {{-- JUMLAH --}}
                            <td class="text-center">

                                <span class="badge bg-success">

                                    {{ $item->jumlah }}

                                </span>

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                {{ $item->keterangan ?? '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5">

                                <i class="bi bi-inbox display-5 text-muted"></i>

                                <br><br>

                                <strong>
                                    Belum ada data barang masuk.
                                </strong>

                                <br>

                                <small class="text-muted">
                                    Coba ubah periode tanggal atau tambahkan transaksi barang masuk.
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