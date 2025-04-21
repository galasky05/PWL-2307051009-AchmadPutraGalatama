@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-primary via-secondary to-accent font-poppins">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"]
                    },
                    colors: {
                        primary: "#2563eb",
                        secondary: "#9333ea",
                        accent: "#06b6d4",
                        dark: "#1e293b",
                        light: "#f8fafc",
                    }
                }
            }
        }
    </script>

    <div class="relative w-full max-w-md p-1 bg-gradient-to-r from-secondary to-accent rounded-lg">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md border border-gray-200">
            <h2 class="text-2xl font-bold text-dark text-center mb-6 tracking-wide">Tambah User</h2>

            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="block text-sm font-semibold text-gray-600">Nama:</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                        class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
                    @foreach ($errors->get('nama') as $msg)
                        <p class="text-pink-500">{{ $msg }}</p>
                    @endforeach
                </div>

                <div>
                    <label for="npm" class="block text-sm font-semibold text-gray-600">NPM:</label>
                    <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}"
                        class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
                    @foreach ($errors->get('npm') as $msg)
                        <p class="text-pink-500">{{ $msg }}</p>
                    @endforeach
                </div>

                <div>
                    <label for="kelas_id" class="block text-sm font-semibold text-gray-600">Kelas:</label>
                    <select name="kelas_id" id="kelas_id"
                        class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" 
                                {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                                {{ $kelasItem->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('kelas_id') as $msg)
                        <p class="text-pink-500">{{ $msg }}</p>
                    @endforeach
                </div>

                <div>
                    <label for="foto" class="block text-sm font-semibold text-gray-600">Foto:</label>
                    <input type="file" id="foto" name="foto" class="mt-2">
                    @if($user->foto)
                        <img src="{{ asset('upload/img/' . $user->foto) }}" alt="User Photo" width="100" class="mt-2 rounded">
                    @else
                        <p>No photo uploaded yet.</p>
                    @endif

                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-primary to-accent text-white text-base font-bold py-3 rounded-lg 
                    shadow-md transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:shadow-accent/50 
                    focus:outline-none focus:ring-4 focus:ring-accent/60">
                    Submit
                </button>
            </form>
        </div>
    </div>

</body>
@endsection
