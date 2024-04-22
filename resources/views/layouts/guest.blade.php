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
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen flex items-center bg-[#FBFBFB] relative">
    <img src="{{ asset('assets/MnachaSazone.png') }}" alt="Logo"
        style="max-width: 300px; max-height: 300px; position: absolute; top: 0; left: 0; ">

    <img src="{{ asset('assets/circuloSazone.png') }}" alt="Another Image"
        style="max-width: 150px; max-height: 300px; position: absolute; bottom: 0; right: 0;">

    <main class="max-w-sm mx-auto shadow-lg rounded-lg px-8 py-4" style="z-index: 9999;">
        @yield('content')
    </main>
    @yield('scripts')

    <script>
        var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
        if (es_firefox) {
            alert("El navegador que se está utilizando es Firefox");
        }
    </script>
</body>


</html>
