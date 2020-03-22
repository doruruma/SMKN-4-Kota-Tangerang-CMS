<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
    <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
      <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('/css/sb-admin-2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('./css/main.css') }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Scripts -->
      <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <script src="{{ asset('/js/sb-admin-2.min.js') }}" defer></script>
      <script src="{{ asset('/js/swal.js') }}"></script>
    <!-- Plugins -->
      @yield('plugin')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Page JS -->
      @yield('pageJS')
    <!-- InPage Script -->
      @yield('script')
  </head>

  <body style="background:@yield('bodyColor')" class="@yield('bodyClass')">
    <div id="app">
      @yield('content')
    </div>
  </body>

</html>
