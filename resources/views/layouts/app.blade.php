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
           PRINT
        ========================================================= */

        @media print {

            /* =====================================================
               RESET DASAR
            ===================================================== */

            html,
            body {

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                height: auto !important;

                margin: 0 !important;

                padding: 0 !important;

                background: #ffffff !important;

                overflow: visible !important;

            }


            body {

                font-family: Arial, Helvetica, sans-serif !important;

                color: #000000 !important;

            }


            /* =====================================================
               HILANGKAN BAGIAN WEBSITE
            ===================================================== */

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

                width: 0 !important;

                height: 0 !important;

                min-height: 0 !important;

                max-height: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

                overflow: hidden !important;

            }


            /* =====================================================
               MAIN CONTENT
            ===================================================== */

            .main-content {

                display: block !important;

                position: static !important;

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                height: auto !important;

                min-height: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

                left: auto !important;

                right: auto !important;

                top: auto !important;

                bottom: auto !important;

                transform: none !important;

                float: none !important;

            }


            main.content,
            .main-content .content {

                display: block !important;

                position: static !important;

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                height: auto !important;

                min-height: 0 !important;

                margin: 0 !important;

                padding: 0 !important;

                left: auto !important;

                right: auto !important;

                top: auto !important;

                bottom: auto !important;

                transform: none !important;

                float: none !important;

            }


            /* =====================================================
               CONTAINER
            ===================================================== */

            .container,
            .container-fluid {

                display: block !important;

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            /* =====================================================
               HEADER CETAK
            ===================================================== */

            .print-header {

                display: block !important;

                width: 100% !important;

                max-width: none !important;

                box-sizing: border-box !important;

                margin: 0 0 16px 0 !important;

                padding: 0 0 12px 0 !important;

                text-align: center !important;

                color: #000000 !important;

                border-bottom: 2px solid #000000 !important;

            }


            .print-header h3 {

                margin: 0 !important;

                padding: 0 !important;

                font-size: 21px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header h5 {

                margin: 3px 0 0 0 !important;

                padding: 0 !important;

                font-size: 15px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header h4 {

                margin: 13px 0 4px 0 !important;

                padding: 0 !important;

                font-size: 17px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .print-header p {

                margin: 3px 0 4px 0 !important;

                padding: 0 !important;

                font-size: 10px !important;

                line-height: 1.3 !important;

                color: #000000 !important;

            }


            .print-header small {

                margin: 0 !important;

                padding: 0 !important;

                font-size: 9px !important;

                line-height: 1.2 !important;

                color: #000000 !important;

            }


            /* =====================================================
               RINGKASAN LAPORAN
            ===================================================== */

            .report-summary {

                display: flex !important;

                flex-direction: row !important;

                flex-wrap: nowrap !important;

                align-items: stretch !important;

                justify-content: space-between !important;

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                margin: 0 0 14px 0 !important;

                padding: 0 !important;

                gap: 10px !important;

            }


            .report-summary > div {

                display: block !important;

                flex: 1 1 0 !important;

                width: 0 !important;

                min-width: 0 !important;

                max-width: none !important;

                margin: 0 !important;

                padding: 0 !important;

            }


            .report-summary .card {

                display: block !important;

                width: 100% !important;

                min-width: 0 !important;

                min-height: 60px !important;

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

                margin: 0 !important;

            }


            .report-summary small {

                display: block !important;

                margin: 0 0 4px 0 !important;

                padding: 0 !important;

                font-size: 9px !important;

                line-height: 1.2 !important;

                color: #000000 !important;

            }


            .report-summary h3 {

                display: block !important;

                margin: 0 !important;

                padding: 0 !important;

                font-size: 17px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            /* =====================================================
               CARD
            ===================================================== */

            .card {

                width: 100% !important;

                max-width: none !important;

                margin-bottom: 12px !important;

                border: 1px solid #000000 !important;

                border-radius: 0 !important;

                box-shadow: none !important;

                page-break-inside: avoid !important;

            }


            .card-header {

                padding: 7px 9px !important;

                margin: 0 !important;

                background: #ffffff !important;

                color: #000000 !important;

                border-bottom: 1px solid #000000 !important;

            }


            .card-header h5 {

                margin: 0 !important;

                padding: 0 !important;

                font-size: 12px !important;

                line-height: 1.2 !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            .card-body {

                background: #ffffff !important;

                margin: 0 !important;

            }


            /* =====================================================
               TABEL
            ===================================================== */

            .table-responsive {

                display: block !important;

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                margin: 0 !important;

                padding: 0 !important;

                overflow: visible !important;

            }


            table {

                display: table !important;

                width: 100% !important;

                min-width: 100% !important;

                max-width: none !important;

                margin: 0 !important;

                padding: 0 !important;

                border-collapse: collapse !important;

                border-spacing: 0 !important;

                table-layout: fixed !important;

                color: #000000 !important;

            }


            th,
            td {

                box-sizing: border-box !important;

                border: 1px solid #000000 !important;

                padding: 6px 7px !important;

                font-size: 9px !important;

                line-height: 1.25 !important;

                vertical-align: middle !important;

                color: #000000 !important;

                background: #ffffff !important;

                word-break: normal !important;

                overflow-wrap: break-word !important;

            }


            th {

                background: #eeeeee !important;

                font-weight: 700 !important;

                color: #000000 !important;

            }


            /* =====================================================
               KOLOM LAPORAN PENDAPATAN
            ===================================================== */

            th:nth-child(1),
            td:nth-child(1) {

                width: 5% !important;

                text-align: center !important;

            }


            th:nth-child(2),
            td:nth-child(2) {

                width: 13% !important;

            }


            th:nth-child(3),
            td:nth-child(3) {

                width: 15% !important;

            }


            th:nth-child(4),
            td:nth-child(4) {

                width: 21% !important;

            }


            th:nth-child(5),
            td:nth-child(5) {

                width: 10% !important;

                text-align: center !important;

            }


            th:nth-child(6),
            td:nth-child(6) {

                width: 18% !important;

                text-align: right !important;

                white-space: nowrap !important;

            }


            th:nth-child(7),
            td:nth-child(7) {

                width: 18% !important;

                text-align: right !important;

                white-space: nowrap !important;

            }


            /* =====================================================
               TABEL LAPORAN STOK
               10 KOLOM
            ===================================================== */

            .table-responsive table:has(th:nth-child(10)) {

                table-layout: fixed !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(1),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(1) {

                width: 5% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(2),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(2) {

                width: 10% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(3),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(3) {

                width: 16% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(4),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(4) {

                width: 12% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(5),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(5) {

                width: 12% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(6),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(6) {

                width: 8% !important;

                text-align: center !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(7),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(7) {

                width: 8% !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(8),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(8) {

                width: 11% !important;

                text-align: right !important;

                white-space: nowrap !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(9),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(9) {

                width: 11% !important;

                text-align: right !important;

                white-space: nowrap !important;

            }


            .table-responsive table:has(th:nth-child(10)) th:nth-child(10),
            .table-responsive table:has(th:nth-child(10)) td:nth-child(10) {

                width: 7% !important;

                text-align: center !important;

            }


            /* =====================================================
               TABLE FOOTER
            ===================================================== */

            tfoot th,
            tfoot td {

                background: #eeeeee !important;

                color: #000000 !important;

                font-weight: 700 !important;

            }


            /* =====================================================
               BADGE
            ===================================================== */

            .badge {

                display: inline !important;

                margin: 0 !important;

                padding: 0 !important;

                border: 0 !important;

                border-radius: 0 !important;

                background: transparent !important;

                color: #000000 !important;

                font-size: inherit !important;

                font-weight: 700 !important;

            }


            /* =====================================================
               WARNA TEKS
            ===================================================== */

            .text-primary,
            .text-success,
            .text-danger,
            .text-warning,
            .text-info,
            .text-muted {

                color: #000000 !important;

            }


            /* =====================================================
               BOOTSTRAP ROW
            ===================================================== */

            .row {

                width: 100% !important;

                min-width: 0 !important;

                max-width: none !important;

                margin-left: 0 !important;

                margin-right: 0 !important;

            }


            /* =====================================================
               HILANGKAN SHADOW
            ===================================================== */

            * {

                box-shadow: none !important;

                text-shadow: none !important;

                -webkit-print-color-adjust: exact !important;

                print-color-adjust: exact !important;

            }


            /* =====================================================
               JANGAN POTONG BARIS TABEL
            ===================================================== */

            tr {

                page-break-inside: avoid !important;

            }


            thead {

                display: table-header-group !important;

            }


            tfoot {

                display: table-row-group !important;

            }


            /* =====================================================
               PAGE
            ===================================================== */

            @page {

                size: A4 portrait;

                margin: 10mm;

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