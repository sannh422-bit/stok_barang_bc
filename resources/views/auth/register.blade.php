
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Business Center</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-light">

<div class="container-fluid vh-100">
    <div class="row h-100">

        <!-- Bagian Kiri -->
        <div class="col-lg-7 d-none d-lg-flex flex-column justify-content-center align-items-center bg-primary text-white">

            <div class="text-center">

                <i class="bi bi-box-seam-fill display-1 mb-4"></i>

                <h1 class="fw-bold">
                    Business Center
                </h1>

                <h4 class="mb-3">
                    SMKN 5 Kabupaten Tangerang
                </h4>

                <p class="w-75 mx-auto">
                    Sistem Informasi Stok Barang untuk mengelola data barang,
                    transaksi, dan laporan inventaris secara mudah dan efisien.
                </p>

            </div>

        </div>

        <!-- Bagian Kanan -->
        <div class="col-lg-5 d-flex align-items-center">

            <div class="card shadow-lg border-0 w-100 mx-4">

                <div class="card-body p-5">

                    <h3 class="fw-bold mb-1">
                        Buat Akun Baru
                    </h3>

                    <p class="text-muted mb-4">
                        Isi data di bawah untuk membuat akun.
                    </p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">

                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus>

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Email -->
                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{ old('email') }}"
                                required>

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Password -->
                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                required>

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">

                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required>

                        </div>

                        <button class="btn btn-primary w-100">

                            <i class="bi bi-person-plus-fill me-2"></i>

                            Daftar

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        Sudah punya akun?

                        <a
                            href="{{ route('login') }}"
                            class="text-decoration-none fw-bold">

                            Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>
