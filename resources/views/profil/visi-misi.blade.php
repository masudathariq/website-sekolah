@extends('layouts.app')

@section('title', 'Visi dan Misi - MTs Muhammadiyah 1 Natar')

@section('content')
<section class="py-20 bg-cover bg-center" style="background-image: url('{{ asset('img/gerbangsekolah.jpg') }}');">
    <div class="mx-4 md:mx-auto px-6 py-16 max-w-7xl rounded-xl bg-white/50 backdrop-blur-md shadow-lg">
        <div class="text-center mb-12">
            <h1 class="text-2xl lg:text-4xl font-extrabold text-gray-900 mb-2 drop-shadow">
                Visi dan Misi
            </h1>
            <p class="text-base lg:text-lg text-gray-700 font-medium">
                MTs Muhammadiyah 1 Natar
            </p>
        </div>

        <div class="flex flex-col-reverse lg:flex-row items-center gap-8 lg:gap-12">
            <!-- Konten Teks -->
            <div class="w-full lg:w-1/2">
                <div class="mb-8 lg:mb-10">
                    <h2 class="text-xl lg:text-3xl font-bold text-yellow-600 mb-3 lg:mb-4">
                        Visi
                    </h2>
                    <p class="text-base lg:text-lg font-semibold italic text-gray-800">
                        “Terwujudnya madrasah yang Islami, populis, dan berkualitas”
                    </p>
                </div>
                <div>
                    <h2 class="text-xl lg:text-3xl font-bold text-yellow-600 mb-3 lg:mb-4">
                        Misi
                    </h2>
                    <ul class="list-disc pl-5 space-y-2 lg:space-y-3 text-gray-700 leading-relaxed text-sm lg:text-base">
                        <li>Menerapkan nilai ajaran agama Islam untuk menumbuhkan keimanan dan ketaqwaan.</li>
                        <li>Menanamkan nilai ajaran Islam dalam kehidupan sehari-hari.</li>
                        <li>Melaksanakan ekstrakurikuler untuk bakat dan minat siswa.</li>
                        <li>Mengembangkan kepedulian sosial melalui pembelajaran bermasyarakat.</li>
                        <li>Melaksanakan pembelajaran profesional untuk menumbuhkan potensi siswa.</li>
                        <li>Melaksanakan program bimbingan yang efektif dan optimal.</li>
                    </ul>
                </div>
            </div>

            <!-- Ilustrasi -->
            <div class="w-full lg:w-1/2">
                <img src="{{ asset('img/visi-misi.svg') }}" alt="Ilustrasi Visi dan Misi" class="w-3/4 lg:w-full max-w-md mx-auto rounded-xl shadow-md">
            </div>
        </div>
    </div>
</section>
@endsection
