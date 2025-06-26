@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-6xl">
    <h1 class="text-3xl font-bold mb-6">Kalender Akademik</h1>

    <a href="{{ route('admin.kalender_akademik.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Event
    </a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-300 rounded-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 text-left">Judul</th>
                <th class="border px-4 py-2 text-left">Tanggal</th>
                <th class="border px-4 py-2 text-left">Deskripsi</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td class="border px-4 py-2">{{ $event->judul }}</td>
                <td class="border px-4 py-2">{{ $event->tanggal->format('d F Y') }}</td>
                <td class="border px-4 py-2">{{ Str::limit($event->deskripsi, 50) }}</td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('admin.kalender_akademik.edit', $event->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('admin.kalender_akademik.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus event ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection
