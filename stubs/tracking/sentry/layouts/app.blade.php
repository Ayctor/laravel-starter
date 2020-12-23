<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">

        @if(config('app.env') !== 'production')
            <meta name="robots" content="noindex">
        @endif

        <link rel="icon" type="image/png" href="/favicon.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">

        <!-- Insert your fonts here -->

        <link href="{{ mix('build/app.css') }}" rel="stylesheet">

        <script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=NodeList.prototype.forEach%2Csmoothscroll"></script>

        @if(!is_null(config('gtm.id')))
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','{{ config('gtm.id') }}');</script>
            <!-- End Google Tag Manager -->
        @endif

        @auth
            <script>
                window.sentry = {
                    dsn: '{{ config('sentry.dsn') }}',
                    environment: '{{ config('app.env') }}',
                    release: '{{ config('sentry.release') }}',
                };
            </script>
        @endauth

        @stack('head')
    </head>
    <body class="antialiased font-sans">
        @if(!is_null(config('gtm.id')))
            <!-- Google Tag Manager (noscript) -->
            <noscript>
                <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('gtm.id') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>
            </noscript>
            <!-- End Google Tag Manager (noscript) -->
        @endif

        <div class="overflow-x-hidden relative" id="app">
            @yield('app')
        </div>

        <script src="{{ mix('build/manifest.js') }}" defer></script>
        <script src="{{ mix('build/vendor.js') }}" defer></script>
        <script src="{{ mix('build/app.js') }}" defer></script>

        @stack('scripts')
    </body>
</html>
