<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- jquery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{--  Slick --}}
    <script src="{{ asset('js/slick.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--  MY StyleSheet  --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--  Fontawesome  -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!--  Bootstrap  -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--  Slick  -->
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    {{--    Logo Font--}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

    @yield('stylesheets')
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    <script>
        $(document).ready(function () {
            $( ".drop-content-down" ).click(function() {
                let contentList = $(this).next('#show-me-up');
                contentList.toggle(500);
            });
        })
    </script>
    <script>
        // on nav scroll
        $('nav.sidebar').scroll(function() {
            if ($(this).scrollTop() > 35) {
                $('.top-logo').css({
                    'transition':'0s',
                    'position':'fixed',
                    'background-color': '#080e33',
                    'left': '0',

                    'background': 'linear-gradient(518deg, #3f51b5 -10%, #380036 74%)',
                    'top': '0',
                    'padding': '4px 33px'

            });
            } else {
                $('.top-logo').css({
                    'position':'static',
                    'background-color': 'transparent',
                    'background': 'transparent',
                    'padding': '0'

                });
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#lightMode').on('click',function () {
                $('body','nav').css({
                    'background-color':'#fff !important',
                    'color':'#080E33 !important',
                });
            });
        });
    </script>
    @include('sweetalert::alert')
</body>
</html>
