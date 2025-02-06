<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    @php
    $header = Cache::rememberForever('cached_header', function () {
    return view('layouts.cached.cacheHeader')->render();
    });
    @endphp

    {!! $header !!}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.navigation')

    @yield('content')

    @include('layouts.footer')
</body>

<!-- JS here -->
@php
$footer = Cache::rememberForever('cached_footer', function () {
return view('layouts.cached.cacheJs')->render();
});
@endphp

{!! $footer !!}

<script>
    import Echo from 'laravel-echo';
 
 import Pusher from 'pusher-js';
 window.Pusher = Pusher;
  
 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: import.meta.env.VITE_PUSHER_APP_KEY,
     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
     forceTLS: true
 });
 window.Echo.channel('events-channel')
    .listen('.event.created', (data) => {
        console.log('New Event:', data);
    });
</script>

</html>