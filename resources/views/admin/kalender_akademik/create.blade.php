@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Kalender Akademik</h1>

    <form action="{{ route('admin.kalender_akademik.store') }}" method="POST">
        @csrf

        @php
            $borderJudul = $errors->has('judul') ? 'border-red-500' : 'border-gray-300';
            $borderTanggal = $errors->has('tanggal') ? 'border-red-500' : 'border-gray-300';
            $borderDeskripsi = $errors->has('deskripsi') ? 'border-red-500' : 'border-gray-300';
        @endphp

        <div class="mb-4">
            <label for="judul" class="block mb-1 font-semibold">Judul</label>
            <input
                type="text"
                name="judul"
                id="judul"
                value="{{ old('judul') }}"
                class="w-full border rounded px-3 py-2 {{ $borderJudul }}"
                required
                autocomplete="off"
            >
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal" class="block mb-1 font-semibold">Tanggal</label>
            <input
                type="date"
                name="tanggal"
                id="tanggal"
                value="{{ old('tanggal') }}"
                class="w-full border rounded px-3 py-2 {{ $borderTanggal }}"
                required
            >
            @error('tanggal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="4"
                class="w-full border rounded px-3 py-2 {{ $borderDeskripsi }}"
                required
            >{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded"
        >
            Simpan
        </button>
    </form>
</div>
@endsection
