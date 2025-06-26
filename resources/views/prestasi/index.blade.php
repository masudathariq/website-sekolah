@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-semibold mb-8 text-center">Prestasi Terbaru</h1>

    @if($prestasis->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($prestasis as $prestasi)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-5 flex flex-col">
            @if($prestasi->gambar)
            <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="rounded-md mb-4 h-48 object-cover w-full">
            @endif

            <h2 class="text-xl font-bold mb-2">
                <a href="{{ route('prestasi.show', $prestasi->slug) }}" class="hover:text-yellow-500">{{ $prestasi->judul }}</a>
            </h2>

            <p class="text-sm text-gray-600 mb-2">Nama Siswa: {{ $prestasi->nama_siswa }}</p>

            <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($prestasi->isi, 120) }}</p>

            <p class="text-xs text-gray-500 mt-auto">{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d F Y') }}</p>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $prestasis->links() }}
    </div>
    @else
    <p class="text-center text-gray-600">Belum ada prestasi yang ditampilkan.</p>
    @endif
</div>
@endsection
