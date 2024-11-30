<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-gray-800 rounded-lg shadow-xl p-4 sm:p-8">
                <div class="mb-6 sm:mb-8 text-center">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Form Pemesanan Project</h1>
                    <p class="text-gray-400 mt-2 text-sm sm:text-base">Silakan isi detail project yang Anda inginkan</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('orders.store') }}" class="space-y-4 sm:space-y-6">
                    @csrf
                    @auth
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Nama</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" readonly
                                    class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Email</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" readonly
                                    class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base">
                            </div>
                        </div>
                    @endauth

                    <div>
                        <label class="block text-sm font-medium text-gray-300">Paket Yang Dipilih</label>
                        <select name="package_type" required class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-500 @error('package_type') border-red-500 @enderror">
                            <option value="static">Paket Statis (Rp 30.000/pages)</option>
                            <option value="mobile">Paket Mobile Dev (Rp 50.000/pages)</option>
                            <option value="website">Paket Website Dev (Rp 65.000/pages)</option>
                        </select>
                        @error('package_type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300">Jumlah Halaman</label>
                        <input type="number" name="pages_count" required min="1" 
                            class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pages_count') border-red-500 @enderror"
                            placeholder="Masukkan jumlah halaman">
                        @error('pages_count')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300">Deskripsi Project</label>
                        <textarea name="project_description" required rows="4" 
                            class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('project_description') border-red-500 @enderror"
                            placeholder="Jelaskan detail project yang Anda inginkan"></textarea>
                        @error('project_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Teknologi/Bahasa Pemrograman</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="html" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-gray-300 text-sm">HTML/CSS</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="javascript" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-gray-300 text-sm">JavaScript</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="php" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-gray-300 text-sm">PHP</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="flutter" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-gray-300 text-sm">Flutter</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="laravel" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-gray-300 text-sm">Laravel</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="technologies[]" value="other" class="form-checkbox h-4 w-4 text-blue-500" onchange="toggleOtherInput(this)">
                                <span class="ml-2 text-gray-300 text-sm">Lainnya</span>
                            </label>
                            <input type="text" name="other_technology" id="otherTechnologyInput" class="mt-2 hidden w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan teknologi lain">
                            <script>
                                function toggleOtherInput(checkbox) {
                                    const input = document.getElementById('otherTechnologyInput');
                                    input.classList.toggle('hidden', !checkbox.checked);
                                    if (!checkbox.checked) {
                                        input.value = '';
                                    }
                                }
                            </script>
                        </div>
                        @error('technologies')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300">Deadline Project</label>
                        <input type="date" name="deadline" required
                            class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deadline') border-red-500 @enderror">
                        @error('deadline')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300">Catatan Tambahan</label>
                        <textarea name="additional_notes" rows="3" 
                            class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white text-sm sm:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('additional_notes') border-red-500 @enderror"
                            placeholder="Ketik nama email, instagram, atau pesan lainnya"></textarea>
                        @error('additional_notes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm sm:text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Kirim Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
