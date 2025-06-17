<nav class="floating-nav floating-nav-mobile md:floating-nav">
    {{-- Logo dan Judul untuk Desktop dan Mobile --}}
    <div class="hidden items-center md:flex">
        @if ($navbar && $navbar->logo)
        <img src="{{ asset('storage/' . $navbar->logo) }}" alt="Logo" class="mr-3 h-10 hidden md:block" />
        @endif

        <p class="navbar-title text-base font-bold md:text-2xl">
            {{ $navbar->title ?? 'Ponpes Selfa' }}
        </p>
    </div>

    {{-- resources/views/partials/navbar.blade.php --}}

    <div class="flex items-center space-x-1 md:space-x-4">
        @if ($navbar && is_array($navbar->navigation))
        @foreach ($navbar->navigation as $nav)
        @if (($nav['type'] ?? '') === 'dropdown' && isset($nav['children']))
        <div class="dropdown relative">
            {{-- TAMBAHKAN KELAS UNTUK LAYOUT & ALIGNMENT --}}
            <button data-toggle="dropdown"
                class="nav-item flex flex-col items-center rounded-full p-2 text-center md:flex-row md:px-4">

                {{-- Ikon Utama --}}
                @if (! empty($nav['icon']))
                <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
                @endif

                {{-- Grup untuk Label dan Chevron --}}
                <div class="flex items-center">
                    <span
                        class="mt-1 block text-[10px] font-medium leading-tight md:ml-2 md:mt-0 md:inline md:text-sm">{{
                        $nav['label'] }}</span>

                    {{-- Hapus 'hidden' dan 'md:inline-block' agar selalu tampil --}}
                    <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                </div>
            </button>
            <div class="dropdown-menu absolute hidden transition-all duration-300">
                @foreach ($nav['children'] as $child)
                <a href="{{ $child['url'] }}"
                    class="dropdown-item {{ ($child['type'] ?? '') === 'anchor' ? 'anchor-link' : '' }} block px-4 py-2"
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
        @else
        <a href="{{ $nav['url'] }}" {{-- TAMBAHKAN KELAS UNTUK LAYOUT & ALIGNMENT --}}
            class="nav-item flex flex-col items-center {{-- ... --}} rounded-full p-2 md:flex-row md:px-4" {{-- ...
            --}}>
            @if (! empty($nav['icon']))
            <i class="fa-solid fa-{{ $nav['icon'] }}"></i>
            @endif
            {{-- UBAH KELAS DI SPAN INI --}}
            <span class="mt-1 block text-[10px] font-medium leading-tight md:ml-2 md:mt-0 md:inline md:text-sm">{{
                $nav['label'] }}</span>
        </a>
        @endif
        @endforeach
        @endif
    </div>

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