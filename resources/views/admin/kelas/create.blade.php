@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Tambah Kelas</h1>

    <form action="{{ route('admin.kelas.store') }}" method="POST">
        @csrf
        @include('admin.kelas.form')
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
