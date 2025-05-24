@extends('layouts.app')

@section('content')
<!-- 
<!DOCTYPE html>
<html lang="en">  -->
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
    
    
    
 </head>   -->


<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">


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
                        primary: "#2563eb", // Biru elegan
                        secondary: "#9333ea", // Ungu soft
                        accent: "#06b6d4", // Cyan untuk efek modern
                        dark: "#1e293b", // Abu tua
                        light: "#f8fafc", // Abu terang
                    }
                }
            }
        }
    </script>
<div class="relative w-full max-w-md p-1 bg-gradient-to-r from-secondary to-accent rounded-lg">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md border border-gray-200">
        <h2 class="text-2xl font-bold text-dark text-center mb-6 tracking-wide">Tambah User</h2>

        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-600">Nama:</label>
                <input type="text" id="nama" name="nama" 
                    class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
                    
                    @foreach ($errors->get('nama') as $msg)

                    <p class="text-pink-500">{{ $msg }}</p>

                    @endforeach
            </div>

            <div>
                <label for="npm" class="block text-sm font-semibold text-gray-600">NPM:</label>
                <input type="text" id="npm" name="npm" 
                    class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
            
                    @foreach ($errors->get('npm') as $msg)

                    <p class="text-pink-500">{{ $msg }}</p>

                    @endforeach
            </div>

            <div>
                <label for="kelas_id" class="block text-sm font-semibold text-gray-600">Kelas:</label>
                <select name="kelas_id" id="kelas_id" 
                    class="w-full border border-gray-300 bg-gray-100 text-dark text-base rounded-lg p-3 mt-1 focus:ring-2 focus:ring-accent focus:bg-white transition">
                    @foreach ($errors->get('kelas') as $msg)

                    <p class="text-pink-500">{{ $msg }}</p>

                    @endforeach
                    <option value ="" disabled selected>Pilih Kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto"><br><br>
            </div>

            
            <button type="submit" 
                class="w-full bg-gradient-to-r from-primary to-accent text-white text-base font-bold py-3 rounded-lg 
                shadow-md transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:shadow-accent/50 
                focus:outline-none focus:ring-4 focus:ring-accent/60">
                Submit
            </button>
        </form>
    </div>


  </body>
 <!-- </html>  -->
 @endsection
 





