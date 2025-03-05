<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-orange-600 to-amber-500 font-poppins">

    <div class="bg-gradient-to-r from-orange-500 to-amber-400 shadow-2xl rounded-xl p-8 w-full max-w-md text-white">
        <h2 class="text-3xl font-bold text-center mb-6 tracking-wide">Tambah User</h2>

        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama" class="block text-lg font-semibold tracking-wider">Nama :</label>
                <input type="text" id="nama" name="nama" 
                    class="w-full border border-yellow-300 bg-yellow-200 text-gray-800 text-lg rounded-lg p-3 mt-1 focus:ring-2 focus:ring-white focus:bg-white transition" required>
            </div>

            <div>
                <label for="npm" class="block text-lg font-semibold tracking-wider">NPM :</label>
                <input type="text" id="npm" name="npm" 
                    class="w-full border border-yellow-300 bg-yellow-200 text-gray-800 text-lg rounded-lg p-3 mt-1 focus:ring-2 focus:ring-white focus:bg-white transition" required>
            </div>

            <div>
                <label for="kelas" class="block text-lg font-semibold tracking-wider">Kelas :</label>
                <input type="text" id="kelas" name="kelas" 
                    class="w-full border border-yellow-300 bg-yellow-200 text-gray-800 text-lg rounded-lg p-3 mt-1 focus:ring-2 focus:ring-white focus:bg-white transition" required>
            </div>

            <button type="submit" class="w-full bg-white text-orange-600 text-lg font-bold py-3 rounded-lg hover:bg-orange-100 transition tracking-wider">Submit</button>
        </form>
    </div>

</body>
</html>
