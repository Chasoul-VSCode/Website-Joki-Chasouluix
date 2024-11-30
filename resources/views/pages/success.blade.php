<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">
    <div class="w-full max-w-lg mx-auto">
        <div class="bg-gray-800 rounded-lg shadow-xl p-4 sm:p-6 md:p-8">
            <div class="text-center">
                @if (session('success'))
                    <div class="bg-green-600 text-white px-3 py-2 sm:px-4 sm:py-3 rounded mb-4 sm:mb-6" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <h4 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-3 sm:mb-4">Terima kasih atas pesanan Anda!</h4>
                <p class="text-sm sm:text-base text-gray-300 mb-4 sm:mb-6">Total yang harus dibayar: Rp {{ number_format(session('total_price'), 0, ',', '.') }}</p>
                
                <a href="{{ route('home') }}" class="inline-block bg-blue-600 text-white font-medium px-4 sm:px-6 py-2 text-sm sm:text-base rounded-md hover:bg-blue-700 transition">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>
</html>