@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Sejarah</h1>

    <form action="{{ route('admin.sejarah.update', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Judul</label>
        <input type="text" name="judul" class="w-full border p-2 mb-4" value="{{ old('judul', $sejarah->judul) }}" required>

        <label class="block mb-2">Isi</label>
        <textarea name="isi" rows="8" class="w-full border p-2 mb-4" required>{{ old('isi', $sejarah->isi) }}</textarea>

        @if ($sejarah->gambar)
        <img src="{{ asset('storage/' . $sejarah->gambar) }}" alt="{{ $sejarah->judul }}" class="w-48 h-48 object-cover rounded mb-4">
        @endif

        <label class="block mb-2">Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" class="mb-4">

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
