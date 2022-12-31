<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} &#9642; {{ config('hhf.company.name') }} &#9642; {{ __('hhf/common.tagline') }}</title>

        <!-- Scripts -->
        @if (request()->secure())
            <script src="{{ config('hhf.url.design_system.scripts.secure') }}?id={{ config('hhf.url.design_system.scripts.version') }}" defer></script>
            <script src="{{ secure_asset(mix('js/manifest.js')) }}" defer></script>
            <script src="{{ secure_asset(mix('js/vendor-propel-modules.js')) }}" defer></script>
            <script src="{{ secure_asset(mix('js/vendor.js')) }}" defer></script>
            <script src="{{ secure_asset(mix('js/app.js')) }}" defer></script>
        @else
            <script src="{{ config('hhf.url.design_system.scripts.non_secure') }}?id={{ config('hhf.url.design_system.scripts.version') }}" defer></script>
            <script src="{{ asset(mix('js/manifest.js')) }}" defer></script>
            <script src="{{ asset(mix('js/vendor-propel-modules.js')) }}" defer></script>
            <script src="{{ asset(mix('js/vendor.js')) }}" defer></script>
            <script src="{{ asset(mix('js/app.js')) }}" defer></script>
        @endif

        <!-- Styles -->
        @if (request()->secure())
            <link rel="stylesheet" href="{{ config('hhf.url.design_system.styles.secure') }}?id={{ config('hhf.url.design_system.styles.version') }}">
            <link rel="stylesheet" href="{{ secure_asset(mix('css/app.css')) }}">
        @else
            <link rel="stylesheet" href="{{ config('hhf.url.design_system.styles.non_secure') }}?id={{ config('hhf.url.design_system.styles.version') }}">
            <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        @endif

        <!-- icons -->
        <link rel="icon" href="{{ asset('hhf/propel-icon-70x70.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('hhf/propel-icon.png') }}" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="{{ asset('hhf/propel-icon.png') }}" />
        <meta name="msapplication-TileImage" content="{{ asset('hhf/propel-icon.png') }}" />

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175661421-2"></script>
        <script nonce="{{ csp_nonce() }}">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-175661421-2');
        </script>
    </head>

    <body class="loggedin">
        <div id="app" class="wrapper">
            @include('layouts.components.topbar')
            @include('layouts.components.sidebar')

            @yield('multi-step-sidebar')

            <main role="main">
                @yield('content')
            </main>

            @section('secondary-sidebar')
                @include('layouts.components.sidebar.secondary')
            @show
        </div>

        @yield('modals')

        @if (config('app.env') !== 'production')
            @include('layouts.components.environment')
        @endif
        <div class="overlay"></div>
    </body>
</html>
