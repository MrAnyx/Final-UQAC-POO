<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <title>E-Commerce - @yield('title')</title>
    </head>
    <body>
        <div id="app">
            @include('components.navbar')
            @yield('content')
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/navbar.js')}}"></script>
    </body>
</html>
