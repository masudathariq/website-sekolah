@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6">Edit Data Guru</h1>

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Guru</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $guru->nama) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="Masukkan nama guru" required>
        </div>

        <div class="mb-4">
            <label for="mata_pelajaran" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="Masukkan mata pelajaran yang diampu" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Foto Guru Saat Ini</label>
            @if($guru->foto)
                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" class="w-40 h-40 object-cover rounded mb-4 border border-gray-300">
            @else
                <p class="text-gray-500 italic">Belum ada foto.</p>
            @endif

            <label for="foto" class="block text-gray-700 font-semibold mb-2">Ganti Foto (opsional)</label>
            <input type="file" name="foto" id="foto" accept="image/*"
                class="w-full text-gray-700">
            <p class="text-sm text-gray-500 mt-1">Maksimal ukuran file 2MB.</p>
        </div>

        <div>
            <button type="submit" 
                class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition duration-200">
                Update
            </button>
            <a href="{{ route('admin.guru.index') }}" 
                class="ml-4 inline-block text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
