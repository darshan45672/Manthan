<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

@php
$header = Cache::rememberForever('cached_dashboard_header', function () {
return view('layouts.dashboard.cached.cachedHeader')->render();
});
@endphp

{!! $header !!}

<body>
    <main class="main" id="top">

        @include('layouts.dashboard.includes.navbar')

        <div class="content">

            @yield('content')

            @include('layouts.dashboard.includes.footer')
        </div>
    </main>

    @php
    $scripts = Cache::rememberForever('cached_dashboard_scripts', function () {
    return view('layouts.dashboard.cached.cachedScripts')->render();
    });
    @endphp

    {!! $scripts !!}
</body>

</html>