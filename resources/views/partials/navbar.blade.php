{{-- Floating Top Navbar (Mobile Only) --}}
{{-- <div class="fixed top-4 left-1/2 z-50 w-[92%] max-w-sm -translate-x-1/2 rounded-full bg-white shadow-md px-4 py-2 flex items-center justify-center space-x-3 md:hidden">
    @if ($navbar && $navbar->logo)
        <img src="{{ asset('storage/' . $navbar->logo) }}" alt="Logo" class="h-8 w-auto" />
    @endif
    <span class="text-sm font-semibold text-green-600 truncate">
        {{ $navbar->title ?? 'Ponpes Selfa' }}
    </span>
</div> --}}

<nav class="floating-nav floating-nav-mobile md:floating-nav">
    {{-- Logo dan Judul untuk Desktop --}}
    <div class="hidden items-center md:flex">
        @if ($navbar && $navbar->logo)
        <img src="{{ asset('storage/' . $navbar->logo) }}" alt="Logo" class="mr-3 h-10" />
        @endif

        <a href="#" class="text-2xl font-bold text-green-600">
            {{ $navbar->title ?? 'Ponpes Selfa' }}
        </a>
    </div>

    {{-- Ikon Navigasi --}}
    <div class="flex items-center space-x-1 md:space-x-4">
        @if ($navbar && is_array($navbar->navigation))
        @foreach ($navbar->navigation as $nav)
        @if (($nav['type'] ?? '') === 'dropdown' && isset($nav['children']))
        <div class="dropdown relative">
            <button
                class="flex items-center rounded-full p-2 text-gray-700 transition hover:bg-green-50 hover:text-green-600 md:px-4">
                @if (! empty($nav['icon']))
                <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
                @endif

                <span class="ml-2 hidden md:inline">
                    {{ $nav['label'] }}
                </span>
                <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
            </button>
            <div class="dropdown-menu absolute hidden transition-all duration-300">
                @foreach ($nav['children'] as $child)
                <a href="{{ $child['url'] }}"
                    class="{{ ($child['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }} block px-4 py-2 text-gray-700 transition hover:bg-green-50"
                    {{ ($child['type'] ?? '' )==='external' ? 'target=_blank' : '' }}>
                    @if (! empty($child['icon']))
                    <i class="fa-solid fa-{{ $child['icon'] }} mr-2"></i>
                    @endif

                    {{ $child['label'] }}
                </a>
                @endforeach
            </div>
        </div>
        @elseif ($nav['button'] ?? false)
        {{-- Tombol Daftar ditampilkan di luar navbar-nav --}}
        @else
        <a href="{{ $nav['url'] }}"
            class="{{ ($nav['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }} {{ request()->is(trim($nav['url'], '/')) ? 'font-semibold text-green-600' : '' }} rounded-full p-2 text-gray-700 transition hover:bg-green-50 hover:text-green-600 md:px-4"
            {{ ($nav['type'] ?? '' )==='external' ? 'target=_blank' : '' }}>
            @if (! empty($nav['icon']))
            <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
            @endif

            <span class="ml-2 hidden md:inline">
                {{ $nav['label'] }}
            </span>
        </a>
        @endif
        @endforeach
        @endif
    </div>

    {{-- Tombol Aksi (jika ada) --}}
    @if ($navbar && is_array($navbar->navigation))
    @foreach ($navbar->navigation as $nav)
    @if ($nav['button'] ?? false)
    <a href="{{ $nav['url'] }}"
        class="{{ ($nav['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }} rounded-full bg-green-600 px-4 py-2 text-white shadow-md transition hover:bg-green-700"
        {{ ($nav['type'] ?? '' )==='external' ? 'target=_blank' : '' }}>
        {{ $nav['label'] }}
    </a>
    @endif
    @endforeach
    @endif
</nav>
