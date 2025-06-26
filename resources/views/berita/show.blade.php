@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-5 max-w-3xl mx-auto my-8">
    <h1 class="text-2xl sm:text-3xl font-semibold mb-4 text-gray-900">
        {{ $berita->judul }}
    </h1>

    @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" 
             alt="{{ $berita->judul }}" 
             class="w-full max-h-72 object-cover rounded-md mb-5 shadow-sm" />
    @endif

    <p class="text-xs text-gray-600 mb-6">
        {{ \Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
    </p>

    <article class="text-sm leading-relaxed text-gray-800 space-y-4">
        {!! nl2br(e($berita->konten)) !!}
    </article>

    <div class="mt-8 flex justify-end">
        <a href="{{ route('berita.index') }}" 
           class="text-indigo-600 hover:text-indigo-800 font-medium transition">
           ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
