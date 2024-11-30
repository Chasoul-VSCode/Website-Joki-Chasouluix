<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            cursor: pointer;
        }
        .card-click {
            transition: transform 0.1s ease-in-out;
        }
        .card-click:active {
            transform: scale(0.95);
        }
        .sidebar {
            transition: transform 0.3s ease-in-out;
            position: fixed;
            z-index: 40;
        }
        .sidebar.closed {
            transform: translateX(-100%);
        }
    </style>
</head>
<body class="bg-gray-900 min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar bg-gray-800 w-64 min-h-screen fixed left-0 top-0 z-30 closed">
        <div class="p-4">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-white text-xl font-bold">Chasoul.UIX</h1>
                <button onclick="toggleSidebar()" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="space-y-4">
                <a href="#" class="block text-gray-300 hover:text-white">Dashboard</a>
                <a href="#" class="block text-gray-300 hover:text-white">Paket Joki</a>
                <a href="#" class="block text-gray-300 hover:text-white">Layanan</a>
                <a href="#" class="block text-gray-300 hover:text-white">Riwayat</a>
                <a href="#" class="block text-gray-300 hover:text-white">Pengaturan</a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div id="content" class="ml-0 transition-all duration-300">
        <nav class="bg-gray-800 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <button onclick="toggleSidebar()" class="text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-300 mr-4">Welcome, {{ $user->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-white px-3 py-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


        <!-- WEBSITE -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <h2 class="text-2xl font-bold text-white mb-6">JOKI TUGAS PROGRAMMING</h2>
                <h3 class="text-1xl font-bold text-white mb-6">Website</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Design Database & API</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 10.000/Table</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Api and Database Design</li>
                            <li>✓ Mysql + Api EXpressJS / php</li>
                            <li>✓ Api Documentation & Postman</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Design Statis</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 10.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Website Design Statis</li>
                            <li>✓ HTML, CSS</li>
                            <li>✓ No Database, Api</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Design Website + Animation</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 15.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Design Website + Animation</li>
                            <li>✓ HTML, CSS, JS</li>
                            <li>✓ No Database, Api</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Website + Api</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 20.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Website Design + Api</li>
                            <li>✓ HTML, CSS, JS</li>
                            <li>✓ Database & Api include ExpressJS / PHP</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>
                    

                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Basic</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 20.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Website Design Framework</li>
                            <li>✓ Laravel</li>
                            <li>✓ No Database, Api</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Expert 1</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 25.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Design Framework + API Sederhana</li>
                            <li>✓ Laravel + Api</li>
                            <li>✓ Database & Api include</li>
                            <li>✓ Konsultasi via Chat n Call</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                     <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Expert 2</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 35.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Website Kompleks No Images Post</li>
                            <li>✓ Laravel + Api</li>
                            <li>✓ Database & Api include</li>
                            <li>✓ Konsultasi via Chat n Call</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                     <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Expert 3</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 50.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Kompleks Website</li>
                            <li>✓ Laravel + Api + Images Post</li>
                            <li>✓ Database & Api include + Web Hosting </li>
                            <li>✓ Konsultasi via Chat n Call</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                     <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Profesional</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 75.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Kompleks Website, Mobile, Desktop</li>
                            <li>✓ Laravel + Flutter + VB + Api</li>
                            <li>✓ Database & Api include + Web Hosting</li>
                            <li>✓ Konsultasi via Chat n Call</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>
                </div>


                 <!-- MOBILE -->
            <div class="px-4 py-6 sm:px-0">
                <h3 class="text-1xl font-bold text-white mb-6">Mobile Apps</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Design Mobile Apps</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 15.000/pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Design Mobile Sederhana</li>
                            <li>✓ Flutter</li>
                            <li>✓ No Database + APi </li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4"> Design Mobile Apps + Api</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 25.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Apps Mobile + Api Sederhana</li>
                            <li>✓ Flutter + ExpressJS / PHP </li>
                            <li>✓ Database, Api include</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4"> Mobile Apps Expert 1</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 30.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Mobile Apps + APi Semi Kompleks</li>
                            <li>✓ Fluter No images Post + EXpressJS</li>
                            <li>✓ Database + Api include</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                      <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Mobile Apps Expert 2</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 35.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Mobile Apps Kompleks</li>
                            <li>✓ Flutter Post Images + EXpressJS</li>
                            <li>✓ Database & Api include ExpressJS / PHP</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>
                    

                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Mobile Apps Expert 3</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 50.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Mobile Apps Kompleks</li>
                            <li>✓ FLutter + EXpressJS / Laravel Api</li>
                            <li>✓ Database, Api include + Web Hosting</li>
                            <li>✓ Konsultasi via Chat</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>

                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                        <h3 class="text-xl font-bold text-white mb-4">Paket Framework Profesional</h3>
                        <div class="text-3xl font-bold text-blue-500 mb-4">Rp 75.000/Pages</div>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li>✓ Kompleks Website, Mobile, Desktop</li>
                            <li>✓ Laravel + Flutter + VB + Api</li>
                            <li>✓ Database & Api include</li>
                            <li>✓ Konsultasi via Chat n Call</li>
                        </ul>
                        <a href="{{ route('pages.buy') }}" class="block w-full">
                            <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                Pilih Paket
                            </button>
                        </a>
                    </div>
                </div>

                <!-- FIGMA -->
                <div class="mt-12">
                <h3 class="text-1xl font-bold text-white mb-6">Figma Design</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Design Sederhana</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 30.000/Project</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Konsultasi via Chat</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Design Profesional</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 50.000/pages</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Konsultasi via Chat</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>
                    </div>  
                </div>

               
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-white mb-6">COMPANY DEVELOPMENT</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Paket Statis</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 30.000/pages</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Website Statis Kompleks</li>
                                <li>✓ No Database, Api</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ HTML + CSS + JS</li>
                                <li>✓ Konsultasi via Chat</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 border-2 border-blue-500 card-hover card-click relative">
                            <div class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 text-sm rounded-bl">POPULAR</div>
                            <h3 class="text-xl font-bold text-white mb-4">Paket Mobile Dev</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 50.000/pages</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Kompleks</li>
                                <li>✓ FLutter + EXpressJS / Laravel Api</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Database & Api include</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Paket Website Dev</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 65.000/pages</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Kompleks</li>
                                <li>✓ Laravel Api</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Database & Api include</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Paket Website Profesional</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 100.000/pages</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ Kompleks + web hosting</li>
                                <li>✓ Laravel Api</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Database & Api include</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Project Ecommerce</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 10jt-25jt</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ web hosting</li>
                                <li>✓ Laravel + Flutter</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Maintenance 6 Bulan</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Project Elearning</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 2,5jt-5jt</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ web hosting</li>
                                <li>✓ Laravel</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Maintenance 3 Bulan</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Project SPP Payment</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 2,5jt-3jt</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ web hosting</li>
                                <li>✓ Laravel</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Maintenance 1 Bulan</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Project Kasir</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 5jt-10jt</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ web hosting</li>
                                <li>✓ Flutter / laravel</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Maintenance 6 Bulan</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6 card-hover card-click">
                            <h3 class="text-xl font-bold text-white mb-4">Project Stock Barang</h3>
                            <div class="text-3xl font-bold text-blue-500 mb-4">Rp 3jt-7jt</div>
                            <ul class="text-gray-300 space-y-2 mb-6">
                                <li>✓ web hosting</li>
                                <li>✓ Flutter</li>
                                <li>✓ Revisi unlimited</li>
                                <li>✓ Maintenance 6 Bulan</li>
                                <li>✓ Konsultasi via Chat n Call</li>
                            </ul>
                            <a href="{{ route('pages.buy') }}" class="block w-full">
                                <button class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700 transition">
                                    Pilih Paket
                                </button>
                            </a>
                        </div>
                    </div>  
                </div>
            </div>
        </main>

    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('closed');
            content.classList.toggle('ml-0');
            content.classList.toggle('ml-64');
        }
    </script>
</body>
</html>
