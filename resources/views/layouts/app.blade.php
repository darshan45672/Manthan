<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
        
            <title>Manthan - AICTE Activty/Event management system</title>
        
            <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ui/assets/img/favicon.png') }}">
        
            <!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('ui/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/fontawesome.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/venobox.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/keyframe-animation.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/odometer.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/daterangepicker.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/swiper.min.css') }}">
            <link rel="stylesheet" href="{{ asset('ui/assets/css/main.css') }}">
        </head>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')

        @yield('content')

        @include('layouts.footer')
    </body>
</html>
