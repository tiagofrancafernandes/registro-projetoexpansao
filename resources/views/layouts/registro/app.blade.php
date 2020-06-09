<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/') }}registro/img/registro_logo.png" />

    @hasSection('title')
    <title>@yield('title') :: {{ env('APP_NAME') }}</title>
    @else
    <title>@yield('title', env('APP_NAME') )</title>
    @endif

    <!-- Styles -->    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('') }}bootstrap-4.1.3/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('') }}bootstrap-4.1.3/css/bootstrap.min.css">
    {{--  <script src="{{ asset('') }}registro/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>  --}}
    <script src="{{ asset('') }}registro/js/jquery_3.1.0.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('registro') }}/css/style.css">
    <script src="{{ asset('registro') }}/js/site.js"></script>
    @yield('before_end_head')
</head>
<body>    
    @yield('before_content')

    @include('layouts.registro.includes.top_content')

    <div class="mt-3 pt-3"></div>
    <div class="container mt-3 pt-3">
        @yield('content')
    </div>

    <!-- JavaScript -->
    <!-- font-awesome -->    
    {{-- <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script> --}}
    <script src="{{ asset('') }}registro/js/fontawesome_v5.13.0_all.js" data-auto-replace-svg="nest"></script>
    <script src="{{ asset('') }}registro/js/popper.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('') }}bootstrap-4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>