<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>AniAnu - @yield('title')</title>
</head>
<body class="antialiased">
    {{-- Header --}}
    <x-header></x-header>

    {{-- Content --}}
    <main class="">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="lg:px-28 lg:py-8 p-8 bg-gray-900 mt-10">
        <p class="text-xl font-semibold mb-2">AniAnu Project</p>
        <p class="text-sm mb-2">AniAnu is not affiliated with or endorsed by any of the anime studios behind the creation of the anime presented on this site. This website is only an user interface presenting/linking various self-hosted files across the internet by other third-party providers for easy access.</p>
        <p class="text-sm">
            &copy; ANIANU {{ date("Y") }} | Built using <a class="text-gray-400" href="https://docs.enime.moe/">Enime API</a>, <a class="text-gray-400" href="https://jikan.moe/">Jikan API</a>, and <a class="text-gray-400" href="https://docs.consumet.org/">Consumet API</a>
        </p>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>