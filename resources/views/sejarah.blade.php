@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12 max-w-5xl">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="p-6 sm:p-10">
            <h1 class="text-2xl sm:text-4xl font-extrabold text-gray-900 dark:text-green-400 mb-6 border-b-4 border-green-400 inline-block leading-tight">
                {{ $sejarah->judul ?? 'Sejarah Sekolah' }}
            </h1>

            @if (!empty($sejarah->gambar))
                <div class="my-6 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('storage/' . $sejarah->gambar) }}" alt="{{ $sejarah->judul }}"
                         class="w-full h-auto max-h-[400px] object-cover rounded-lg">
                </div>
            @endif

            <article class="prose prose-sm sm:prose-lg max-w-none text-justify text-gray-700 dark:text-gray-300 leading-relaxed">
                {!! nl2br(e($sejarah->isi ?? 'Data sejarah belum tersedia.')) !!}
            </article>
        </div>
    </div>

    <div class="text-center mt-10">
        <a href="{{ url('/') }}"
           class="inline-flex items-center text-green-500 dark:text-green-400 hover:text-green-600 dark:hover:text-green-300 transition font-semibold text-xs sm:text-sm">
            ← Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
