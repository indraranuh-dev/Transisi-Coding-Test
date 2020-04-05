<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="{{ asset('font-awesome/font-awesome.css') }}" rel="stylesheet">
    <!-- Custom -->
    <link href="{{ asset('css/custom/style.css') }}" rel="stylesheet">
</head>
<body>
    {{-- Menerapkan component.blade milik laravel --}}
    <x-Navbar/>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
