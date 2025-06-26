@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Data Kelas</h1>
    <a href="{{ route('admin.kelas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Kelas</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Tingkatan</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Tahun Ajaran</th>
                <th class="border p-2">Aktif?</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr>
                <td class="border p-2">{{ $k->tingkatan }}</td>
                <td class="border p-2">{{ $k->nama }}</td>
                <td class="border p-2">{{ $k->tahun_ajaran }}</td>
                <td class="border p-2">{{ $k->is_active ? 'Ya' : 'Tidak' }}</td>
                <td class="border p-2">
                    <a href="{{ route('admin.kelas.edit', $k->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
