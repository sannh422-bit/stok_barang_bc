<aside class="sidebar">

    <!-- Logo -->
    <div class="sidebar-header text-center py-4">

        <h4 class="text-white fw-bold mb-1">
            Business Center
        </h4>

        <small class="text-white-50">
            SMKN 5 Kabupaten Tangerang
        </small>

    </div>

    <!-- Menu -->
    <ul class="nav flex-column px-3 mt-3">

        <!-- Dashboard -->
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard

            </a>
        </li>

        <!-- MASTER DATA -->
        <li class="mt-3 mb-2 text-white-50 small fw-bold">
            MASTER DATA
        </li>

        <!-- Barang -->
        <li class="nav-item">
            <a href="{{ route('barang.index') }}"
               class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}">

                <i class="bi bi-box-seam me-2"></i>
                Barang

            </a>
        </li>

        <!-- Kategori -->
        <li class="nav-item">
            <a href="{{ route('kategori.index') }}"
               class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">

                <i class="bi bi-tags me-2"></i>
                Kategori

            </a>
        </li>

        <!-- Supplier -->
        <li class="nav-item">
            <a href="{{ route('supplier.index') }}"
               class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">

                <i class="bi bi-truck me-2"></i>
                Supplier

            </a>
        </li>

        <!-- TRANSAKSI -->
        <li class="mt-3 mb-2 text-white-50 small fw-bold">
            TRANSAKSI
        </li>

        <!-- Barang Masuk -->
        <li class="nav-item">
            <a href="{{ route('barang-masuk.index') }}"
               class="nav-link {{ request()->routeIs('barang-masuk.*') ? 'active' : '' }}">

                <i class="bi bi-box-arrow-in-down me-2"></i>
                Barang Masuk

            </a>
        </li>

        <!-- Barang Keluar -->
        <li class="nav-item">
            <a href="{{ route('barang-keluar.index') }}"
               class="nav-link {{ request()->routeIs('barang-keluar.*') ? 'active' : '' }}">

                <i class="bi bi-box-arrow-up me-2"></i>
                Barang Keluar

            </a>
        </li>

        <!-- LAPORAN -->
        <li class="mt-3 mb-2 text-white-50 small fw-bold">
            LAPORAN
        </li>

        <!-- Laporan -->
        <li class="nav-item">
            <a href="{{ route('laporan.stok') }}"
               class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">

                <i class="bi bi-file-earmark-text me-2"></i>
                Laporan

            </a>
        </li>

        <!-- USERS -->
        <li class="mt-3 mb-2 text-white-50 small fw-bold">
            PENGATURAN
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}"
               class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

                <i class="bi bi-people me-2"></i>
                Pengguna

            </a>
        </li>

    </ul>

</aside>