<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        
        <title>Walmart - @yield('title')</title>
        <link rel="icon" type="image/png" href="{{asset('storage/images/logo_minimal.png')}}" />
    </head>
    <body>
        <div id="app">
            @include('components.navbar')
            <div id="layout_container">
                @yield('content')
            </div>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/navbar.js')}}"></script>
    </body>
</html>
