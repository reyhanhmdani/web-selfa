<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $title ?? 'Ponpes Selfa - Pendidikan Islam Berkualitas' }}</title>
    @include('partials.head')
</head>

<body class="">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3f1db990a0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox.min.js"></script>
    {{-- script yang spesifik perhalaman --}}
    @stack('scripts')
</body>

</html>
