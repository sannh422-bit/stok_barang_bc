@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Kelola Pengguna</h2>

            <p class="text-muted mb-0">
                Kelola akun pengguna dan hak akses sistem.
            </p>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            + Tambah Pengguna
        </a>

    </div>


    {{-- PESAN SUKSES --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    {{-- PESAN ERROR --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    {{-- ERROR VALIDASI --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- DATA PENGGUNA --}}
    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">
                Data Pengguna
            </h5>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="5%" class="text-center">
                                No
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Email
                            </th>

                            <th width="15%" class="text-center">
                                Role
                            </th>

                            <th width="20%" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($users as $user)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $user->name }}

                                    @if($user->id === auth()->id())

                                        <span class="badge bg-secondary ms-1">
                                            Akun Anda
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td class="text-center">

                                    @if($user->role === 'admin')

                                        <span class="badge bg-primary">
                                            Admin
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            User
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('users.edit', $user) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>


                                    @if($user->id !== auth()->id())

                                        <form action="{{ route('users.destroy', $user) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>

                                        </form>

                                    @else

                                        <button type="button"
                                                class="btn btn-sm btn-secondary"
                                                disabled>
                                            Hapus
                                        </button>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    Belum ada data pengguna.

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