<section id="Home" class="relative h-screen overflow-hidden text-white">
    <!-- Swiper Background -->
    <div class="absolute inset-0 z-0">
        <div class="swiper-container bg-swiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-full bg-cover bg-center"
                    style="background-image: url('{{ asset('assets/img/masjidselfa1.jpg') }}')"></div>
                <div class="swiper-slide h-full bg-cover bg-center"
                    style="background-image: url('{{ asset('assets/img/masjidselfa2.jpg') }}')"></div>
            </div>
        </div>

        <!-- Overlay gelap -->
        <div class="absolute inset-0 z-10 bg-black/60"></div>
    </div>

    <!-- Konten di atas slider -->
    <div class="relative z-20 flex h-full items-center">
        <div class="container mx-auto px-4 text-center">
            <div class="mx-auto max-w-2xl">
                <h1 class="mb-4 text-4xl font-bold md:text-5xl">
                    Selamat Datang di Ponpes Selfa
                </h1>
                <p class="mb-6 text-xl">
                    Membentuk generasi Qur'ani yang berakhlak mulia, berwawasan luas, dan
                    mandiri.
                </p>
                <div class="flex flex-col items-center justify-center gap-3 md:flex-row md:gap-6">
                    <a href="#About"
                        class="rounded-full bg-white px-5 py-2 text-sm font-semibold text-green-700 shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:bg-gray-100 md:px-6 md:py-3 md:text-base">
                        Jelajahi Lebih
                    </a>
                    <a href="pendaftaran"
                        class="rounded-full border-2 border-white px-5 py-2 text-sm font-semibold text-white transition-all duration-300 ease-in-out hover:scale-105 hover:bg-white hover:text-green-600 md:px-6 md:py-3 md:text-base">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
