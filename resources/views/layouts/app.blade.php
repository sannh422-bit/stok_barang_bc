<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Business Center')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    <style>

        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            /* =================================================
               SEMBUNYIKAN ELEMEN WEBSITE
            ================================================= */

            .sidebar,
            .navbar,
            nav,
            footer,
            .footer,
            .no-print {

                display: none !important;

            }


            /* Pastikan footer yang memiliki posisi fixed juga hilang */

            body footer,
            .main-content footer,
            .main-content .footer {

                display: none !important;
                visibility: hidden !important;

            }


            /* =================================================
               RESET BODY
            ================================================= */

            html,
            body {

                width: 100% !important;

                margin: 0 !important;

                padding: 0 !important;

                background: #ffffff !important;

                color: #000000 !important;

                font-family: Arial, Helvetica, sans-serif !important;

            }


            /* =================================================
               KONTEN UTAMA
            ================================================= */

            .main-content {

                margin-left: 0 !important;

                width: 100% !important;

                min-height: auto !important;

            }


            .content {

                margin: 0 !important;

                padding: 0 !important;

            }


            .container-fluid {

                width: 100% !important;

                max-width: 100% !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            /* =================================================
               HEADER LAPORAN
            ================================================= */

            .print-header {

                display: block !important;

                width: 100% !important;

                text-align: center !important;

                color: #000 !important;

                margin: 0 0 18px 0 !important;

                padding: 0 0 12px 0 !important;

                border-bottom: 2px solid #000 !important;

            }


            .print-header h3 {

                font-size: 21px !important;

                font-weight: 700 !important;

                margin: 0 !important;

                padding: 0 !important;

                color: #000 !important;

                text-transform: uppercase;

            }


            .print-header h5 {

                font-size: 16px !important;

                font-weight: 700 !important;

                margin: 3px 0 0 0 !important;

                padding: 0 !important;

                color: #000 !important;

                text-transform: uppercase;

            }


            .print-header h4 {

                font-size: 17px !important;

                font-weight: 700 !important;

                margin: 14px 0 4px 0 !important;

                padding: 0 !important;

                color: #000 !important;

                text-transform: uppercase;

            }


            .print-header p {

                font-size: 11px !important;

                margin: 2px 0 5px 0 !important;

                color: #000 !important;

            }


            .print-header small {

                font-size: 10px !important;

                line-height: 1.5 !important;

                color: #000 !important;

            }


            /* =================================================
               RINGKASAN
            ================================================= */

            .report-summary {

                display: flex !important;

                width: 100% !important;

                gap: 12px !important;

                margin: 0 0 18px 0 !important;

            }


            .report-summary > div {

                flex: 1 1 50% !important;

                width: 50% !important;

                max-width: 50% !important;

                padding: 0 !important;

            }


            .report-summary .card {

                height: auto !important;

                min-height: 70px !important;

                margin: 0 !important;

                border: 1px solid #000 !important;

                border-radius: 0 !important;

                box-shadow: none !important;

            }


            .report-summary .card-body {

                padding: 10px 12px !important;

            }


            .report-summary small {

                display: block !important;

                font-size: 10px !important;

                color: #000 !important;

                margin-bottom: 4px !important;

            }


            .report-summary h3 {

                font-size: 19px !important;

                margin: 0 !important;

                padding: 0 !important;

                color: #000 !important;

            }


            /* =================================================
               CARD DATA
            ================================================= */

            .card {

                box-shadow: none !important;

                border: 1px solid #000 !important;

                border-radius: 0 !important;

                page-break-inside: avoid !important;

            }


            .card-header {

                background: #fff !important;

                color: #000 !important;

                border-bottom: 1px solid #000 !important;

                padding: 8px 10px !important;

            }


            .card-header h5 {

                font-size: 13px !important;

                margin: 0 !important;

                color: #000 !important;

            }


            .card-body {

                background: #fff !important;

            }


            /* =================================================
               TABLE
            ================================================= */

            .table-responsive {

                overflow: visible !important;

                width: 100% !important;

            }


            table {

                width: 100% !important;

                max-width: 100% !important;

                border-collapse: collapse !important;

                border-spacing: 0 !important;

                margin: 0 !important;

                color: #000 !important;

            }


            th,
            td {

                border: 1px solid #000 !important;

                color: #000 !important;

                padding: 7px 8px !important;

                font-size: 10.5px !important;

                line-height: 1.3 !important;

                vertical-align: middle !important;

            }


            th {

                background: #eeeeee !important;

                font-weight: 700 !important;

                text-align: left !important;

            }


            td {

                background: #fff !important;

            }


            /* Kolom nomor */

            th:first-child,
            td:first-child {

                width: 40px !important;

                text-align: center !important;

            }


            /* Kolom jumlah */

            th:nth-child(5),
            td:nth-child(5) {

                text-align: center !important;

                width: 75px !important;

            }


            /* =================================================
               BADGE
            ================================================= */

            .badge {

                background: transparent !important;

                color: #000 !important;

                border: 0 !important;

                padding: 0 !important;

                font-size: inherit !important;

                font-weight: 700 !important;

            }


            /* =================================================
               WARNA TEXT
            ================================================= */

            .text-success,
            .text-danger,
            .text-primary,
            .text-warning,
            .text-muted {

                color: #000 !important;

            }


            /* =================================================
               SPACING
            ================================================= */

            .mb-4 {

                margin-bottom: 14px !important;

            }


            .mb-3 {

                margin-bottom: 10px !important;

            }


            /* =================================================
               HILANGKAN SHADOW
            ================================================= */

            * {

                box-shadow: none !important;

            }


            /* =================================================
               PRINT COLOR
            ================================================= */

            * {

                -webkit-print-color-adjust: exact !important;

                print-color-adjust: exact !important;

            }


            /* =================================================
               A4
            ================================================= */

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


    {{-- KONTEN UTAMA --}}

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