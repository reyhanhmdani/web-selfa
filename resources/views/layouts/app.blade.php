<!DOCTYPE html>
<html lang="id">

<head>
    {{-- Title tetap di sini karena dinamis per halaman --}}
    <title>{{ $title ?? 'Ponpes Selfa - Pendidikan Islam Berkualitas' }}</title>

    @include('partials.head')
</head>

<body class="@yield('body-class', 'page-default')">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Memanggil semua script dari satu file partial --}}
    @include('partials.scripts')

</body>
</html>
