@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Pastikan Judul Tampil -->
    <h2 class="text-center text-dark fw-bold mb-3">Daftar Pengguna</h2>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body bg-light p-4 rounded-bottom">
            <!-- Deskripsi Singkat -->
            <p class="text-muted text-center fst-italic">
                Berikut adalah daftar pengguna yang terdaftar dalam sistem. Data ini mencakup informasi dasar seperti ID, Nama, NPM, dan Kelas.
            </p>

            <!-- Menampilkan Jumlah Pengguna -->
            <p class="fw-bold text-center fs-5">
                Total Pengguna: <span class="text-primary">{{ $users->count() }}</span>
            </p>

            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="align-middle">
                                <td class="text-center fw-semibold">{{ $user->id }}</td>
                                <td class="text-capitalize">{{ $user->nama }}</td>
                                <td class="text-center">{{ $user->npm }}</td>
                                <td class="text-center">{{ $user->nama_kelas }}</td>
                                <td class="text-center"></td> <!-- Kolom aksi tetap dikosongkan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Catatan di Bawah Tabel -->
            <p class="text-muted mt-3 text-center fst-italic">
                Jika ada kesalahan data, silakan hubungi <span class="fw-bold text-danger">administrator</span> untuk perbaikan.
            </p>
        </div>
    </div>
</div>

@endsection
