<!DOCTYPE html>
<html lang="id">

<head>
    {{-- Title tetap di sini karena dinamis per halaman --}}
    <title>{{ $title ?? 'Ponpes Selfa - Pendidikan Islam Berkualitas' }}</title>

    @include('partials.head')
</head>

<body class="@yield('body-class', 'page-default')">

    @include('partials.sections.navbar')

    <main>
        @yield('content')

        @include('partials.sections.footer')
    </main>

    {{-- Memanggil semua script dari satu file partial --}}
    @include('partials.scripts')

</body>

</html>
