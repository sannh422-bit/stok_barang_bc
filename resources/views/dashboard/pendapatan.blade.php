@extends('layouts.app')

@section('title','Detail Pendapatan')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Pendapatan
            </h2>

            <p class="text-muted mb-0">
                Riwayat seluruh pendapatan dari transaksi barang keluar.
            </p>

        </div>

        <a href="{{ route('dashboard') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    {{-- TOTAL PENDAPATAN --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Total Pendapatan
                    </small>

                    <h2 class="fw-bold text-success mt-2 mb-0">

                        Rp {{ number_format($totalPendapatan,0,',','.') }}

                    </h2>

                </div>

                <div class="dashboard-icon bg-success">

                    <i class="bi bi-cash-stack"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- TABEL PENDAPATAN --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-receipt text-success me-2"></i>

                Daftar Pendapatan

            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Barang
                            </th>

                            <th class="text-center">
                                Terjual
                            </th>

                            <th class="text-end">
                                Harga Jual
                            </th>

                            <th class="text-end">
                                Subtotal
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($pendapatan as $item)

                        @php

                            $subtotal =
                                $item->jumlah *
                                $item->barang->harga_jual;

                        @endphp

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                            </td>

                            <td>

                                <strong>
                                    {{ $item->barang->nama_barang }}
                                </strong>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-primary">

                                    {{ $item->jumlah }}

                                </span>

                            </td>

                            <td class="text-end">

                                Rp
                                {{ number_format(
                                    $item->barang->harga_jual,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                            <td class="text-end fw-bold text-success">

                                Rp
                                {{ number_format(
                                    $subtotal,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <i class="bi bi-inbox display-5 text-muted"></i>

                                <br><br>

                                Belum ada data pendapatan.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                    <tfoot class="table-light">

                        <tr>

                            <th colspan="5"
                                class="text-end">

                                Total Pendapatan

                            </th>

                            <th class="text-end text-success">

                                Rp
                                {{ number_format(
                                    $totalPendapatan,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection