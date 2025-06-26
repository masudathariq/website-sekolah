@extends('layouts.app')

@section('title', 'Tentang Kami - MTs Muhammadiyah 1 Natar')

@section('content')
<section class="py-16 min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/gerbangsekolah.jpg') }}')">
    <div class="container mx-auto px-4 sm:px-6 max-w-5xl">
        <h1 class="text-2xl md:text-4xl font-bold text-white mb-8 text-center drop-shadow-md">
            Tentang Kami
        </h1>

        <article class="bg-white bg-opacity-95 rounded-2xl shadow-lg p-6 md:p-8 text-gray-700 text-sm md:text-base leading-relaxed relative md:pr-48">
            <!-- Foto di kanan atas (desktop) -->
            <div class="hidden md:block absolute top-8 right-8 w-20 md:w-24 rounded-lg shadow-lg overflow-hidden
                        transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('img/kepala.png') }}" alt="Foto Kepala Madrasah" class="w-full h-auto object-cover" />
            </div>

            <!-- Konten teks -->
            <p>
                Assalamu’alaikum Warahmatullahi Wabarakatuh,<br><br>
                Puji syukur ke hadirat Allah SWT atas rahmat-Nya, MTs Muhammadiyah 1 Natar terus berkembang menjadi lembaga pendidikan unggul. Pendidikan bagi kami bukan hanya transfer ilmu, tetapi juga pembentukan karakter dan akhlak mulia.
            </p>

            <p class="mt-4">
                Saya bangga atas dedikasi guru, staf, dan siswa dalam menuntut ilmu. Kami berkomitmen menyediakan pendidikan berkualitas dengan nilai-nilai Islam yang moderat dan rahmatan lil’alamin, melalui program pembelajaran dan ekstrakurikuler yang mendukung siswa menjadi cerdas, kreatif, dan berakhlak mulia.
            </p>

            <p class="mt-4">
                MTs Muhammadiyah 1 Natar berinovasi dengan teknologi dan metode pengajaran modern. Kami mengajak orang tua, masyarakat, dan stakeholder untuk mendukung visi mencetak generasi beriman, berilmu, dan berakhlak mulia.
            </p>

            <p class="mt-4">
                Dengan sinergi, kami berharap terus melahirkan alumni berkualitas, berdaya saing, dan berkontribusi positif bagi masyarakat dan bangsa. Terima kasih atas kepercayaan dan dukungan Anda.
            </p>

            <p class="mt-4">
                Wassalamu’alaikum Warahmatullahi Wabarakatuh.<br><br>
                Kepala Madrasah<br>
                MTs Muhammadiyah 1 Natar<br><br>
                <strong>Imroatun Rofiqoh, S.Pd.</strong>
            </p>

            <!-- Foto di mobile (bawah teks) -->
            <div class="mt-6 block md:hidden w-20 mx-auto rounded-lg shadow-lg overflow-hidden
                        transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('img/kepala.png') }}" alt="Foto Kepala Madrasah" class="w-full h-auto object-cover" />
            </div>
        </article>
    </div>
</section>
@endsection