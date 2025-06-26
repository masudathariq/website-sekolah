@extends('layouts.app')

@section('content')
<section class="bg-gray-50">
    <div class="container px-4 sm:px-6 py-8 mx-auto max-w-7xl">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 capitalize md:text-3xl">
                Kabar Terkini Sekolah Kita
            </h1>
            <p class="mt-3 text-gray-600 text-sm md:text-base max-w-md mx-auto">
                Dapatkan informasi terbaru dan kegiatan menarik dari sekolah kami
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($beritas as $berita)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                @if($berita->gambar)
                <img class="object-cover w-full h-48 rounded-t-xl" 
                     src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                @else
                <img class="object-cover w-full h-48 rounded-t-xl" 
                     src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image">
                @endif

                <div class="p-4">
                    <div>
                        <span class="text-xs font-medium text-indigo-600 uppercase">Berita</span>
                        <a href="{{ route('berita.show', $berita->slug) }}" 
                           class="block mt-1 text-lg font-semibold text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                            {{ Str::limit($berita->judul, 60) }}
                        </a>
                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                            {{ Str::limit(strip_tags($berita->konten), 80) }}
                        </p>
                    </div>

                    <div class="mt-3">
                        <span class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $beritas->links('pagination::tailwind') }}
        </div>

        <form action="{{ route('berita.index') }}" method="GET" 
              class="mt-10 flex flex-col sm:flex-row gap-4 items-center justify-center max-w-3xl mx-auto px-4">
            <div class="flex flex-col w-full sm:w-40">
                <label for="start_date" class="mb-1 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input
                    id="start_date"
                    type="date"
                    name="start_date"
                    value="{{ request('start_date') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full text-sm
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                />
            </div>

            <div class="flex flex-col w-full sm:w-40">
                <label for="end_date" class="mb-1 text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input
                    id="end_date"
                    type="date"
                    name="end_date"
                    value="{{ request('end_date') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full text-sm
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                />
            </div>

            <div class="flex flex-col flex-grow w-full sm:w-64">
                <label for="search" class="mb-1 text-sm font-medium text-gray-700">Cari Berita</label>
                <input
                    id="search"
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full text-sm
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan kata kunci..."
                />
            </div>

            <div class="flex gap-3 mt-4 sm:mt-6">
                <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg px-4 py-2 text-sm font-medium transition duration-200">
                    Cari
                </button>
                <a href="{{ route('berita.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg px-4 py-2 text-sm font-medium transition duration-200">
                    Reset
                </a>
            </div>
        </form>
    </div>
</section>
@endsection