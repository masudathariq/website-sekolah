@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-4xl">

    <h1 class="text-xl sm:text-2xl font-bold mb-4 text-center text-gray-800 dark:text-gray-100">
        Jadwal Pelajaran Kelas {{ $kelas->tingkatan }} {{ $kelas->nama }}
    </h1>

    @if ($jadwals->count() > 0)
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <!-- Mobile View: Card-based Layout -->
        <div class="block md:hidden">
            @foreach ($jadwals->groupBy('hari') as $hari => $list)
                <div class="mb-4">
                    <h2 class="text-lg font-semibold bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-300 py-2 px-4 rounded-t-lg">
                        {{ ucfirst($hari) }}
                    </h2>
                    @foreach ($list as $jadwal)
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                    {{ $jadwal->mata_pelajaran }}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500">
                                    Guru: {{ $jadwal->guru->nama ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <!-- Desktop View: Table Layout -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-yellow-100 dark:bg-yellow-900/50 text-left text-gray-800 dark:text-gray-200">
                        <th class="p-3 border border-gray-200 dark:border-gray-700">Hari</th>
                        <th class="p-3 border border-gray-200 dark:border-gray-700">Jam</th>
                        <th class="p-3 border border-gray-200 dark:border-gray-700">Mata Pelajaran</th>
                        <th class="p-3 border border-gray-200 dark:border-gray-700">Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals->groupBy('hari') as $hari => $list)
                        <tr class="bg-gray-50 dark:bg-gray-700 font-semibold">
                            <td colspan="4" class="p-3 border border-gray-200 dark:border-gray-700 text-yellow-700 dark:text-yellow-300">
                                {{ ucfirst($hari) }}
                            </td>
                        </tr>
                        @foreach ($list as $jadwal)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $jadwal->hari }}</td>
                            <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                            <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $jadwal->mata_pelajaran }}</td>
                            <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $jadwal->guru->nama ?? '-' }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <p class="text-center text-gray-600 dark:text-gray-400 mt-6 text-sm">
            Belum ada jadwal pelajaran untuk kelas ini.
        </p>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('jadwal.index') }}" class="inline-block text-sm text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 hover:underline transition-colors">
            ← Kembali ke daftar kelas
        </a>
    </div>

</div>
@endsection