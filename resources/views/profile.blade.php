<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-green-400 to-yellow-500">
    <div class="bg-white p-6 rounded-lg shadow-2xl w-96 text-center transform transition duration-500 hover:scale-105 border-4 border-green-500">
        <div class="flex justify-center mb-3">
            <img src="{{ asset('assets/img/GALA.jpg') }}" 
            alt="Profile" 
            class="w-60 h-60 rounded-full border-4 border-green-500 object-cover shadow-lg hover:shadow-xl transition duration-300">
        </div>
        <div class="space-y-5 text-left px-6 py-3">
            <div class="bg-green-100 py-3 px-4 rounded-md font-semibold text-green-700 shadow-sm border-2 border-green-500">Nama : {{ $nama }}</div>
            <div class="bg-green-100 py-3 px-4 rounded-md font-semibold text-green-700 shadow-sm border-2 border-green-500">NPM : {{ $npm }}</div>
            <div class="bg-green-100 py-3 px-4 rounded-md font-semibold text-green-700 shadow-sm border-2 border-green-500">Kelas : {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
        </div>
    </div>
</body>
</html>
