<section id="Home" class="relative h-screen overflow-hidden text-white">

    {{-- Lakukan pengecekan jika data hero tidak ada --}}
    @if ($heroSection)

    {{-- Header Khusus Mobile --}}
    <div
        class="nav-logo-mobile absolute top-4 left-0 z-30 flex items-center border-4 border-double p-4 md:hidden">
        @if ($navbar && $navbar->logo)
        <img src="{{ asset('storage/' . $navbar->logo) }}" alt="Logo" class="mr-3 h-8" />
        @endif
        <p class="navbar-title font-bold">
            {{ $navbar->title}}
        </p>
    </div>

    <div class="absolute inset-0 z-0">
        <div class="swiper-container bg-swiper h-full">
            <div class="swiper-wrapper">
                {{-- Loop melalui gambar latar --}}
                @foreach ($heroSection->background_images as $image)
                <div class="swiper-slide h-full bg-cover bg-center"
                    style="background-image: url('{{ asset('storage/' . $image) }}')"></div>
                @endforeach
            </div>
        </div>
        <div class="absolute inset-0 z-10 bg-black/60"></div>
    </div>

    <div class="relative z-20 flex h-full items-center">
        <div class="container mx-auto px-4 text-center">
            <div class="mx-auto max-w-2xl">
                <h1 class="mb-4 font-bold">
                    {{ $heroSection->title }}
                </h1>
                <h3 class="mb-10">
                    {{ $heroSection->subtitle }}
                </h3>
                <div class="flex flex-col items-center justify-center gap-3 md:flex-row md:gap-8">
                    {{-- Loop melalui tombol --}}
                    @foreach ($heroSection->buttons as $index => $button)
                    <a href="{{ $button['url'] }}" class="btn btn-outline-light"> {{-- Hapus logika kondisional --}}
                        {{ $button['text'] }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endif
</section>
