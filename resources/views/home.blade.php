@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
@php
    use App\Models\HeroImage;
    $heroImages = HeroImage::where('active', true)->orderBy('order')->take(3)->get();
@endphp

<section 
    x-data="{
        activeSlide: 0,
        slides: {{ $heroImages->count() }},
        init() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides;
            }, 6000);
        }
    }"
    class="relative min-h-[80vh] overflow-hidden bg-gray-900"
>
    @foreach($heroImages as $index => $image)
        <div
            x-show="activeSlide === {{ $index }}"
            x-transition:enter="transition ease-out duration-1000 transform"
            x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ $image->image_url }}')"
        >
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/30 to-black/60 flex flex-col justify-center items-center text-center px-4 py-8">
                <div class="backdrop-blur-sm bg-white/10 rounded-2xl p-6 max-w-4xl">
                    <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 tracking-tight drop-shadow-xl leading-tight">
                        Selamat Datang di <br> MTs Muhammadiyah 1 Natar
                    </h1>
                    <p class="text-gray-100 text-lg sm:text-xl max-w-2xl mb-6 font-light drop-shadow-md">
                        Membangun Generasi Unggul dengan Pendidikan Berkualitas dan Nilai Islami
                    </p>
                    <a href="#tentang-kami" class="inline-block bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</section>

@once
    @push('scripts')
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
@endonce

{{-- TENTANG SEKOLAH --}}
<section id="tentang-kami" class="py-12 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl font-bold mb-4 text-gray-900 tracking-tight">Tentang Kami</h2>
                <p class="text-base text-gray-600 leading-relaxed mb-6">
                    MTs Muhammadiyah 1 Natar adalah sekolah Islam tingkat menengah yang mengutamakan pendidikan akademik, pembentukan karakter, dan penguatan keimanan dalam suasana belajar yang disiplin dan bermakna.
                </p>

                @php
                    $tentang = [
                        ['icon' => 'M12 20h9 M12 4h9 M3 6h18M3 18h18M3 6v12M12 4v16', 'judul' => 'Kurikulum Modern', 'desc' => 'Mengikuti perkembangan ilmu pengetahuan dan teknologi terkini.'],
                        ['icon' => 'M8 21h8 M12 17v4 M7 9v4h10V9 M10 4h4v5H10z', 'judul' => 'Prestasi', 'desc' => 'Siswa kami aktif meraih prestasi tingkat provinsi dan nasional.'],
                        ['icon' => 'M12 5v14 M3 7h18 M3 17h18 M3 7v10 M21 7v10', 'judul' => 'Fasilitas Lengkap', 'desc' => 'Ruang kelas nyaman, laboratorium, perpustakaan, dan fasilitas olahraga.']
                    ];
                @endphp

                <div class="grid sm:grid-cols-2 gap-4 mt-4">
                    @foreach($tentang as $item)
                        <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="{{ $item['icon'] }}" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $item['judul'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-1/2 max-w-md">
                <img src="{{ asset('img/gerbangsekolah.jpg') }}" alt="Gerbang Sekolah"
                     class="w-full rounded-2xl shadow-lg object-cover transform hover:scale-105 transition-transform duration-300">
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="py-12 bg-fixed bg-center bg-cover relative" style="background-image: url('{{ asset('img/visimisi.jpg') }}')">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative container mx-auto px-4 max-w-6xl text-white">
        <h2 class="text-3xl font-bold mb-8 text-center tracking-tight drop-shadow-lg">Visi dan Misi Sekolah</h2>
        <div class="flex flex-col md:flex-row gap-6">
            {{-- VISI --}}
            <div class="flex-1 bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                <h3 class="text-xl font-bold text-green-300 mb-4">Visi Sekolah</h3>
                <p class="leading-relaxed font-medium italic text-base">“Terwujudnya madrasah yang Islami, populis, dan berkualitas”</p>
            </div>

            {{-- MISI --}}
            <div 
                x-data="{ open: false }"
                class="flex-1 bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]"
            >
                <h3 class="text-xl font-bold text-green-300 mb-4 flex justify-between items-center cursor-pointer md:cursor-auto" @click="open = !open">
                    Misi Sekolah
                    <button class="md:hidden bg-green-300 text-black rounded-full w-8 h-8 flex items-center justify-center" aria-label="Toggle Misi" type="button">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                </h3>
                <ul class="list-disc list-inside space-y-2 text-base font-medium md:block transition-all duration-500 ease-in-out"
                    :class="{'max-h-0 opacity-0': !open, 'max-h-[1000px] opacity-100': open}"
                >
                    <li>Menerapkan nilai ajaran agama Islam untuk menumbuhkan keimanan dan ketaqwaan.</li>
                    <li>Menanamkan nilai agama dalam kehidupan sehari-hari.</li>
                    <li>Ekstrakurikuler untuk pengembangan bakat dan minat.</li>
                    <li>Pembelajaran berbasis masyarakat untuk kepedulian sosial.</li>
                    <li>Pembelajaran profesional untuk menggali potensi siswa.</li>
                    <li>Bimbingan efektif dan optimal.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-900 tracking-tight">Berita Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($beritas as $berita)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl overflow-hidden transition-all duration-300 hover:scale-[1.02] flex flex-col">
                    <div class="relative w-full h-48 overflow-hidden rounded-t-2xl">
                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                             alt="{{ $berita->judul }}"
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900 hover:text-green-600 transition-colors">
                            <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm flex-grow">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                        <p class="text-xs text-gray-500 mt-3">{{ $berita->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 text-lg">Belum ada berita tersedia.</p>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('berita.index') }}" class="inline-block bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                Lihat Berita Selengkapnya
            </a>
        </div>
    </div>
</section>

{{-- PRESTASI --}}
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-900 tracking-tight drop-shadow-md">Prestasi Terbaru</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach($prestasis->take(4) as $prestasi)
                <div class="w-full sm:w-[48%] lg:w-[23%] bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:scale-[1.02] flex flex-col p-4">
                    <a href="{{ route('prestasi.show', $prestasi->slug) }}" class="block w-full h-36 overflow-hidden rounded-xl mb-3 bg-gray-100">
                        <img src="{{ $prestasi->gambar ? asset('storage/' . $prestasi->gambar) : 'https://via.placeholder.com/320x180?text=No+Image' }}"
                             alt="Gambar Prestasi {{ $prestasi->judul }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 rounded-xl">
                    </a>
                    <h3 class="text-lg font-semibold mb-2 truncate text-gray-900">
                        <a href="{{ route('prestasi.show', $prestasi->slug) }}" class="hover:text-green-600">
                            {{ $prestasi->judul }}
                        </a>
                    </h3>
                    <p class="text-sm text-green-700 mb-2 truncate font-medium">Nama Siswa: {{ $prestasi->nama_siswa }}</p>
                    <p class="text-sm text-gray-600 mb-3 flex-grow">{{ Str::limit($prestasi->isi, 90) }}</p>
                    <p class="text-xs text-gray-500 mt-auto">{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('prestasi.index') }}" class="inline-block bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                Lihat Semua Prestasi
            </a>
        </div>
    </div>
</section>

@endsection