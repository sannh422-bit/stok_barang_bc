<nav class="navbar navbar-expand-lg bg-white shadow-sm">

    <div class="container-fluid">

        <!-- Tombol Menu (nanti untuk mobile) -->
        <button class="btn d-lg-none">
            <i class="bi bi-list fs-4"></i>
        </button>

        <!-- Judul -->
        <div>

            <h5 class="mb-0 fw-bold">
                Sistem Stok Barang
            </h5>

            <small class="text-muted">
                Business Center SMKN 5 Kabupaten Tangerang
            </small>

        </div>

        <!-- User -->
        <div class="ms-auto d-flex align-items-center">

            <div class="text-end me-3">

                <div class="fw-semibold">
                    {{ Auth::user()->name }}
                </div>

                <small class="text-muted">
                    Administrator
                </small>

            </div>

            <div class="dropdown">

                <button
                    class="btn btn-light border rounded-circle"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-fill"></i>

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <form
                            action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button class="dropdown-item">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>