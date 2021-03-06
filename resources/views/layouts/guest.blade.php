<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
 <body class="pt-14 pl-0">
    <nav id="navbar-main" class="navbar is-fixed-top">
        <div class="aside-tools">
            <div class="logo-dashboard">
                <b><a href="/">TicketHelp</a></b>
            </div>
        </div>
        <div class="navbar-brand">
            <a href="{{ url('/guides') }}" class="navbar-item font-bold">Guies</a>
        </div>
    </nav>
    <!-- Page Content -->
        {{ $slot }}
 </body>
<!-- We should install this with npm -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</html>
