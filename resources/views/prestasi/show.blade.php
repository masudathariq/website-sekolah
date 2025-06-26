@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-4xl">
    <article class="bg-white rounded-lg shadow p-6">
        <h1 class="text-4xl font-bold mb-6">{{ $prestasi->judul }}</h1>

        @if($prestasi->gambar)
        <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="rounded-md mb-6 w-full object-cover max-h-96">
        @endif

        <p class="text-sm text-gray-600 mb-4">Nama Siswa: {{ $prestasi->nama_siswa }}</p>
        <p class="text-gray-800 whitespace-pre-line mb-6">{{ $prestasi->isi }}</p>

        <p class="text-xs text-gray-500">Tanggal Prestasi: {{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d F Y') }}</p>

        <a href="{{ route('prestasi.index') }}" class="inline-block mt-8 text-yellow-500 hover:underline">← Kembali ke daftar prestasi</a>
    </article>
</div>
@endsection
