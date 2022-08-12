<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Laravel CRM - https://github.com/TobyMaxham/laravel-crm">
    <meta name="author" content="Toby Maxham 🌴 @TobyMaxham">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('themes/portal5/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('themes/portal5/assets/css/portal.css') }}">

    @livewireStyles

    @stack('styles')

</head>

<body class="app">

    @section('header')
        @include('themes.portal5.layouts.header')
    @show

    @yield('content')

    <!-- Javascript -->
    <script src="{{ asset('themes/portal5/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('themes/portal5/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('themes/portal5/assets/js/app.js') }}"></script>

    @stack('scripts')

    @livewireScripts

</body>
</html>
