<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Business Center')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        /* =========================================================
           PRINT STYLE
        ========================================================= */

        @media print {

            /* -----------------------------------------------------
               SEMBUNYIKAN ELEMEN WEBSITE
            ----------------------------------------------------- */

            .sidebar,
            .navbar,
            nav,
            footer,
            .footer,
            #footer,
            .no-print {

                display: none !important;

                visibility: hidden !important;

            }


            body footer,
            body > footer,
            .main-content footer,
            .main-content .footer,
            .content footer,
            .content .footer {

                display: none !important;

                visibility: hidden !important;

                height: 0 !important;

                min-height: 0 !important;

                max-height: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            /* -----------------------------------------------------
               RESET HALAMAN
            ----------------------------------------------------- */

            html,
            body {

                width: 100% !important;

                min-width: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

                background: #ffffff !important;

            }


            body {

                font-family: Arial, Helvetica, sans-serif !important;

                color: #000000 !important;

            }


            .main-content {

                width: 100% !important;

                min-height: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            .content {

                width: 100% !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            .container-fluid {

                width: 100% !important;

                max-width: 100% !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            /* -----------------------------------------------------
               HEADER CETAK
            ----------------------------------------------------- */

            .print-header {

                display: block !important;

                width: 100% !important;

                margin: 0 0 18px 0 !important;

                padding: 0 0 12px 0 !important;

                text-align: center !important;

                color: #000000 !important;

                border-bottom: 2px solid #000000 !important;

            }


            .print-header h3 {

                margin: 0 !important;

                font-size: 21px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header h5 {

                margin: 3px 0 0 0 !important;

                font-size: 15px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header h4 {

                margin: 14px 0 4px 0 !important;

                font-size: 17px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header p {

                margin: 3px 0 5px 0 !important;

                font-size: 10px !important;

                color: #000000 !important;

            }


            .print-header small {

                margin: 0 !important;

                font-size: 9px !important;

                color: #000000 !important;

            }


            /* -----------------------------------------------------
               RINGKASAN LAPORAN
            ----------------------------------------------------- */

            .report-summary {

                display: flex !important;

                flex-direction: row !important;

                align-items: stretch !important;

                justify-content: space-between !important;

                width: 100% !important;

                margin: 0 0 18px 0 !important;

                padding: 0 !important;

                gap: 10px !important;

            }


            .report-summary > div {

                flex: 1 1 0 !important;

                width: auto !important;

                max-width: none !important;

                min-width: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            .report-summary .card {

                width: 100% !important;

                min-height: 65px !important;

                height: 100% !important;

                margin: 0 !important;

                padding: 0 !important;

                border: 1px solid #000000 !important;

                border-radius: 0 !important;

                box-shadow: none !important;

                page-break-inside: avoid !important;

            }


            .report-summary .card-body {

                padding: 9px 11px !important;

            }


            .report-summary small {

                display: block !important;

                margin: 0 0 4px 0 !important;

                font-size: 9px !important;

                line-height: 1.2 !important;

                color: #000000 !important;

            }


            .report-summary h3 {

                margin: 0 !important;

                font-size: 17px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            /* -----------------------------------------------------
               CARD
            ----------------------------------------------------- */

            .card {

                margin-bottom: 14px !important;

                border: 1px solid #000000 !important;

                border-radius: 0 !important;

                box-shadow: none !important;

                page-break-inside: avoid !important;

            }


            .card-header {

                padding: 7px 9px !important;

                background: #ffffff !important;

                color: #000000 !important;

                border-bottom: 1px solid #000000 !important;

            }


            .card-header h5 {

                margin: 0 !important;

                font-size: 12px !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .card-body {

                background: #ffffff !important;

            }


            /* -----------------------------------------------------
               TABEL
            ----------------------------------------------------- */

            .table-responsive {

                width: 100% !important;

                max-width: 100% !important;

                overflow: visible !important;

            }


            table {

                width: 100% !important;

                max-width: 100% !important;

                margin: 0 !important;

                border-collapse: collapse !important;

                border-spacing: 0 !important;

                color: #000000 !important;

                table-layout: auto !important;

            }


            th,
            td {

                padding: 6px 7px !important;

                border: 1px solid #000000 !important;

                color: #000000 !important;

                background: #ffffff !important;

                font-size: 9.5px !important;

                line-height: 1.25 !important;

                vertical-align: middle !important;

            }


            th {

                background: #eeeeee !important;

                font-weight: 700 !important;

                text-align: left !important;

            }


            th:first-child,
            td:first-child {

                width: 35px !important;

                text-align: center !important;

            }


            /* Kolom jumlah */

            th:nth-child(5),
            td:nth-child(5) {

                text-align: center !important;

            }


            /* Kolom harga */

            th:nth-child(6),
            td:nth-child(6) {

                text-align: right !important;

                white-space: nowrap !important;

            }


            /* Kolom pendapatan */

            th:nth-child(7),
            td:nth-child(7) {

                text-align: right !important;

                white-space: nowrap !important;

            }


            /* -----------------------------------------------------
               FOOTER TABLE
            ----------------------------------------------------- */

            tfoot th,
            tfoot td {

                background: #eeeeee !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            /* -----------------------------------------------------
               BADGE
            ----------------------------------------------------- */

            .badge {

                display: inline !important;

                padding: 0 !important;

                border: 0 !important;

                border-radius: 0 !important;

                background: transparent !important;

                color: #000000 !important;

                font-size: inherit !important;

                font-weight: 700 !important;

            }


            /* -----------------------------------------------------
               WARNA TEKS
            ----------------------------------------------------- */

            .text-primary,
            .text-success,
            .text-danger,
            .text-warning,
            .text-info,
            .text-muted {

                color: #000000 !important;

            }


            /* -----------------------------------------------------
               SPACING
            ----------------------------------------------------- */

            .mb-4 {

                margin-bottom: 14px !important;

            }


            .mb-3 {

                margin-bottom: 10px !important;

            }


            .mt-3 {

                margin-top: 10px !important;

            }


            /* -----------------------------------------------------
               HINDARI ELEMEN TERPOTONG
            ----------------------------------------------------- */

            tr {

                page-break-inside: avoid !important;

            }


            thead {

                display: table-header-group !important;

            }


            tfoot {

                display: table-row-group !important;

            }


            /* -----------------------------------------------------
               HILANGKAN SHADOW
            ----------------------------------------------------- */

            * {

                box-shadow: none !important;

                text-shadow: none !important;

                -webkit-print-color-adjust: exact !important;

                print-color-adjust: exact !important;

            }


            /* -----------------------------------------------------
               UKURAN KERTAS
            ----------------------------------------------------- */

            @page {

                size: A4 portrait;

                margin: 12mm;

            }

        }

    </style>

</head>


<body>

    {{-- SIDEBAR --}}
    @include('partials.sidebar')


    <div class="main-content">

        {{-- NAVBAR --}}
        @include('partials.navbar')


        {{-- CONTENT --}}
        <main class="content">

            @yield('content')

        </main>


        {{-- FOOTER --}}
        @include('partials.footer')

    </div>


    @stack('scripts')

</body>

</html>