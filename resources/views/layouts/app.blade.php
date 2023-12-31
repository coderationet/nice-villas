<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') - {{ \App\Helpers\Option::get('site_name') }}
        @else
            {{ \App\Helpers\Option::get('site_name') }}
        @endif
    </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <base href="{{ url('/') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @stack('extra-head')

</head>
<body class="font-sans">
<x-navigation/>
<main id="swup" class="transition-fade">
    @yield('content')
    @stack('extra-footer')
</main>
<footer class="mt-5 bg-white w-100 p-4">
    <div class="container">
        {{ \App\Helpers\Option::get('footer_text')}}
    </div>
</footer>

</body>
</html>
