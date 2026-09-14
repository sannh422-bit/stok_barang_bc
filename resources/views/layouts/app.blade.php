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

        @media print {

            /* =========================
               SEMBUNYIKAN NAVIGASI
            ========================= */

            .sidebar,
            .navbar,
            footer,
            .no-print {

                display: none !important;

            }


            /* =========================
               KONTEN UTAMA
            ========================= */

            .main-content {

                margin-left: 0 !important;
                width: 100% !important;

            }


            .content {

                margin: 0 !important;
                padding: 0 !important;

            }


            .container-fluid {

                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;

            }


            /* =========================
               HEADER LAPORAN
            ========================= */

            .print-header {

                display: block !important;
                color: #000 !important;

            }


            .print-header h3,
            .print-header h4,
            .print-header h5,
            .print-header p,
            .print-header small {

                color: #000 !important;

            }


            /* =========================
               CARD
            ========================= */

            .card {

                box-shadow: none !important;
                border: 1px solid #dee2e6 !important;

            }


            .card-header {

                background: #fff !important;

            }


            /* =========================
               TABLE
            ========================= */

            .table-responsive {

                overflow: visible !important;

            }


            table {

                width: 100% !important;
                border-collapse: collapse !important;

            }


            th,
            td {

                border: 1px solid #dee2e6 !important;

            }


            /* =========================
               WARNA PRINT
            ========================= */

            * {

                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;

            }


            /* =========================
               KERTAS
            ========================= */

            @page {

                size: A4 portrait;
                margin: 12mm;

            }

        }

    </style>

</head>


<body>

    {{-- Sidebar --}}
    @include('partials.sidebar')


    {{-- Konten Utama --}}
    <div class="main-content">

        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- Isi Halaman --}}
        <main class="content">

            @yield('content')

        </main>


        {{-- Footer --}}
        @include('partials.footer')

    </div>


    @stack('scripts')

</body>

</html>