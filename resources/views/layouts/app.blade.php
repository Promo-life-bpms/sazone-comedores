<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (Auth::user()->hasRole(['super-admin', 'master-admin']))
        @include('shared.navbar-admin')
    @else
        @include('shared.navbar')
    @endif
    <div class="max-w-7xl mx-auto w-[95%]">
        @yield('content')
    </div>
    @yield('scripts')

    @if (!Auth::user()->hasRole(['super-admin', 'master-admin']))
        {{-- @include('shared.soporte') --}}
    @endif
    <script>
        var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
        if (es_firefox) {
            alert("El navegador que se está utilizando es Firefox");
        }
    </script>
</body>

</html>
