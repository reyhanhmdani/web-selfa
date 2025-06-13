@extends('layouts.app')

@section('content')

<!-- Floating Register Button -->
<div class="floating-container right-5 top-5 md:bottom-5 md:right-5 md:top-auto">
    <a href="#kontak" class="floating-content group">
        <div
            class="flex items-center gap-2 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 px-4 py-2 text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div
                class="floating-icon flex h-9 w-9 items-center justify-center rounded-full bg-white text-lg text-blue-500 transition-transform group-hover:rotate-12">
                <i class="fas fa-headset"></i>
            </div>
            <span class="floating-text hidden whitespace-nowrap text-sm font-medium sm:block">
                Butuh Bantuan? Hubungi Kami...
            </span>
        </div>
    </a>
</div>

<!-- Header Section -->
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

<!-- About Section -->
<section id="About" class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center md:flex-row">
            <div class="mb-8 md:mb-0 md:w-1/2 md:pr-8" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset('storage/' . $about->image_1) }}" alt="Tentang Ponpes Selfa"
                    class="mx-auto rounded-lg" style="width: 360px" />
            </div>
            <div class="md:w-1/2">
                <h2 class="title-section mb-4 text-3xl font-bold text-gray-800" data-aos="fade-left"
                    data-aos-delay="200">
                    {{ $about->title_section }}
                </h2>
                <h3 class="sub-title-section mb-4 text-2xl font-semibold" data-aos="fade-left" data-aos-delay="300">
                    {{ $about->sub_title }}
                </h3>
                <p class="mb-4 text-gray-600" data-aos="fade-left" data-aos-delay="400">
                    {!! nl2br(e($about->description)) !!}
                </p>

                <div class="grid grid-cols-2 gap-4" data-aos="fade-down" data-aos-delay="400">
                    <!-- Pendidikan Agama -->
                    <div class="rounded-lg bg-green-50 p-4">
                        <div class="mb-2 text-2xl text-green-600">
                            <i class="fas fa-mosque"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800">Pendidikan Agama</h4>
                        <p class="text-sm text-gray-600">Kurikulum agama yang komprehensif</p>
                    </div>

                    <!-- Santri Pelayan Masyarakat -->
                    <div class="rounded-lg bg-green-50 p-4">
                        <div class="mb-2 text-2xl text-green-600">
                            <i class="fas fa-hands-helping"></i>
                            <!-- Ikon lebih cocok -->
                        </div>
                        <h4 class="font-semibold text-gray-800">Santri Pelayan Masyarakat</h4>
                        <p class="text-sm text-gray-600">
                            Membentuk jiwa sosial dan pengabdian
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-4 text-center">
        @php
        $section = sectionHeader('visi&misi');
        @endphp

        <h2 class="title-section mb-8 text-3xl font-bold uppercase text-gray-800" data-aos="fade-up"
            data-aos-delay="200" data-aos-duration="500">
            {{ $section->title }}
        </h2>
        <a href="{{ asset('assets/img/visi-misi.jpg') }}" target="_blank" class="group inline-block">
            <div
                class="animate-fade-in-up mx-auto w-4/5 max-w-xs transition-transform duration-300 group-hover:scale-105 md:max-w-sm lg:max-w-md">
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl" data-aos="zoom-in"
                    data-aos-delay="500">
                    <img src="{{ asset('storage/' . $visiMisi->image) }}" alt="Visi dan Misi Pondok"
                        class="w-full object-cover" />
                </div>
            </div>
        </a>
    </div>
</section>

<!-- Program Section -->
<section id="Program" class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            @php
            $section = sectionHeader('program');
            @endphp

            <h2 class="title-section mb-4 text-3xl font-bold text-gray-800" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">
                {{ $section->title }}
            </h2>
            <p class="mb-5 text-xl text-gray-600" data-aos="fade-down" data-aos-delay="200">
                {{ $section->subtitle }}
            </p>
            <div class="mx-auto h-1 w-20 bg-blue-500"></div>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($programs as $program)
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="flip-left" data-aos-delay="200"
                data-aos-duration="500">
                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}"
                    class="absolute inset-0 z-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <div
                    class="relative z-10 flex h-full flex-col items-center justify-center bg-white bg-opacity-90 p-6 text-center transition duration-500 group-hover:bg-black/70">
                    <img src="{{ asset('storage/' . $program->icon) }}" alt="" class="mb-4 h-16" />
                    <h3 class="mb-3 text-xl font-semibold text-gray-800 group-hover:text-white">
                        {{ $program->title }}
                    </h3>
                    <p class="text-sm text-gray-600 group-hover:text-gray-200">
                        {{ $program->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            <h2 class="title-section mb-4 text-3xl font-bold text-gray-800" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">
                Galeri Kegiatan
            </h2>
            <div class="mx-auto h-1 w-20 bg-blue-500"></div>
        </div>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach ($galeriFoto as $foto)
            <div class="overflow-hidden rounded-lg shadow-md transition hover:shadow-xl" data-aos="zoom-out"
                data-aos-delay="200" data-aos-duration="500">
                <a href="{{ Storage::url($foto->image) }}" data-lightbox="galeri">
                    <img src="{{ Storage::url($foto->image) }}" alt="Galeri Foto"
                        class="h-48 w-full object-cover transition duration-500 hover:scale-105" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            @php
            $section = sectionHeader('team');
            @endphp

            <h2 class="title-section mb-4 text-3xl font-bold text-gray-800" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">
                {{ $section->title }}
            </h2>
            <div class="mx-auto h-1 w-20 bg-blue-500"></div>
        </div>

        <div class="grid grid-cols-2 justify-center gap-8 md:flex md:flex-wrap md:justify-center">
            @foreach ($teams as $team)
            <div
                class="flex min-h-[300px] w-full max-w-xs flex-col justify-between rounded-xl bg-white p-6 text-center shadow-md transition hover:shadow-lg">
                <div>
                    <div class="mx-auto mb-4 h-32 w-32 overflow-hidden border-4 rounded-full">
                        <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                            class="h-full w-full object-cover" />
                    </div>
                    <h3 class="mb-1 truncate text-base font-semibold text-green-500 sm:text-lg md:text-xl">
                        {{ $team->name }}
                    </h3>
                    <p class="mb-3 line-clamp-2 text-sm text-blue-600 sm:text-base">
                        {{ $team->position }}
                    </p>
                </div>
                <div class="mt-4 flex justify-center space-x-3 text-lg sm:text-xl md:text-2xl">
                    @if ($team->facebook)
                    <a href="{{ $team->facebook }}" target="_blank"
                        class="text-gray-400 transition hover:text-green-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif

                    @if ($team->instagram)
                    <a href="{{ $team->instagram }}" target="_blank"
                        class="text-gray-400 transition hover:text-green-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif

                    @if ($team->twitter)
                    <a href="{{ $team->twitter }}" target="_blank"
                        class="text-gray-400 transition hover:text-green-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-green-600 py-16 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
            <div>
                <div class="mb-2 text-4xl font-bold" data-toggle="counter-up" data-count="2023">
                    0
                </div>
                <div class="text-lg">Tahun Berdiri</div>
            </div>
            <div>
                <div class="mb-2 text-4xl font-bold" data-toggle="counter-up" data-count="{{ $totalSantri + 11 }}">
                    0
                </div>
                <div class="text-lg">Santri</div>
            </div>
            <div>
                <div class="mb-2 text-4xl font-bold" data-toggle="counter-up" data-count="8">
                    0
                </div>
                <div class="text-lg">Pengajar</div>
            </div>
            <div>
                <div class="mb-2 text-4xl font-bold" data-toggle="counter-up" data-count="{{ $totalLembaga }}">
                    0
                </div>
                <div class="text-lg">Lembaga Yayasan</div>
            </div>
        </div>
    </div>
</section>

<!-- Partner Institutions Section -->
<section id="lembaga" class="overflow-x-hidden bg-gray-100 py-20">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            <h2 class="title-section mb-4 text-3xl font-bold" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">Partner Pondok</h2>
            <div class="mx-auto h-1 w-20 bg-blue-500"></div>
        </div>

        <div class="relative px-4 sm:px-10 md:px-20">
            <div class="swiper lembaga-slider">
                <div class="swiper-wrapper">
                    @foreach ($lembagas as $lembaga)
                    <div
                        class="swiper-slide flex flex-col items-center justify-center py-12 text-center transition-all duration-300">
                        <img src="{{ $lembaga->logo ? asset('storage/' . $lembaga->logo) : asset('images/default-logo.png') }}"
                            alt="{{ $lembaga->nama_lembaga }}"
                            class="lembaga-logo mx-auto h-24 w-auto object-contain transition-all duration-300" />
                        <h5 class="mt-2 text-sm font-semibold uppercase tracking-wide text-gray-800">
                            {{ $lembaga->nama_lembaga }}
                        </h5>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination modern-pagination mt-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="bg-gray py-16">
    <div class="container mx-auto px-4">
        <div class="mb-10 text-center">
            @php
            $section = sectionHeader('blog');
            @endphp

            <h2 class="mb-1 text-2xl title-section sm:text-3xl" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">
                {{ $section->title }}
            </h2>
            <h3 class="mb-4 text-base font-semibold text-blue-500 sm:text-xl" data-aos="fade-down" data-aos-delay="200"
                data-aos-duration="500">
                {{ $section->subtitle }}
            </h3>
            <div class="mx-auto h-1 w-20 bg-green-500"></div>
        </div>

        @if ($blogs->count() > 0)
        @php
        $count = count($blogs);
        $gridCols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';

        if ($count === 1) {
        $gridCols = 'grid-cols-1 sm:grid-cols-1 lg:grid-cols-1';
        } elseif ($count === 2) {
        $gridCols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2';
        } elseif ($count === 3) {
        $gridCols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
        }
        @endphp

        <div class="{{ $gridCols }} grid justify-center gap-6">
            @foreach ($blogs as $blog)
            <div
                class="mx-auto max-w-sm overflow-hidden rounded-lg bg-white shadow transition duration-300 hover:shadow-md">
                <!-- Desktop & Tablet -->
                <div class="hidden sm:block">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Berita"
                            class="h-full w-full object-cover transition-transform duration-300 hover:scale-105" />
                    </div>
                    <div class="p-4">
                        <div class="mb-1 text-xs text-gray-500">
                            {{ $blog->created_at->format('d M Y') }}
                        </div>
                        <h3 class="mb-1 text-sm font-semibold text-gray-800">
                            {{ $blog->title }}
                        </h3>
                        <p class="mb-2 text-sm text-gray-600">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 70, '...') }}
                        </p>
                        <a href="{{ $blog->instagram_link }}" class="text-sm font-medium text-green-600">
                            Selengkapnya →
                        </a>
                    </div>
                </div>

                <!-- Mobile -->
                <div class="flex gap-4 p-4 sm:hidden">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Berita"
                        class="h-24 w-24 flex-shrink-0 rounded-md object-cover" />
                    <div class="flex flex-col justify-between">
                        <div class="text-xs text-gray-500">
                            {{ $blog->created_at->format('d M Y') }}
                        </div>
                        <h3 class="text-sm font-semibold text-gray-800">
                            {{ $blog->title }}
                        </h3>
                        <p class="text-xs text-gray-600">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 60, '...') }}
                        </p>
                        <a href="{{ $blog->instagram_link }}" class="text-xs font-medium text-green-600">
                            Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="mt-10 text-center">
            <a href="#"
                class="inline-block rounded-full bg-green-600 px-6 py-3 font-medium text-white shadow-md transition hover:bg-green-700">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            @php
            $section = sectionHeader('contact');
            @endphp

            <h2 class="mb-4 title-section" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{
                $section->title }}</h2>
            <div class="mx-auto h-1 w-20 bg-blue-500"></div>
        </div>

        <div class="flex flex-col gap-6 md:flex-row md:items-stretch">
            <!-- Kolom Kiri: Hubungi Kami -->
            <div class="md:w-1/2">
                <div class="h-full rounded-xl bg-white p-6 shadow-md">
                    <h3 class="mb-4 text-xl font-semibold">{{ $section->subtitle }}</h3>

                    <!-- Alamat -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1 text-green-600">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Alamat</h4>
                            <p class="text-gray-600">{!! nl2br(e($alamat)) !!}</p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1 text-green-600">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Telepon</h4>
                            <p class="text-gray-600">{!! nl2br(e($telepon)) !!}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1 text-green-600">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-gray-600">{{ $email }}</p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex items-start">
                        <div class="mr-4 mt-1 text-green-600">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Jam Operasional</h4>
                            <p class="text-gray-600">{!! nl2br(e($jam)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Google Maps -->
            <div class="md:w-1/2">
                <div class="h-full rounded-xl bg-white p-6 shadow-md">
                    <h3 class="mb-4 text-xl font-semibold">Lokasi Kami</h3>
                    <div class="relative h-0 w-full overflow-hidden rounded-lg pb-[56%]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1222.7013959293104!2d110.60411067090085!3d-7.692333357861694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a43f01ae7ca55%3A0x3052ee63172a145f!2sMasjid%20Al-Muhajirin!5e0!3m2!1sid!2sid!4v1743005025922!5m2!1sid!2sid"
                            class="absolute left-0 top-0 h-full w-full border-0" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register Section -->
<section id="daftar" class="bg-green-600 py-16 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="mb-6 text-3xl font-bold">Daftarkan Putra/Putri Anda Sekarang</h2>
        <p class="mx-auto mb-8 max-w-2xl text-xl">
            Bergabunglah dengan Ponpes Selfa, Bersama Ponpes Selfa, kami membina jiwa berilmu
            dan beramal, untuk Islam dan kemaslahatan masyarakat..
        </p>
        <a href="pendaftaran"
            class="inline-block rounded-full bg-white px-8 py-4 text-lg font-bold text-green-600 shadow-lg transition hover:bg-gray-100">
            Daftar Sekarang
        </a>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init()
</script>
@endpush
