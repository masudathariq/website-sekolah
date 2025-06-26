@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6 text-center">Pilih Kelas</h1>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach ($kelasList as $kelas)
        <a href="{{ route('jadwal.show', $kelas->id) }}" class="block bg-white shadow rounded-lg p-4 text-center hover:bg-yellow-100 transition">
            <div class="text-lg font-semibold text-yellow-600">{{ $kelas->tingkatan }} {{ $kelas->nama }}</div>
            <div class="text-sm text-gray-500">{{ $kelas->tahun_ajaran }}</div>
        </a>
        @endforeach
    </div>
</div>
@endsection
