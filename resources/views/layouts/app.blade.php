<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ $title ?? 'Ponpes Selfa - Pendidikan Islam Berkualitas' }}</title>
    @include('partials.head')
</head>
<body class="font-sans bg-gray-50">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
