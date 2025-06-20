@extends('layouts.app')

@section('body-class', 'page-home') {{-- Class unik untuk halaman home --}}

@section('content')
<div class="floating-container right-5 bottom-20 mb-10 md:bottom-5 md:right-5 md:mb-0">
    <a href="#kontak" class="floating-content group">
        <div
            class="flex items-center gap-2 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 px-4 py-2 text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div
                class="floating-icon flex h-7 w-7 items-center justify-center rounded-full bg-white text-lg text-blue-500 transition-transform group-hover:rotate-12">
                <i class="fas fa-headset"></i>
            </div>
            <span class="floating-text hidden whitespace-nowrap text-sm font-medium sm:block">
                Butuh Bantuan? Hubungi Kami...
            </span>
        </div>
    </a>
</div>

<!-- Header Section -->
@include('partials.sections.header')

<!-- About Section -->
<section id="About" class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center md:flex-row">
            <div class="mb-8 md:mb-0 md:w-1/2 md:pr-8" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset('storage/' . $about->image_1) }}" alt="Tentang Ponpes Selfa"
                    class="mx-auto rounded-lg" style="width: 360px" />
            </div>
            <div class="md:w-1/2">
                <h3 class="title-section mb-4 font-bold text-gray-800" data-aos="fade-left" data-aos-delay="200">
                    {{ $about->title_section }}
                </h3>
                <h4 class="sub-title-section mb-4 font-semibold" data-aos="fade-left" data-aos-delay="300">
                    {{ $about->sub_title }}
                </h4>
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

        <h1 class="title-section mb-8 font-bold uppercase text-gray-800" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="500">
            {{ $section->title }}
        </h1>
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
            {{-- Akses judul & subtitle untuk 'program' dari variabel $sections --}}
            @if (isset($sections['program']))
            <h1 class="title-section mb-4 text-3xl font-bold text-gray-800" ...>
                {{ $sections['program']->title }}
            </h1>
            <p class="mb-5 text-xl text-gray-600" ...>
                {{ $sections['program']->subtitle }}
            </p>
            <div class="mx-auto h-1 w-20 garis-judul"></div>
            @endif
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
            <h1 class="title-section mb-4 font-bold text-gray-800" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500">
                Galeri Kegiatan
            </h1>
            <div class="mx-auto h-1 w-20 garis-judul"></div>
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
            @if (isset($sections['Team_yayasan']))
            <h1 class="title-section mb-4 font-bold text-gray-800" ...>
                {{ $sections['Team_yayasan']->title }}
            </h1>
            <p class="mb-5 text-gray-600" ...>
                {{ $sections['Team_yayasan']->subtitle }}
            </p>
            <div class="mx-auto h-1 w-20 garis-judul"></div>
            @endif
        </div>

        <div class="grid grid-cols-2 justify-center gap-8 md:flex md:flex-wrap md:justify-center">
            @foreach ($teams as $team)
            <div
                class="flex min-h-[300px] w-full max-w-xs flex-col justify-between rounded-xl bg-white p-6 text-center shadow-md transition hover:shadow-lg">
                <div>
                    <div class="mx-auto mb-4 h-32 w-32 overflow-hidden border-4 border-green-100">
                        <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                            class="h-full w-full object-cover" />
                    </div>
                    <h3 class="mb-1 truncate font-semibold text-green-500">
                        {{ $team->name }}
                    </h3>
                    <p class="mb-3 line-clamp-2text-blue-600">
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
<section class="bg-primaryHome py-16 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
            <div>
                <div class="mb-2 text-3xl font-bold" data-toggle="counter-up" data-count="2023">
                    0
                </div>
                <p class="">Tahun Berdiri</p>
            </div>
            <div>
                <div class="mb-2 text-3xl font-bold" data-toggle="counter-up" data-count="{{ $totalSantri + 11 }}">
                    0
                </div>
                <p class="">Santri</p>
            </div>
            <div>
                <div class="mb-2 text-3xl font-bold" data-toggle="counter-up" data-count="8">
                    0
                </div>
                <p class="">Pengajar</p>
            </div>
            <div>
                <div class="mb-2 text-3xl font-bold" data-toggle="counter-up" data-count="{{ $totalLembaga }}">
                    0
                </div>
                <p class="">Cabang Yayasan</p>
            </div>
        </div>
    </div>
</section>

<!-- Partner Institutions Section -->
<section id="partner" class="py-20">
    <div class="container mx-auto px-4">

        {{-- Grid untuk Logo Partner --}}
        <div class="grid max-w-screen-xl grid-cols-2 gap-8 sm:gap-12 md:grid-cols-3 lg:grid-cols-5 mx-auto"
            data-aos="fade-up" data-aos-delay="200">

            @foreach ($lembagas as $lembaga)
            {{-- PERUBAHAN UTAMA ADA DI BARIS DI BAWAH INI --}}
            <div class="flex items-center justify-center p-4 bg-white border rounded-md
            shadow-lg shadow-primary/40
            transition-all duration-300 ease-in-out
            hover:shadow-xl hover:shadow-secondary/40 hover:-translate-y-2">
                <img src="{{ $lembaga->logo ? asset('storage/' . $lembaga->logo) : asset('images/default-logo.png') }}"
                    alt="{{ $lembaga->nama_lembaga }}" class="h-20 w-auto object-contain" />
            </div>
            @endforeach

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

            <h1 class="mb-1 title-section font-bold">
                {{ $section->title }}
            </h1>
            <h3 class="mb-4 font-semibold text-blue-500">
                {{ $section->subtitle }}
            </h3>
            <div class="mx-auto h-1 w-20 garis-judul"></div>
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
                        <div class="mb-1 text-gray-500">
                            {{ $blog->created_at->format('d M Y') }}
                        </div>
                        <h1 class="mb-1 font-semibold text-gray-800">
                            {{ $blog->title }}
                        </h1>
                        <p class="mb-2 text-gray-600">
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
            <a href="#" class="btn btn-outline-light">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
@include('partials.sections.contact')

<!-- Register Section -->
<section id="daftar" class="bg-primaryHome py-16 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="mb-6 font-bold">Daftarkan Putra/Putri Anda Sekarang</h2>
        <p class="mx-auto mb-8 max-w-2xl">
            Bergabunglah dengan Ponpes Selfa, Bersama Ponpes Selfa, kami membina jiwa berilmu
            dan beramal, untuk Islam dan kemaslahatan masyarakat..
        </p>
        <a href="pendaftaran" class="btn btn-outline-dark">
            Daftar Sekarang
        </a>
    </div>
</section>


@push('scripts')
<script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init()
</script>
@endsection
