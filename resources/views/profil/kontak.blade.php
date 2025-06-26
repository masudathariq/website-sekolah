@extends('layouts.app')

@section('title', 'Kontak - MTs Muhammadiyah 1 Natar')

@section('content')
<section 
    class="py-16 sm:py-20 min-h-screen bg-cover bg-center relative"
    style="background-image: url('{{ asset('img/gerbangsekolah.jpg') }}');"
>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <div class="container mx-auto px-4 sm:px-6 max-w-7xl relative z-10 text-white">
        <h1 class="text-3xl sm:text-4xl font-bold mb-10 text-center drop-shadow-lg">Kontak Kami</h1>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Info Kontak -->
            <div class="w-full lg:w-1/2 bg-black bg-opacity-60 rounded-xl shadow-md p-6 sm:p-8 text-sm sm:text-base">
                <h2 class="text-xl sm:text-2xl font-semibold text-green-400 mb-5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 18v.01" />
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                    Informasi Kontak
                </h2>

                <div class="space-y-5 text-gray-100">
                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="map-pin" />
                            Alamat
                        </h3>
                        <p>Jl. K.H Ahmad Dahlan, Muara Putih, Kec. Natar, Kab. Lampung Selatan, Lampung</p>
                    </div>

                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="phone" />
                            Whatsapp
                        </h3>
                        <a href="https://wa.me/6288287570334" target="_blank" class="text-green-400 hover:underline break-words">0882-8757-0334</a>
                    </div>

                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="instagram" />
                            Instagram
                        </h3>
                        <a href="https://instagram.com/mtsmusata_official" target="_blank" class="text-green-400 hover:underline">@mtsmusata_official</a>
                    </div>

                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="facebook" />
                            Facebook
                        </h3>
                        <a href="https://facebook.com/MTsMuhammadiyah1Natar" target="_blank" class="text-green-400 hover:underline">MTs Muhammadiyah 1 Natar</a>
                    </div>

                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="mail" />
                            Email
                        </h3>
                        <a href="mailto:mtsmuhammadiyah1natar@gmail.com" class="text-green-400 hover:underline block">mtsmuhammadiyah1natar@gmail.com</a>
                        <a href="mailto:mtsmuhammadiyahnatar@gmail.com" class="text-green-400 hover:underline block">mtsmuhammadiyahnatar@gmail.com</a>
                    </div>

                    <div>
                        <h3 class="font-medium flex items-center gap-2 mb-1">
                            <x-icon name="clock" />
                            Jam Operasional
                        </h3>
                        <p>07.00 - 14.00 WIB</p>
                    </div>
                </div>
            </div>

            <!-- Peta Lokasi -->
            <div class="w-full lg:w-1/2 rounded-xl overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126904.61958889551!2d105.1932112284224!3d-5.346994556488419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40e0bbcbfae2df%3A0x86fa5a09f8f5b93b!2sMTs%20Muhammadiyah%201%20Natar!5e0!3m2!1sid!2sid!4v1685824232749!5m2!1sid!2sid"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi MTs Muhammadiyah 1 Natar"
                ></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
