<!DOCTYPE html>
<html lang="id">
    <head>
        <title>{{ $title ?? 'Pendaftaran Ponpes Selfa' }}</title>
        @include('partials.head')
    </head>
    <body class="bg-gray-100 font-sans">
        @yield('content')

        
        @push('scripts')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @endpush
    </body>
</html>
