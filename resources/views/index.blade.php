<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ponpes Selfa - Pendidikan Islam Berkualitas</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-50">
        <!-- Floating Navigation -->
        <nav class="floating-nav floating-nav-mobile md:floating-nav">
            <div class="hidden md:flex items-center">
                @if ($navbar && $navbar->logo)
                    <img
                        src="{{ asset('storage/' . $navbar->logo) }}"
                        alt="Logo"
                        class="h-10 mr-3"
                    />
                @endif

                <a href="#" class="text-2xl font-bold text-green-600">
                    {{ $navbar->title ?? 'Ponpes Selfa' }}
                </a>
            </div>

            <div class="flex items-center space-x-1 md:space-x-4">
                @if ($navbar && is_array($navbar->navigation))
                    @foreach ($navbar->navigation as $nav)
                        @if (($nav['type'] ?? '') === 'dropdown' && isset($nav['children']))
                            <div class="dropdown relative">
                                <button
                                    class="p-2 md:px-4 rounded-full hover:bg-green-50 text-gray-700 hover:text-green-600 transition flex items-center"
                                >
                                    @if (! empty($nav['icon']))
                                        <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
                                    @endif

                                    <span class="hidden md:inline ml-2">
                                        {{ $nav['label'] }}
                                    </span>
                                    <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                                </button>
                                <div
                                    class="dropdown-menu hidden absolute transition-all duration-300"
                                >
                                    @foreach ($nav['children'] as $child)
                                        <a
                                            href="{{ $child['url'] }}"
                                            class="block px-4 py-2 hover:bg-green-50 text-gray-700 transition {{ ($child['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }}"
                                            {{ ($child['type'] ?? '') === 'external' ? 'target=_blank' : '' }}
                                        >
                                            @if (! empty($child['icon']))
                                                <i
                                                    class="fa-solid fa-{{ $child['icon'] }} mr-2"
                                                ></i>
                                            @endif

                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @elseif ($nav['button'] ?? false)
                            {{-- Tombol Daftar ditampilkan di luar navbar-nav --}}
                        @else
                            <a
                                href="{{ $nav['url'] }}"
                                class="p-2 md:px-4 rounded-full hover:bg-green-50 text-gray-700 hover:text-green-600 transition {{ ($nav['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }} {{ request()->is(trim($nav['url'], '/')) ? 'text-green-600 font-semibold' : '' }}"
                                {{ ($nav['type'] ?? '') === 'external' ? 'target=_blank' : '' }}
                            >
                                @if (! empty($nav['icon']))
                                    <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
                                @endif

                                <span class="hidden md:inline ml-2">
                                    {{ $nav['label'] }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>

            @if ($navbar && is_array($navbar->navigation))
                @foreach ($navbar->navigation as $nav)
                    @if ($nav['button'] ?? false)
                        <a
                            href="{{ $nav['url'] }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full transition shadow-md {{ ($nav['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }}"
                            {{ ($nav['type'] ?? '') === 'external' ? 'target=_blank' : '' }}
                        >
                            {{ $nav['label'] }}
                        </a>
                    @endif
                @endforeach
            @endif
        </nav>

        <!-- Floating Register Button -->
        <a
            href="#daftar"
            class="floating-btn bg-green-600 hover:bg-green-700 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110"
        >
            <i class="fas fa-user-plus"></i>
        </a>

        <!-- Header Section -->
        <!-- Section Home dengan Background Slider -->
        <section id="home" class="relative h-screen text-white overflow-hidden">
            <!-- Swiper Background -->
            <div class="absolute inset-0 z-0">
                <div class="swiper-container bg-swiper h-full">
                    <div class="swiper-wrapper">
                        <div
                            class="swiper-slide bg-cover bg-center h-full"
                            style="
                                background-image: url('{{ asset('assets/img/masjidselfa1.jpg') }}');
                            "
                        ></div>
                        <div
                            class="swiper-slide bg-cover bg-center h-full"
                            style="
                                background-image: url('{{ asset('assets/img/masjidselfa2.jpg') }}');
                            "
                        ></div>
                    </div>
                </div>

                <!-- Overlay gelap -->
                <div class="absolute inset-0 bg-black/60 z-10"></div>
            </div>

            <!-- Konten di atas slider -->
            <div class="relative z-20 h-full flex items-center">
                <div class="container mx-auto px-4 text-center md:text-left">
                    <div class="md:w-1/2">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4">
                            Selamat Datang di Ponpes Selfa
                        </h1>
                        <p class="text-xl mb-6">
                            Membentuk generasi Qur'ani yang berakhlak mulia, berwawasan luas, dan
                            mandiri.
                        </p>
                        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                            <a
                                href="#about"
                                class="bg-white text-green-700 px-6 py-3 rounded-full font-medium hover:bg-gray-100 transition shadow-md"
                            >
                                Jelajahi Lebih
                            </a>
                            <a
                                href="#daftar"
                                class="border-2 border-white text-white px-6 py-3 rounded-full font-medium hover:bg-white hover:text-green-600 transition"
                            >
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                        <img
                            src="{{ asset('storage/' . $about->image_1) }}"
                            alt="Tentang Ponpes Selfa"
                            class="rounded-lg mx-auto"
                            style="width: 360px"
                        />
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4 title-section">
                            {{ $about->title_section }}
                        </h2>
                        <h3 class="text-2xl font-semibold mb-4 sub-title-section">
                            {{ $about->sub_title }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {!! nl2br(e($about->description)) !!}
                        </p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-green-50 p-4 rounded-lg">
                                <div class="text-green-600 text-2xl mb-2">
                                    <i class="fas fa-mosque"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800">Pendidikan Agama</h4>
                                <p class="text-gray-600 text-sm">
                                    Kurikulum agama yang komprehensif
                                </p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg">
                                <div class="text-green-600 text-2xl mb-2">
                                    <i class="fas fa-book"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800">Pendidikan Umum</h4>
                                <p class="text-gray-600 text-sm">
                                    Kurikulum nasional yang berkualitas
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Program Section -->
        <section id="program" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    @php
                        $section = sectionHeader('program');
                    @endphp

                    <h2 class="text-3xl font-bold text-gray-800 mb-4 title-section">
                        {{ $section->title }}
                    </h2>
                    <p class="text-xl text-gray-600 mb-5">
                        {{ $section->subtitle }}
                    </p>
                    <div class="w-20 h-1 bg-blue-500 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($programs as $program)
                        <div class="relative group rounded-xl overflow-hidden shadow-lg">
                            <img
                                src="{{ asset('storage/' . $program->image) }}"
                                alt="{{ $program->title }}"
                                class="absolute inset-0 w-full h-full object-cover z-0 transition duration-500 group-hover:scale-105"
                            />
                            <div
                                class="relative z-10 h-full bg-white bg-opacity-90 group-hover:bg-black/70 transition duration-500 flex flex-col justify-center items-center text-center p-6"
                            >
                                <img
                                    src="{{ asset('storage/' . $program->icon) }}"
                                    alt=""
                                    class="h-16 mb-4"
                                />
                                <h3
                                    class="text-xl font-semibold text-gray-800 group-hover:text-white mb-3"
                                >
                                    {{ $program->title }}
                                </h3>
                                <p class="text-gray-600 group-hover:text-gray-200 text-sm">
                                    {{ $program->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 title-section">
                        Galeri Kegiatan
                    </h2>
                    <div class="w-20 h-1 bg-blue-500 mx-auto"></div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1588072432836-1009b082c898?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1541178735493-479c1a27ed24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1566669437685-c2c5d41c3b9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1566669437685-c2c5d41c3b9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1588072432836-1009b082c898?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1541178735493-479c1a27ed24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1566669437685-c2c5d41c3b9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                        <img
                            src="https://images.unsplash.com/photo-1566669437685-c2c5d41c3b9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Kegiatan Ponpes"
                            class="w-full h-48 object-cover hover:scale-105 transition duration-500"
                        />
                    </div>
                </div>

                <div class="text-center mt-8">
                    <a
                        href="#"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-medium transition shadow-md"
                    >
                        Lihat Lebih Banyak
                    </a>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    @php
                        $section = sectionHeader('team');
                    @endphp

                    <h2 class="text-3xl font-bold text-gray-800 mb-4 title-section">
                        {{ $section->title }}
                    </h2>
                    <div class="w-20 h-1 bg-blue-500 mx-auto"></div>
                </div>

                <div
                    class="grid grid-cols-2 gap-8 justify-center md:flex md:flex-wrap md:justify-center"
                >
                    @foreach ($teams as $team)
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition w-full max-w-xs flex flex-col justify-between min-h-[300px]"
                        >
                            <div>
                                <div
                                    class="w-32 h-32 mx-auto mb-4 overflow-hidden border-4 border-green-100"
                                >
                                    <img
                                        src="{{ asset('storage/' . $team->photo) }}"
                                        alt="{{ $team->name }}"
                                        class="w-full h-full object-cover"
                                    />
                                </div>
                                <h3
                                    class="text-base sm:text-lg md:text-xl font-semibold mb-1 truncate text-green-500"
                                >
                                    {{ $team->name }}
                                </h3>
                                <p class="text-sm sm:text-base text-blue-600 mb-3 line-clamp-2">
                                    {{ $team->position }}
                                </p>
                            </div>
                            <div
                                class="flex justify-center space-x-3 mt-4 text-lg sm:text-xl md:text-2xl"
                            >
                                @if ($team->facebook)
                                    <a
                                        href="{{ $team->facebook }}"
                                        target="_blank"
                                        class="text-gray-400 hover:text-green-600 transition"
                                    >
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif

                                @if ($team->instagram)
                                    <a
                                        href="{{ $team->instagram }}"
                                        target="_blank"
                                        class="text-gray-400 hover:text-green-600 transition"
                                    >
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif

                                @if ($team->twitter)
                                    <a
                                        href="{{ $team->twitter }}"
                                        target="_blank"
                                        class="text-gray-400 hover:text-green-600 transition"
                                    >
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
        <section class="py-16 bg-green-600 text-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div
                            class="text-4xl font-bold mb-2"
                            data-toggle="counter-up"
                            data-count="2023"
                        >
                            0
                        </div>
                        <div class="text-lg">Tahun Berdiri</div>
                    </div>
                    <div>
                        <div
                            class="text-4xl font-bold mb-2"
                            data-toggle="counter-up"
                            data-count="{{ $totalSantri + 11 }}"
                        >
                            0
                        </div>
                        <div class="text-lg">Santri</div>
                    </div>
                    <div>
                        <div
                            class="text-4xl font-bold mb-2"
                            data-toggle="counter-up"
                            data-count="8"
                        >
                            0
                        </div>
                        <div class="text-lg">Pengajar</div>
                    </div>
                    <div>
                        <div
                            class="text-4xl font-bold mb-2"
                            data-toggle="counter-up"
                            data-count="{{ $totalLembaga }}"
                        >
                            0
                        </div>
                        <div class="text-lg">Lembaga Yayasan</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partner Institutions Section -->
        <section id="lembaga" class="py-20 bg-gray-100 overflow-x-hidden">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 title-section">
                        Partner Pondok
                    </h2>
                    <div class="w-20 h-1 bg-green-500 mx-auto"></div>
                </div>

                <div class="relative px-4 sm:px-10 md:px-20">
                    <div class="swiper lembaga-slider">
                        <div class="swiper-wrapper">
                            @foreach ($lembagas as $lembaga)
                                <div
                                    class="swiper-slide py-12 flex flex-col items-center justify-center text-center transition-all duration-300"
                                >
                                    <img
                                        src="{{ $lembaga->logo ? asset('storage/' . $lembaga->logo) : asset('images/default-logo.png') }}"
                                        alt="{{ $lembaga->nama_lembaga }}"
                                        class="lembaga-logo object-contain transition-all duration-300"
                                    />
                                    <h5
                                        class="text-sm font-semibold text-gray-800 uppercase tracking-wide mt-2"
                                    >
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
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-10">
                    @php
                        $section = sectionHeader('blog');
                    @endphp

                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">
                        {{ $section->title }}
                    </h2>
                    <h3 class="text-base sm:text-xl font-semibold mb-4 text-gray-600">
                        {{ $section->subtitle }}
                    </h3>
                    <div class="w-20 h-1 bg-green-500 mx-auto"></div>
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

                    <div class="grid {{ $gridCols }} gap-6 justify-center">
                        @foreach ($blogs as $blog)
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow hover:shadow-md transition duration-300 max-w-sm mx-auto"
                            >
                                <!-- Desktop & Tablet -->
                                <div class="hidden sm:block">
                                    <div class="h-40 overflow-hidden">
                                        <img
                                            src="{{ asset('storage/' . $blog->image) }}"
                                            alt="Berita"
                                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                        />
                                    </div>
                                    <div class="p-4">
                                        <div class="text-xs text-gray-500 mb-1">
                                            {{ $blog->created_at->format('d M Y') }}
                                        </div>
                                        <h3 class="text-sm font-semibold text-gray-800 mb-1">
                                            {{ $blog->title }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-2">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 70, '...') }}
                                        </p>
                                        <a
                                            href="{{ $blog->instagram_link }}"
                                            class="text-green-600 text-sm font-medium"
                                        >
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>

                                <!-- Mobile -->
                                <div class="sm:hidden flex gap-4 p-4">
                                    <img
                                        src="{{ asset('storage/' . $blog->image) }}"
                                        alt="Berita"
                                        class="w-24 h-24 object-cover rounded-md flex-shrink-0"
                                    />
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
                                        <a
                                            href="{{ $blog->instagram_link }}"
                                            class="text-green-600 text-xs font-medium"
                                        >
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="text-center mt-10">
                    <a
                        href="#"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-medium transition shadow-md"
                    >
                        Lihat Semua Berita
                    </a>
                </div>
            </div>
        </section>

        {{--
            <div class="container relative flex flex-col justify-between h-full max-w-6xl px-10 mx-auto xl:px-0 mt-5">
            <h2 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900">Services</h2>
            <p class="mb-12 text-lg text-gray-500">Here is a few of the awesome Services we provide.</p>
            <div class="w-full">
            <div class="flex flex-col w-full mb-10 sm:flex-row">
            <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
            <div class="relative h-full ml-0 mr-0 sm:mr-10">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-indigo-500 rounded-lg">
            <div class="flex items-center -mt-1">
            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">DAPP Development</h3>
            </div>
            <p class="mt-3 mb-1 text-xs font-medium text-indigo-500 uppercase">------------</p>
            <p class="mb-2 text-gray-600">A decentralized application (dapp) is an application built on a
            decentralized network that combines a smart contract and a frontend user interface.</p>
            </div>
            </div>
            </div>
            <div class="w-full sm:w-1/2">
            <div class="relative h-full ml-0 md:mr-10">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-purple-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-purple-500 rounded-lg">
            <div class="flex items-center -mt-1">
            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Web 3.0 Development</h3>
            </div>
            <p class="mt-3 mb-1 text-xs font-medium text-purple-500 uppercase">------------</p>
            <p class="mb-2 text-gray-600">Web 3.0 is the third generation of Internet services that will
            focus on understanding and analyzing data to provide a semantic web.</p>
            </div>
            </div>
            </div>
            </div>
            <div class="flex flex-col w-full mb-5 sm:flex-row">
            <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
            <div class="relative h-full ml-0 mr-0 sm:mr-10">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-blue-400 rounded-lg">
            <div class="flex items-center -mt-1">
            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Project Audit</h3>
            </div>
            <p class="mt-3 mb-1 text-xs font-medium text-blue-400 uppercase">------------</p>
            <p class="mb-2 text-gray-600">A Project Audit is a formal review of a project, which is intended
            to assess the extent up to which project management standards are being upheld.</p>
            </div>
            </div>
            </div>
            <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
            <div class="relative h-full ml-0 mr-0 sm:mr-10">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-400 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-yellow-400 rounded-lg">
            <div class="flex items-center -mt-1">
            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Hacking / RE</h3>
            </div>
            <p class="mt-3 mb-1 text-xs font-medium text-yellow-400 uppercase">------------</p>
            <p class="mb-2 text-gray-600">A security hacker is someone who explores methods for breaching
            defenses and exploiting weaknesses in a computer system or network.</p>
            </div>
            </div>
            </div>
            <div class="w-full sm:w-1/2">
            <div class="relative h-full ml-0 md:mr-10">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-green-500 rounded-lg">
            <div class="flex items-center -mt-1">
            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Bot/Script Development</h3>
            </div>
            <p class="mt-3 mb-1 text-xs font-medium text-green-500 uppercase">------------</p>
            <p class="mb-2 text-gray-600">Bot development frameworks were created as advanced software tools
            that eliminate a large amount of manual work and accelerate the development process.</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        --}}
        <!-- source:https://tailwind.besoeasy.com -->

        <!-- Testimonials Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Testimoni</h2>
                    <div class="w-20 h-1 bg-green-500 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="testimonial-card p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                <img
                                    src="https://randomuser.me/api/portraits/men/32.jpg"
                                    alt="Testimoni"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div>
                                <h4 class="font-semibold">Bapak Andi</h4>
                                <p class="text-gray-500 text-sm">Orang Tua Santri</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">
                            "Ponpes Selfa telah membantu anak saya menjadi lebih disiplin dan
                            mandiri. Prestasi akademiknya juga meningkat signifikan."
                        </p>
                        <div class="mt-4 text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="testimonial-card p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                <img
                                    src="https://randomuser.me/api/portraits/women/45.jpg"
                                    alt="Testimoni"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div>
                                <h4 class="font-semibold">Ibu Siti</h4>
                                <p class="text-gray-500 text-sm">Orang Tua Santri</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">
                            "Sangat puas dengan pendidikan agama yang diberikan. Anak saya sekarang
                            sudah hafal 3 juz dan rajin shalat berjamaah."
                        </p>
                        <div class="mt-4 text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="testimonial-card p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                <img
                                    src="https://randomuser.me/api/portraits/men/75.jpg"
                                    alt="Testimoni"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div>
                                <h4 class="font-semibold">Bapak Budi</h4>
                                <p class="text-gray-500 text-sm">Alumni</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">
                            "Pendidikan di Ponpes Selfa sangat berkesan. Saya sekarang bisa kuliah
                            di luar negeri berkat beasiswa dari hafalan Qur'an yang diajarkan di
                            sini."
                        </p>
                        <div class="mt-4 text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                    <div class="w-20 h-1 bg-green-500 mx-auto"></div>
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>

                            <div class="flex items-start mb-4">
                                <div class="text-green-600 mr-4 mt-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Alamat</h4>
                                    <p class="text-gray-600">
                                        Jl. Pendidikan No. 123, Kec. Ciputat, Kota Tangerang
                                        Selatan, Banten 15411
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start mb-4">
                                <div class="text-green-600 mr-4 mt-1">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Telepon</h4>
                                    <p class="text-gray-600">(021) 12345678</p>
                                    <p class="text-gray-600">0812-3456-7890 (WhatsApp)</p>
                                </div>
                            </div>

                            <div class="flex items-start mb-4">
                                <div class="text-green-600 mr-4 mt-1">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Email</h4>
                                    <p class="text-gray-600">info@ponpesselfa.sch.id</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="text-green-600 mr-4 mt-1">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Jam Operasional</h4>
                                    <p class="text-gray-600">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                    <p class="text-gray-600">Sabtu: 08.00 - 12.00 WIB</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 bg-white p-6 rounded-xl shadow-md">
                            <h3 class="text-xl font-semibold mb-4">Lokasi Kami</h3>
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.317239755586!2d106.8225093147693!3d-6.352966295404291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec6b07b68ea5%3A0x17da46bdf9308386!2sTangerang%20Selatan%2C%20South%20Tangerang%20City%2C%20Banten!5e0!3m2!1sen!2sid!4v1625555555555!5m2!1sen!2sid"
                                    width="100%"
                                    height="300"
                                    style="border: 0"
                                    allowfullscreen=""
                                    loading="lazy"
                                    class="rounded-lg"
                                ></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <h3 class="text-xl font-semibold mb-4">Kirim Pesan</h3>
                            <form>
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 mb-2">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 mb-2">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="block text-gray-700 mb-2">
                                        Nomor Telepon
                                    </label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="subject" class="block text-gray-700 mb-2">
                                        Subjek
                                    </label>
                                    <input
                                        type="text"
                                        id="subject"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 mb-2">
                                        Pesan
                                    </label>
                                    <textarea
                                        id="message"
                                        rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-medium transition shadow-md w-full"
                                >
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Register Section -->
        <section id="daftar" class="py-16 bg-green-600 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-6">Daftarkan Putra/Putri Anda Sekarang</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan Ponpes Selfa untuk pendidikan terbaik yang mengintegrasikan
                    ilmu agama dan umum dengan metode pembelajaran modern.
                </p>
                <a
                    href="#"
                    class="inline-block bg-white text-green-600 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition shadow-lg"
                >
                    Daftar Sekarang
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white pt-12 pb-6">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Ponpes Selfa</h3>
                        <p class="text-gray-400 mb-4">
                            Pondok Pesantren Modern Selfa, membentuk generasi Qur'ani yang berakhlak
                            mulia, berwawasan luas, dan mandiri.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Info Pondok</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Sejarah
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Visi & Misi
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Struktur Organisasi
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Fasilitas
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Prestasi
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Informasi</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Pendaftaran
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Biaya Pendidikan
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Kalender Akademik
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Beasiswa
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2 text-gray-400"></i>
                                <span class="text-gray-400">
                                    Jl. Pendidikan No. 123, Ciputat, Tangerang Selatan
                                </span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                                <span class="text-gray-400">(021) 12345678</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                <span class="text-gray-400">info@ponpesselfa.sch.id</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-6 text-center text-gray-400">
                    <p>&copy; 2023 Ponpes Selfa. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/3f1db990a0.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    </body>
</html>
