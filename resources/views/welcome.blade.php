<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMKN 4 Kota Tangerang</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/vendor/js/landingPage.js') }}"></script>
        <style>
            p {
                font-family: 'Raleway', sans-serif !important;
            }

            .nav-link {
                font-family: 'Montserrat', sans-serif !important;
                color:white;
                opacity: 1;
                font-weight: 400;
                font-size:0.92rem;
            }

            .nav-link.active {
                font-family: 'Montserrat', sans-serif !important;
                color:white;
                opacity: 1;
                font-weight: 700;
                font-size:0.92rem;
            }
        </style>
    </head>
    <body>
        @include('templates.navbar')
        @yield('content')
        @include('templates.footer')
    </body>
</html>
