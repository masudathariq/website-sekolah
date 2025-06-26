@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Data Sejarah</h1>
    <a href="{{ route('admin.sejarah.create') }}" class="btn btn-primary mb-4">Tambah Sejarah</a>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Judul</th>
                <th class="border border-gray-300 px-4 py-2">Gambar</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sejarahs as $sejarah)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $sejarah->judul }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    @if ($sejarah->gambar)
                    <img src="{{ asset('storage/' . $sejarah->gambar) }}" alt="{{ $sejarah->judul }}" class="w-20 h-20 object-cover rounded">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('admin.sejarah.edit', $sejarah->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('admin.sejarah.destroy', $sejarah->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">Data sejarah belum tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $sejarahs->links() }}
    </div>
</div>
@endsection
