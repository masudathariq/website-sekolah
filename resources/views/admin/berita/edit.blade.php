@extends('layouts.admin')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

@if($errors->any())
    <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Konten</label>
        <textarea name="konten" rows="6" class="w-full border px-3 py-2 rounded" required>{{ old('konten', $berita->konten) }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Gambar Saat Ini</label>
        @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar berita" class="w-48 mb-2 rounded">
        @else
            <p>Tidak ada gambar</p>
        @endif
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" accept="image/*" class="w-full">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary ml-2">Batal</a>
</form>
@endsection
