@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 max-w-6xl">
    <h1 class="text-2xl md:text-3xl font-bold mb-4 text-center text-gray-800">Daftar Guru</h1>
    <h3 class="text-lg md:text-xl font-semibold mb-8 text-center text-gray-600">MTs Muhammadiyah 1 Natar</h3>

    @if($gurus->isEmpty())
        <p class="text-center text-gray-500 text-sm italic">Belum ada data guru yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($gurus as $guru)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="p-4 flex flex-col items-center text-center">
                        {{-- Gambar Guru --}}
                        <div class="relative">
                            @if($guru->foto)
                                <img
                                    src="{{ asset('storage/' . $guru->foto) }}"
                                    alt="{{ $guru->nama }}"
                                    class="w-20 h-20 rounded-full object-cover mb-3 border-2 border-indigo-200"
                                >
                            @else
                                <div
                                    class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mb-3 border-2 border-indigo-200 text-gray-500 text-xs"
                                >
                                    <span>Foto</span>
                                </div>
                            @endif
                            <div class="absolute bottom-0 right-0 p-1 bg-indigo-500 rounded-full">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
                            </div>
                        </div>

                        {{-- Nama dan Mata Pelajaran --}}
                        <h2 class="text-base font-semibold mb-1 text-gray-800 hover:text-indigo-600 transition duration-200">{{ Str::limit($guru->nama, 20) }}</h2>
                        <p class="text-gray-600 text-sm">{{ Str::limit($guru->mata_pelajaran, 25) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $gurus->links('pagination::tailwind') }}
        </div>
    @endif
</div>
@endsection