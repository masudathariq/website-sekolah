@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Kelas</h1>

    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.kelas.form', ['kelas' => $kelas])
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
