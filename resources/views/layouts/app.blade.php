<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'MTs Muhammadiyah 1 Natar')</title>
    <meta name="description" content="Website resmi MTs Muhammadiyah 1 Natar" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN -->
    <script defer src="//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom Styles -->
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .dropdown-menu {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 dark:text-gray-100 min-h-screen flex flex-col transition-colors duration-300">

    <!-- Navbar -->
    <nav x-data="{ isOpen: false }" class="bg-white dark:bg-green-900/90 dark:glassmorphism sticky top-0 z-50 shadow-md">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center">
                <img class="h-10 sm:h-12 transition-transform duration-300 hover:scale-105" src="{{ asset('img/logosekolah.png') }}" alt="Logo Sekolah" />
            </a>

            <!-- Burger Button (Mobile) -->
            <button
                @click="isOpen = !isOpen"
                class="text-gray-600 dark:text-gray-200 focus:outline-none lg:hidden"
                aria-label="Toggle menu"
            >
                <svg
                    x-show="!isOpen"
                    x-cloak
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg
                    x-show="isOpen"
                    x-cloak
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Navbar Desktop -->
            <div class="hidden lg:flex items-center w-full max-w-screen-xl mx-auto">
                <ul class="flex space-x-6 flex-grow justify-end items-center">
                    <li><a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200">Beranda</a></li>

                    <!-- Dropdown Profil Desktop -->
                    <li x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                        >
                            Profil Sekolah
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            x-cloak
                            class="absolute z-20 bg-white dark:bg-gray-800 mt-2 rounded-lg shadow-lg w-48 dropdown-menu"
                        >
                            <a href="{{ url('/tentang-kami') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Tentang Kami</a>
                            <a href="{{ url('/sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Sejarah</a>
                            <a href="{{ url('/visi-misi') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Visi & Misi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Sarana & Prasarana</a>
                        </div>
                    </li>

                    <!-- Dropdown Informasi Akademik Desktop -->
                    <li x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                        >
                            Informasi Akademik
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            x-cloak
                            class="absolute z-20 bg-white dark:bg-gray-800 mt-2 rounded-lg shadow-lg w-48 dropdown-menu"
                        >
                            <a href="{{ url('/jadwal') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Jadwal Pelajaran</a>
                            <a href="{{ url('/kalender-akademik') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Kalender Akademik</a>
                            <a href="{{ url('/guru') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Daftar Guru</a>
                        </div>
                    </li>

                    <!-- Dropdown Berita & Pengumuman Desktop -->
                    <li x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                        >
                            Berita & Pengumuman
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            x-cloak
                            class="absolute z-20 bg-white dark:bg-gray-800 mt-2 rounded-lg shadow-lg w-48 dropdown-menu"
                        >
                            <a href="{{ route('berita.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Berita Kegiatan Madrasah</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Pengumuman Penting</a>
                        </div>
                    </li>

                    <!-- Dropdown Galeri Foto Desktop -->
                    <li x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                        >
                            Galeri Foto
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            x-cloak
                            class="absolute z-20 bg-white dark:bg-gray-800 mt-2 rounded-lg shadow-lg w-48 dropdown-menu"
                        >
                            <a href="{{ route('berita.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Dokumentasi Sekolah</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-800 hover:text-green-600 dark:hover:text-green-300 transition-colors">Video Profil</a>
                        </div>
                    </li>

                    <li><a href="{{ url('/kontak') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-200">Kontak</a></li>
                </ul>

                <!-- Login Button Desktop -->
                <div class="ml-6">
                    <a href="{{ route('login') }}" class="inline-block px-4 py-2 text-sm text-white bg-green-600 hover:bg-green-700 rounded-lg shadow-md transition-all duration-200 hover:scale-105">
                        Login Admin
                    </a>
                </div>
            </div>
        </div>

        <!-- Menu Mobile Dropdown -->
        <div :class="isOpen ? 'block' : 'hidden'" x-cloak class="lg:hidden bg-white dark:bg-gray-800 px-4 pb-4 shadow-lg">
            <ul class="flex flex-col space-y-2">
                <li><a href="{{ url('/') }}" class="block py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors">Beranda</a></li>

                <!-- Dropdown Profil Mobile -->
                <li x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 w-full py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium"
                    >
                        Profil Sekolah
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-1 space-y-1 dropdown-menu">
                        <a href="{{ url('/tentang-kami') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Tentang Kami</a>
                        <a href="{{ url('/sejarah') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Sejarah</a>
                        <a href="{{ url('/visi-misi') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Visi & Misi</a>
                        <a href="#" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Sarana & Prasarana</a>
                    </div>
                </li>

                <!-- Dropdown Informasi Akademik Mobile -->
                <li x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 w-full py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium"
                    >
                        Informasi Akademik
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-1 space-y-1 dropdown-menu">
                        <a href="{{ url('/jadwal') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Jadwal Pelajaran</a>
                        <a href="{{ url('/kalender-akademik') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Kalender Akademik</a>
                        <a href="{{ url('/guru') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Daftar Guru</a>
                    </div>
                </li>

                <!-- Dropdown Berita & Pengumuman Mobile -->
                <li x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 w-full py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium"
                    >
                        Berita & Pengumuman
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-1 space-y-1 dropdown-menu">
                        <a href="{{ route('berita.index') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Berita Kegiatan Madrasah</a>
                        <a href="#" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Pengumuman Penting</a>
                    </div>
                </li>

                <!-- Dropdown Galeri Foto Mobile -->
                <li x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 w-full py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium"
                    >
                        Galeri Foto
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-1 space-y-1 dropdown-menu">
                        <a href="{{ route('berita.index') }}" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Dokumentasi Sekolah</a>
                        <a href="#" class="block py-1.5 text-sm text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Video Profil</a>
                    </div>
                </li>

                <li><a href="{{ url('/kontak') }}" class="block py-2 text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors">Kontak</a></li>

                <!-- Login Button Mobile -->
                <li>
                    <a href="{{ route('login') }}" class="block w-full text-center mt-2 px-4 py-2 text-sm text-white bg-green-600 hover:bg-green-700 rounded-lg shadow-md transition-all duration-200 hover:scale-105">
                        Login Admin
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 py-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Kontak Kami</h3>
                <p class="text-sm mb-2">
                    <a href="https://maps.app.goo.gl/e1G4Z8mEvRc6NnFz7" target="_blank" rel="noopener" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                        Jl. K.H. Ahmad Dahlan, Dusun Tangkitbatu, Muara Putih, Kecamatan Natar, Kabupaten Lampung Selatan
                    </a>
                </p>
                <p class="text-sm mb-2">
                    Email: 
                    <a href="mailto:mtsmuhammadiyah1natar@gmail.com" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                        mtsmuhammadiyah1natar@gmail.com
                    </a>
                </p>
                <p class="text-sm">
                    WhatsApp: 
                    <a href="https://wa.me/6288287570334" target="_blank" rel="noopener" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                        088287570334
                    </a>
                </p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Sosial Media</h3>
                <ul class="flex space-x-4">
                    <li>
                        <a href="https://www.facebook.com/MTsMuhammadiyah1Natar" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-500 transition-transform duration-200 hover:scale-110" aria-label="Facebook" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12a10 10 0 10-11.53 9.87v-6.98h-2.66v-2.89h2.66v-2.21c0-2.63 1.57-4.08 3.97-4.08 1.15 0 2.35.21 2.35.21v2.58h-1.32c-1.3 0-1.7.8-1.7 1.63v1.87h2.89l-.46 2.89h-2.43v6.98A10 10 0 0022 12z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/mtsmusata_official" class="text-gray-600 dark:text-gray-300 hover:text-pink-500 dark:hover:text-pink-400 transition-transform duration-200 hover:scale-110" aria-label="Instagram" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 2C4.79 2 3 3.79 3 6v12c0 2.21 1.79 4 4 4h10c2.21 0 4-1.79 4-4V6c0-2.21-1.79-4-4-4H7zm0 2h10c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H7c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm8 3a1 1 0 11-2 0 1 1 0 012 0zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/6288287570334" class="text-gray-600 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-transform duration-200 hover:scale-110" aria-label="WhatsApp" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.78 11.78 0 0012 0a11.86 11.86 0 00-9.37 5 11.8 11.8 0 00-1.67 9.91L0 24l8.22-2.12a11.87 11.87 0 008.61-18.4zM12 21.19a9.17 9.17 0 01-4.67-1.3l-.33-.2-4.88 1.26 1.3-4.76-.21-.34a9.16 9.16 0 1114.27 4.95 9.07 9.07 0 01-5.18 1.13zm5.31-6.12c-.29-.14-1.72-.85-1.99-.95s-.46-.14-.65.14-.75.95-.92 1.15-.34.21-.63.07a7.69 7.69 0 01-2.26-1.4 8.47 8.47 0 01-1.57-1.94c-.16-.29 0-.45.13-.59.14-.14.3-.35.44-.52a1.87 1.87 0 00.29-.49.49.49 0 000-.47c-.07-.14-.65-1.56-.89-2.15s-.48-.49-.65-.5h-.55a1.17 1.17 0 00-.85.4 3.58 3.58 0 00-1.1 2.62 5.53 5.53 0 002.37 3.56 9.69 9.69 0 004.25 2.41 4.05 4.05 0 001.9.17 2.71 2.71 0 001.65-1.3 2.3 2.3 0 00.17-1.32c-.1-.12-.29-.2-.53-.33z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Tentang Website</h3>
                <p class="text-sm">
                    Dibuat oleh 
                    <a href="https://www.instagram.com/masudathariq578" target="_blank" rel="noopener" class="text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 transition-colors">
                        Masud Athariq Akbar, A.Md.Kom
                    </a>
                </p>
            </div>
        </div>
        <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            © {{ date('Y') }} MTs Muhammadiyah 1 Natar. All rights reserved.
        </p>
    </footer>

</body>
</html>