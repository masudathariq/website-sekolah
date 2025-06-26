@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-bold mb-6">Tambah Pengumuman</h1>
    <form action="{{ route('admin.pengumuman.store') }}" method="POST">
        @csrf

        @php
            $judulClass = $errors->has('judul') ? 'border-red-500' : 'border-gray-300';
            $isiClass = $errors->has('isi') ? 'border-red-500' : 'border-gray-300';
            $tanggalClass = $errors->has('tanggal') ? 'border-red-500' : 'border-gray-300';
        @endphp

        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                class="w-full border {{ $judulClass }} rounded px-4 py-2 shadow-sm">
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Isi</label>
            <textarea name="isi" rows="5"
                class="w-full border {{ $isiClass }} rounded px-4 py-2 shadow-sm">{{ old('isi') }}</textarea>
            @error('isi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                class="w-full border {{ $tanggalClass }} rounded px-4 py-2 shadow-sm">
            @error('tanggal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
