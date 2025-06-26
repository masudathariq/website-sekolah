<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }
    a {
      text-decoration: none !important;
    }
  </style>
</head>
<body class="flex">
  <!-- SIDEBAR -->
  <aside class="w-64 h-screen bg-white shadow-md flex flex-col px-6 py-8 border-r border-gray-200">
    <!-- Logo -->
    <div class="flex items-center mb-10 space-x-3">
      <img src="https://merakiui.com/images/logo.svg" class="h-8 w-auto" alt="Logo" />
      <span class="text-xl font-bold text-gray-800">Admin Panel</span>
    </div>

    <!-- NAVIGATION -->
    <nav class="flex flex-col space-y-2 flex-1">
      @foreach([
        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
        ['route' => 'admin.berita.index', 'label' => 'Berita', 'icon' => 'newspaper'],
        ['route' => 'admin.hero_images.index', 'label' => 'Gambar Utama', 'icon' => 'image'],
        ['route' => 'admin.prestasi.index', 'label' => 'Prestasi', 'icon' => 'star'],
        ['route' => 'admin.kalender_akademik.index', 'label' => 'Kalender Akademik', 'icon' => 'calendar-days'],
        ['route' => 'admin.jadwal.index', 'label' => 'Jadwal Pelajaran', 'icon' => 'academic-cap']
      ] as $item)
      <a href="{{ route($item['route']) }}"
         class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
         {{ request()->routeIs($item['route']) 
              ? 'bg-indigo-100 text-indigo-700' 
              : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-700' }}">
        <svg class="w-5 h-5 mr-3 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          @switch($item['icon'])
            @case('home')
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9v9a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3v-9z" />
              @break
            @case('newspaper')
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v11a2 2 0 01-2 2z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 10h10M7 14h5" />
              @break
            @case('image')
              <rect x="3" y="4" width="18" height="16" rx="2" ry="2" />
              <circle cx="8.5" cy="10.5" r="1.5" />
              <path d="M21 15l-5-5L5 21" />
              @break
            @case('star')
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.75l-6.172 3.247 1.179-6.872L2 9.75l6.914-1.003L12 2.5l3.086 6.247L22 9.75l-5.007 4.375 1.179 6.872z" />
              @break
            @case('calendar-days')
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-12 0a2 2 0 012-2h8a2 2 0 012 2v7a2 2 0 01-2 2H7a2 2 0 01-2-2V11z" />
              @break
            @case('academic-cap')
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-12 0a2 2 0 012-2h8a2 2 0 012 2v7a2 2 0 01-2 2H7a2 2 0 01-2-2V11z" />
              @break
          @endswitch
        </svg>
        <span>{{ $item['label'] }}</span>
      </a>
      @endforeach
    </nav>

    <!-- PROFILE SECTION -->
    <div class="border-t pt-6 mt-8 flex items-center gap-3">
      <img class="w-10 h-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?auto=format&fit=crop&w=634&q=80" alt="User Profile" />
      <div class="text-sm">
        <p class="font-semibold text-gray-800">Masud Athariq</p>
        <a href="#" class="text-xs text-indigo-600 hover:underline">Lihat Profil</a>
      </div>
    </div>

<!-- LOGOUT -->
<div class="mt-6">
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
     class="flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:text-white hover:bg-red-500 rounded-md transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16" />
    </svg>
    Keluar
  </a>

  <!-- Hidden Logout Form -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>
</div>

  </aside>
</body>
</html>
