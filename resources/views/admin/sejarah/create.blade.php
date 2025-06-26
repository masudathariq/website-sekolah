@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Sejarah</h1>

    <form action="{{ route('admin.sejarah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Judul</label>
        <input type="text" name="judul" class="w-full border p-2 mb-4" value="{{ old('judul') }}" required>

        <label class="block mb-2">Isi</label>
        <textarea name="isi" rows="8" class="w-full border p-2 mb-4" required>{{ old('isi') }}</textarea>

        <label class="block mb-2">Gambar (opsional)</label>
        <input type="file" name="gambar" class="mb-4">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
