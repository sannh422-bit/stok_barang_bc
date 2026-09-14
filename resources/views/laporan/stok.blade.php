@extends('layouts.app')

@section('title', 'Laporan Stok')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <div>
            <h2 class="fw-bold mb-1">
                Laporan Stok
            </h2>

            <p class="text-muted mb-0">
                Informasi stok seluruh barang Business Center.
            </p>
        </div>

        <button
            onclick="window.print()"
            class="btn btn-primary">
            <i class="bi bi-printer me-1"></i>
            Cetak Laporan
        </button>

    </div>


    {{-- HEADER KHUSUS CETAK --}}
    <div class="print-header d-none text-center mb-4">

        <h3 class="fw-bold mb-1">
            BUSINESS CENTER
        </h3>

        <h5 class="fw-bold mb-1">
            SMKN 5 KABUPATEN TANGERANG
        </h5>

        <h4 class="fw-bold mt-3 mb-1">
            LAPORAN STOK BARANG
        </h4>

        <p class="text-muted mb-1">
            Informasi stok seluruh barang Business Center
        </p>

        <small class="text-muted">
            Dicetak pada {{ now()->format('d-m-Y H:i') }}
        </small>

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

            <form
                action="{{ route('laporan.stok') }}"
                method="GET">

                <div class="row g-3 align-items-end">

                    {{-- PENCARIAN --}}
                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Cari Barang
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Kode atau nama barang..."
                                value="{{ request('search') }}">

                        </div>

                    </div>


                    {{-- KATEGORI --}}
                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Kategori
                        </label>

                        <select
                            name="kategori_id"
                            class="form-select">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($kategoris as $kategori)

                                <option
                                    value="{{ $kategori->id }}"
                                    {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>

                                    {{ $kategori->nama_kategori }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-2">

                        <label class="form-label fw-semibold">
                            Status Stok
                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="aman"
                                {{ request('status') == 'aman' ? 'selected' : '' }}>
                                Aman
                            </option>

                            <option
                                value="menipis"
                                {{ request('status') == 'menipis' ? 'selected' : '' }}>
                                Menipis
                            </option>

                            <option
                                value="habis"
                                {{ request('status') == 'habis' ? 'selected' : '' }}>
                                Habis
                            </option>

                        </select>

                    </div>


                    {{-- TOMBOL --}}
                    <div class="col-md-2">

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary flex-grow-1">

                                <i class="bi bi-search me-1"></i>
                                Cari

                            </button>

                            <a
                                href="{{ route('laporan.stok') }}"
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


    {{-- RINGKASAN --}}
    <div class="row g-3 mb-4 no-print">

        {{-- TOTAL BARANG --}}
        <div class="col-xl col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Total Barang
                    </small>

                    <h3 class="fw-bold mt-2 mb-0">
                        {{ $totalBarang }}
                    </h3>

                </div>

            </div>

        </div>


        {{-- TOTAL STOK --}}
        <div class="col-xl col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Total Stok
                    </small>

                    <h3 class="fw-bold mt-2 mb-0">
                        {{ $totalStok }}
                    </h3>

                </div>

            </div>

        </div>


        {{-- STOK AMAN --}}
        <div class="col-xl col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Stok Aman
                    </small>

                    <h3 class="fw-bold text-success mt-2 mb-0">
                        {{ $stokAman }}
                    </h3>

                </div>

            </div>

        </div>


        {{-- STOK MENIPIS --}}
        <div class="col-xl col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Stok Menipis
                    </small>

                    <h3 class="fw-bold text-warning mt-2 mb-0">
                        {{ $stokMenipis }}
                    </h3>

                </div>

            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="col-xl col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <small class="text-muted">
                        Stok Habis
                    </small>

                    <h3 class="fw-bold text-danger mt-2 mb-0">
                        {{ $stokHabis }}
                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- HASIL FILTER --}}
    @if(request()->filled('search') ||
        request()->filled('kategori_id') ||
        request()->filled('status'))

        <div class="alert alert-light border mb-4 no-print">

            <i class="bi bi-info-circle me-2"></i>

            Menampilkan hasil berdasarkan filter yang dipilih.

        </div>

    @endif


    {{-- TABEL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-box-seam text-primary me-2"></i>

                Data Stok Barang

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
                                Kode Barang
                            </th>

                            <th>
                                Nama Barang
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Supplier
                            </th>

                            <th class="text-center">
                                Stok
                            </th>

                            <th>
                                Satuan
                            </th>

                            <th class="text-end">
                                Harga Beli
                            </th>

                            <th class="text-end">
                                Harga Jual
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($barang as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                <span class="fw-semibold">
                                    {{ $item->kode_barang }}
                                </span>
                            </td>


                            <td>
                                {{ $item->nama_barang }}
                            </td>


                            <td>
                                {{ $item->kategori->nama_kategori ?? '-' }}
                            </td>


                            <td>
                                {{ $item->supplier->nama_supplier ?? '-' }}
                            </td>


                            <td class="text-center">

                                @if($item->stok <= 0)

                                    <span class="badge bg-dark">
                                        {{ $item->stok }}
                                    </span>

                                @elseif($item->stok <= 5)

                                    <span class="badge bg-danger">
                                        {{ $item->stok }}
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        {{ $item->stok }}
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $item->satuan }}
                            </td>


                            <td class="text-end">

                                Rp {{ number_format(
                                    $item->harga_beli,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td class="text-end">

                                Rp {{ number_format(
                                    $item->harga_jual,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td class="text-center">

                                @if($item->stok <= 0)

                                    <span class="badge bg-dark">
                                        Habis
                                    </span>

                                @elseif($item->stok <= 5)

                                    <span class="badge bg-danger">
                                        Menipis
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Aman
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="10"
                                class="text-center py-5">

                                <i class="bi bi-inbox display-5 text-muted"></i>

                                <br><br>

                                <strong>
                                    Data barang tidak ditemukan.
                                </strong>

                                <br>

                                <small class="text-muted">
                                    Coba ubah kata pencarian atau filter.
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