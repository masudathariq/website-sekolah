@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 max-w-xl">
    <h1 class="text-3xl font-bold mb-6">Tambah Prestasi</h1>

    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="judul" class="block mb-1 font-semibold">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" class="w-full border px-3 py-2 rounded" required>
            @error('judul')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama_siswa" class="block mb-1 font-semibold">Nama Siswa</label>
            <input type="text" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" class="w-full border px-3 py-2 rounded" required>
            @error('nama_siswa')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="isi" class="block mb-1 font-semibold">Deskripsi Prestasi</label>
            <textarea id="isi" name="isi" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('isi') }}</textarea>
            @error('isi')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tanggal" class="block mb-1 font-semibold">Tanggal Prestasi</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" class="w-full border px-3 py-2 rounded" required>
            @error('tanggal')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gambar" class="block mb-1 font-semibold">Gambar Prestasi</label>
            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full">
            @error('gambar')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('admin.prestasi.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
