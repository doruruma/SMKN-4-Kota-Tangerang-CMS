<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMKN 4 Kota Tangerang</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('/img/smk4.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/owlcarousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/owlcarousel/dist/assets/owl.theme.default.min.css') }}">

        <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('/vendor/owlcarousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <style>
            p {
                font-family: 'Open Sans', sans-serif !important;
            }

            .open-sans {
                font-family: 'Open Sans', sans-serif !important;
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

            .bold {
                font-family: 'Montserrat', 'Raleway', sans-serif;
                font-weight: 700;
            }

            .top-right {
                position: absolute;
                top: 5;
                right: 5;
            }

            .isi {
                position:absolute;
                bottom:0;
                left:0;
                right:0;
                background: rgba(0, 0, 0, 0.8);
            }

            .white-space {
                margin-top: 80px;
                margin-bottom: 95px;
            }

            .image-fix {
                height:420px !important;
                width:100%;
            }

            .image-major-fix {
                height:300px !important;
                width: 100%;
                background-size: cover;
            }

            .image-official-fix {
                width:250px;
                height:250px;
            }

            .image-prestasi-fix {
                height: 200px;
            }

            .item-c:hover > * {
                display: block !important;
            }

            .image-official-fix p {
                font-weight: 700;
                margin-bottom:0px;
            }

            @media screen and (max-width:720px) {
                .overflow-show {
                    overflow-x:scroll !important;
                }

                .item-c > * {
                    display: block !important;
                }

                .image-official-fix {
                    width:165px;
                    height:165px;
                }

                .image-official-fix p {
                    font-size: 13px;
                    font-weight: 700;
                    margin-bottom:1px;
                    padding: 10px;
                }

                .image-fix {
                    min-height:180px !important;
                    max-height:180px !important;
                }

                .image-major-fix {
                    min-height:200px !important;
                    max-height:200px !important;
                }

                .image-prestasi-fix {
                    min-height:150px !important;
                    max-height:150px !important;
                }

                .text-center-fix {
                    text-align: center;
                }

                .br-s {
                    border-radius: 10px;
                }
            }
        </style>
    </head>
    <body class="bg-light">
        @include('templates.navbar')
        @yield('content')
        <div style="margin-bottom: 100px"></div>
        @include('templates.footer')
    </body>
</html>
