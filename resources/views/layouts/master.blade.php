
<html>
    <head>
        <title>App Name - @yield('Book Store')</title>
        <script src="{{asset('dist/js/app.js')}}"></script>
    </head>
    <body>
        @include('partials.top-menu')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>