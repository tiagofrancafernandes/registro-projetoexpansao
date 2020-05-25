<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @hasSection('title')
        <title>@yield('title') :: {{ env('APP_NAME') }}</title>
        @else
        <title>@yield('title', env('APP_NAME') )</title>
        @endif

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('registro') }}/css/style.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('layouts.registro.includes.top_menu')

            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
