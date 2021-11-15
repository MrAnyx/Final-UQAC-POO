<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <title>e-Walmart - @yield('title')</title>
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
