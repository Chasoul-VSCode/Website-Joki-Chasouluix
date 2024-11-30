<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-6">
        
        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
             <div class="mb-8 text-center">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/laptop-5183539-4333115.png" alt="Logo Komputer" class="mx-auto h-24 w-24 drop-shadow-lg">
                <h1 class="text-3xl font-bold text-white">Chasoul IUX</h1>
                <p class="text-gray-400 mt-2">Website joki tugas n develop apps</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                    <input type="email" name="email" id="email" required 
                        class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('email') }}"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" 
                            class="h-4 w-4 bg-gray-700 border-gray-600 rounded text-blue-500 focus:ring-blue-500">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                            class="text-sm text-blue-400 hover:text-blue-300">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Sign in
                </button>
            </form>

            @if (Route::has('register'))
                <div class="mt-6 text-center">
                    <p class="text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300">
                            Register here
                        </a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
