<!DOCTYPE html>
<html class="dark">
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom right, #1a1f2c, #121620);
            min-height: 100vh;
        }
        .glass-effect {
            background: rgba(31, 41, 55, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
        @media (max-width: 640px) {
            .responsive-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body class="text-sm sm:text-base">
    <!-- App Bar -->
    <nav class="glass-effect fixed w-full z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-chart-line text-blue-400 text-xl"></i>
                    <span class="text-white text-xl font-bold tracking-tight hidden sm:inline">Admin Dashboard</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-gray-300 hidden sm:flex items-center">
                        <i class="far fa-user-circle mr-2"></i>
                        <span>Admin</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out shadow-lg hover:shadow-xl text-xs sm:text-sm">
                            <i class="fas fa-sign-out-alt mr-2"></i><span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Revenue Card -->
                <div class="glass-effect rounded-xl p-6 hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-200">Total Pendapatan</h3>
                        <i class="fas fa-money-bill-wave text-blue-400 text-xl"></i>
                    </div>
                    <div class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 text-transparent bg-clip-text">
                        @if(isset($orders))
                            Rp {{ number_format($orders->sum('total_price'), 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </div>
                </div>

                <!-- Total Orders Card -->
                <div class="glass-effect rounded-xl p-6 hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-200">Total Pesanan</h3>
                        <i class="fas fa-shopping-cart text-green-400 text-xl"></i>
                    </div>
                    <div class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-green-400 to-green-600 text-transparent bg-clip-text">
                        @if(isset($orders))
                            {{ $orders->count() }}
                        @else
                            0
                        @endif
                    </div>
                </div>

                <!-- Pending Orders Card -->
                <div class="glass-effect rounded-xl p-6 hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-200">Status Check</h3>
                        <i class="fas fa-clock text-yellow-400 text-xl"></i>
                    </div>
                    <div class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-yellow-400 to-yellow-600 text-transparent bg-clip-text">
                        @if(isset($orders))
                            {{ $orders->where('status', 'Check')->count() }}
                        @else
                            0
                        @endif
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6 hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-200">Status Proses</h3>
                        <i class="fas fa-spinner text-purple-400 text-xl"></i>
                    </div>
                    <div class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    @if(isset($orders))
                            {{ $orders->where('status', 'Proses')->count() }}
                        @else
                            0
                        @endif
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="glass-effect rounded-xl">
                <div class="p-6 border-b border-gray-700/50">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0">
                        <h3 class="text-xl font-semibold text-white">Daftar Pesanan</h3>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <form action="{{ route('admin.dashboard') }}" method="GET" class="flex items-center space-x-2">
                                <select name="status" class="block rounded-lg border border-gray-700 bg-gray-900 text-gray-300 focus:border-blue-500 focus:ring-blue-500 text-xs sm:text-sm px-2 sm:px-4 py-2">
                                    <option value="">Semua Status</option>
                                    <option value="Check" {{ request('status') == 'Check' ? 'selected' : '' }}>Check</option>
                                    <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Batal" {{ request('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                <button type="submit" class="px-2 sm:px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                                    <i class="fas fa-filter mr-2"></i>Filter
                                </button>
                            </form>
                            <div class="flex items-center space-x-2 text-gray-400">
                                <i class="fas fa-list-ul"></i>
                                <span>{{ request('status') ? ucfirst(request('status')) : 'Semua' }} Pesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto responsive-table">
                    <table class="min-w-full divide-y divide-gray-700/50">
                        <thead class="bg-gray-800/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Tipe Paket
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Jumlah Halaman
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Teknologi
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Deadline
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Total Harga
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700/50">
                            @if(isset($orders) && $orders->count() > 0)
                                @foreach($orders->when(request('status'), function($query, $status) {
                                    return $query->where('status', $status);
                                }) as $order)
                                <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        {{ $order->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        {{ $order->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1.5 rounded-full text-xs font-medium bg-gradient-to-r from-blue-400/20 to-blue-600/20 text-blue-400 border border-blue-400/30">
                                            {{ ucfirst($order->package_type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        {{ $order->pages_count }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-300">
                                        {{ Str::limit($order->project_description, 50) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach($order->technologies as $tech)
                                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-700/50 text-gray-300 border border-gray-600">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        {{ \Carbon\Carbon::parse($order->deadline)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-300">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1.5 rounded-full text-xs font-medium 
                                            @if($order->status == 'Check') bg-yellow-400/20 text-yellow-400 border border-yellow-400/30
                                            @elseif($order->status == 'Proses') bg-blue-400/20 text-blue-400 border border-blue-400/30
                                            @elseif($order->status == 'Selesai') bg-green-400/20 text-green-400 border border-green-400/30
                                            @elseif($order->status == 'Batal') bg-red-400/20 text-red-400 border border-red-400/30
                                            @endif">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center gap-2">
                                            <div class="relative">
                                                <form action="{{ route('orders.update.status', $order->id) }}" method="POST" class="flex items-center gap-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="relative">
                                                        <select name="status" id="status-{{ $order->id }}" class="appearance-none block w-full rounded-lg border border-gray-700 bg-gray-900 text-gray-300 pl-3 pr-6 py-1.5 focus:border-blue-500 focus:ring-blue-500 text-xs sm:text-sm cursor-pointer">
                                                            @foreach(['Check', 'Proses', 'Selesai', 'Batal'] as $status)
                                                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}
                                                                    class="bg-gray-900 hover:bg-gray-800">
                                                                    {{ ucfirst($status) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-1.5 text-gray-400">
                                                            <i class="fas fa-chevron-down text-[10px]"></i>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-xs sm:text-sm leading-4 font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 transition-all duration-200 shadow-lg hover:shadow-xl">
                                                        <i class="fas fa-sync-alt mr-1.5"></i>
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-sm text-gray-400">
                                        <div class="flex flex-col items-center justify-center py-6">
                                            <i class="fas fa-inbox text-4xl mb-3"></i>
                                            No orders found
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
