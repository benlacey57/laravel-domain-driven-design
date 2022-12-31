<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>

    <body>
        @if (config('app.env') !== 'production')
            @include('layouts.components.environment')
        @endif

        <div id="top" class="topbar group">
            <div id="logo" class="text-center font-weight-bold">LOGO</div>
        </div>

        <div id="content">
            <main role="main">
                @yield('content')
            </main>
        </div>

        @include('layouts.components.footer')
    </body>
</html>
