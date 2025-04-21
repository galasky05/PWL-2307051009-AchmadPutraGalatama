@extends('layouts.app')

@section('title', 'User List')
@section('content')
<div style="background-color: #e9f0f7; min-height: 100vh; padding-top: 2rem; padding-bottom: 2rem;">
    <div class="container">

        <!-- Judul Halaman & Tombol Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h2 class="fw-bold text-dark mb-0">Daftar Pengguna</h2>
                <p class="text-muted fst-italic mb-0">Data mencakup ID, Nama, NPM, Kelas, dan Foto pengguna.</p>
            </div>
            <a href="{{ route('user.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 mt-3 mt-md-0">
                <i class="bi bi-person-plus-fill"></i> Tambah Pengguna
            </a>
        </div>

        <!-- Kartu Tabel Pengguna -->
        <div class="card border-0 shadow" style="border-radius: 16px; background-color: #ffffff;">
            <div class="card-body p-4">

                <!-- Jumlah Pengguna -->
                <div class="text-center mb-4">
                    <span class="fs-5 fw-semibold">Total Pengguna: </span>
                    <span class="fs-5 text-primary fw-bold">{{ $users->count() }}</span>
                </div>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle" style="border-radius: 12px;">
                        <thead class="table-primary text-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NPM</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-start w-25">{{ $user->nama }}</td>
                                    <td class="text-center">{{ $user->npm }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-dark">{{ $user->nama_kelas }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($user->foto && file_exists(public_path('upload/img/' . $user->foto)))
                                            <img src="{{ asset('upload/img/' . $user->foto) }}" 
                                                 alt="Foto {{ $user->nama }}" 
                                                 class="img-thumbnail rounded-2" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="text-muted fst-italic">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        
                                        <a href="{{ route('users.show', $user->id) }}" 
                                           class="btn btn-sm btn-info text-white mb-1">
                                            <i class="bi bi-eye-fill"></i> View
                                        </a>
                                    
                                        <a href="{{ route('user.edit', $user->id) }}" 
                                           class="btn btn-sm btn-info text-white mb-1">
                                            <i class="bi bi-eye-fill"></i> Edit
                                        </a>

                                        <form action="{{ url('/user/' . $user->id . '/delete') }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-white mb-1" 
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            <i class="bi bi-trash-fill"></i> Delete
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted fst-italic text-center">Tidak ada data pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer Info -->
                <div class="text-center mt-4">
                    <p class="text-muted fst-italic">
                        Jika ada kesalahan data, silakan hubungi <span class="text-danger fw-semibold">administrator</span>.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
