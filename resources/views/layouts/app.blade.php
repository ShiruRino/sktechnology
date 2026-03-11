<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SK Technology - Timor Leste</title>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    </head>
    <body>
        <div class="loader">
        <div class="loading-text-container">
            <span class="loading-text">Load<strong>ing</strong></span> 
            <span class="loader_count">0</span>
        </div>
        <div class="loader-anim"></div>
        <div class="loader-anim2 color-bg"></div>
    </div>

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>