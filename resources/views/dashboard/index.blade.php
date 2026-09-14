@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">
                Selamat datang kembali,
                <strong>{{ Auth::user()->name }}</strong>
            </p>

        </div>

        <div class="text-end">

            <small class="text-muted">

                {{ now()->translatedFormat('l, d F Y') }}

            </small>

            <br>

            <span class="badge bg-primary">

                Business Center

            </span>

        </div>

    </div>

    {{-- CARD STATISTIK --}}
    <div class="row g-4">

        {{-- TOTAL BARANG --}}
        <div class="col-xl-3 col-md-6">

            <a href="{{ route('barang.index') }}"
               class="text-decoration-none">

                <div class="card dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>

                                <small>Total Barang</small>

                                <h2 class="mt-2">

                                    {{ $totalBarang }}

                                </h2>

                            </div>

                            <div class="dashboard-icon bg-primary">

                                <i class="bi bi-box-seam"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- TOTAL KATEGORI --}}
        <div class="col-xl-3 col-md-6">

            <a href="{{ route('kategori.index') }}"
               class="text-decoration-none">

                <div class="card dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>

                                <small>Total Kategori</small>

                                <h2 class="mt-2">

                                    {{ $totalKategori }}

                                </h2>

                            </div>

                            <div class="dashboard-icon bg-success">

                                <i class="bi bi-tags"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- TOTAL SUPPLIER --}}
        <div class="col-xl-3 col-md-6">

            <a href="{{ route('supplier.index') }}"
               class="text-decoration-none">

                <div class="card dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>

                                <small>Total Supplier</small>

                                <h2 class="mt-2">

                                    {{ $totalSupplier }}

                                </h2>

                            </div>

                            <div class="dashboard-icon bg-warning">

                                <i class="bi bi-truck"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- TOTAL STOK --}}
        <div class="col-xl-3 col-md-6">

            <a href="{{ route('barang.index') }}"
               class="text-decoration-none">

                <div class="card dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>

                                <small>Total Stok</small>

                                <h2 class="mt-2">

                                    {{ $totalStok }}

                                </h2>

                            </div>

                            <div class="dashboard-icon bg-danger">

                                <i class="bi bi-stack"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>
{{-- ==========================
    CARD TRANSAKSI
========================== --}}
<div class="row g-4 mt-1">

    {{-- Barang Masuk --}}
    <div class="col-lg-4">

        <a href="{{ route('barang-masuk.index') }}"
           class="text-decoration-none">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Barang Masuk Hari Ini

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $barangMasukHariIni }}

                            </h2>

                        </div>

                        <div class="dashboard-icon bg-success">

                            <i class="bi bi-box-arrow-in-down"></i>

                        </div>

                    </div>

                </div>

            </div>

        </a>

    </div>

    {{-- Barang Keluar --}}
    <div class="col-lg-4">

        <a href="{{ route('barang-keluar.index') }}"
           class="text-decoration-none">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Barang Keluar Hari Ini

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $barangKeluarHariIni }}

                            </h2>

                        </div>

                        <div class="dashboard-icon bg-danger">

                            <i class="bi bi-box-arrow-up"></i>

                        </div>

                    </div>

                </div>

            </div>

        </a>

    </div>

    {{-- Pendapatan --}}
   <div class="col-lg-4">

    <a href="{{ route('pendapatan.index') }}"
       class="text-decoration-none text-dark">

        <div class="card dashboard-card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Pendapatan
                        </small>

                        <h4 class="fw-bold mt-2">

                            Rp {{ number_format($totalPendapatan,0,',','.') }}

                        </h4>

                    </div>

                    <div class="dashboard-icon bg-warning">

                        <i class="bi bi-cash-stack"></i>

                    </div>

                </div>

            </div>

        </div>

    </a>

</div>
{{-- ==========================
    ROW DASHBOARD
========================== --}}
<div class="row mt-4">

    {{-- GRAFIK --}}
    <div class="col-lg-8">

        <div class="card shadow-sm border-0" data-aos="fade-right">

            <div class="card-header bg-white d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-graph-up-arrow text-success me-2"></i>

                    Grafik Transaksi Barang

                </h5>

                <select id="filterGrafik"
                        class="form-select form-select-sm w-auto">

                    <option value="harian">Harian</option>

                    <option value="bulanan">Bulanan</option>

                </select>

            </div>

            <div class="card-body">

                <div style="height:420px">

                    <canvas id="chartTransaksi"></canvas>

                </div>

            </div>

        </div>

    </div>

    {{-- PANEL KANAN --}}
    <div class="col-lg-4">

        {{-- Aktivitas --}}
        <div class="card shadow-sm border-0 mb-4" data-aos="fade-left">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-clock-history text-primary me-2"></i>

                    Aktivitas Terakhir

                </h5>

            </div>

            <div class="card-body p-0"
                 style="height:220px;overflow-y:auto;">

                <table class="table table-hover align-middle mb-0">

                    <tbody>

                        @forelse($aktivitasTerbaru as $item)

                        <tr>

                            <td width="80">

                                @if($item->jenis=='Masuk')

                                    <span class="badge bg-success">

                                        Masuk

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Keluar

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $item->barang->nama_barang }}

                                <br>

                                <small class="text-muted">

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                </small>

                            </td>

                            <td class="text-end">

                                {{ $item->jumlah }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3"
                                class="text-center py-4">

                                Belum ada aktivitas.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- STOK MENIPIS --}}
        <div class="card shadow-sm border-0" data-aos="fade-left">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>

                    Stok Menipis

                </h5>

            </div>

            <div class="card-body p-0"
                 style="height:180px;overflow-y:auto;">

                <table class="table table-hover mb-0">

                    <tbody>

                        @forelse($stokMenipis as $barang)

                        <tr>

                            <td>

                                {{ $barang->nama_barang }}

                            </td>

                            <td class="text-end">

                                <span class="badge bg-danger">

                                    {{ $barang->stok }}

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td class="text-center">

                                Semua stok aman.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
{{-- ==========================
    BARANG TERLARIS
========================== --}}
<div class="row mt-4">

    <div class="col-12">

        <div class="card shadow-sm border-0" data-aos="fade-up">

            <div class="card-header bg-white d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-trophy-fill text-warning me-2"></i>

                    5 Barang Terlaris

                </h5>

                <span class="badge bg-success">

                    Top Selling

                </span>

            </div>

            <div class="card-body">

                @forelse($barangTerlaris as $item)

                    @php

                        $persen = $barangTerlaris->max('total_keluar') > 0
                            ? ($item->total_keluar / $barangTerlaris->max('total_keluar')) * 100
                            : 0;

                    @endphp

                    <div class="mb-4">

                        <div class="d-flex justify-content-between">

                            <strong>

                                {{ $item->barang->nama_barang }}

                            </strong>

                            <span class="fw-bold text-success">

                                {{ $item->total_keluar }} Terjual

                            </span>

                        </div>

                        <div class="progress mt-2"
                             style="height:12px;">

                            <div class="progress-bar bg-success "

                                style="width: {{ $persen }}%">

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5 text-muted">

                        <i class="bi bi-inbox display-5"></i>

                        <br><br>

                        Belum ada transaksi penjualan.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</div>
@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {

    const labelHarian = @json($labelHarian);
    const masukHarian = @json($grafikMasuk);
    const keluarHarian = @json($grafikKeluar);

    const labelBulanan = @json($labelBulanan);
    const masukBulanan = @json($masukBulanan);
    const keluarBulanan = @json($keluarBulanan);

    const chart = new Chart(document.getElementById('chartTransaksi'), {

        type: 'bar',

        data: {

            labels: labelHarian,

            datasets: [

                {
                    label: 'Barang Masuk',
                    data: masukHarian,
                    backgroundColor: '#198754',
                    borderRadius: 8
                },

                {
                    label: 'Barang Keluar',
                    data: keluarHarian,
                    backgroundColor: '#dc3545',
                    borderRadius: 8
                }

            ]

        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            interaction: {
                mode: 'index',
                intersect: false
            },

            plugins: {

                legend: {
                    position: 'top'
                }

            },

            scales: {

                y: {
                    beginAtZero: true
                }

            }

        }

    });

    document.getElementById('filterGrafik').addEventListener('change', function () {

        if (this.value === 'harian') {

            chart.data.labels = labelHarian;
            chart.data.datasets[0].data = masukHarian;
            chart.data.datasets[1].data = keluarHarian;

        } else {

            chart.data.labels = labelBulanan;
            chart.data.datasets[0].data = masukBulanan;
            chart.data.datasets[1].data = keluarBulanan;

        }

        chart.update();

    });

});
</script>
@endpush
@endsection