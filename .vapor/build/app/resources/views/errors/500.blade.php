<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ui/assets/img/favicon.png') }}">
    <link rel="manifest" href="{{ asset('dashboard/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('dashboard/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('dashboard/vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/asset/css/line.css') }}">
    <link href="{{ asset('dashboard/assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('dashboard/assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashboard/assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet"
        id="user-style-rtl">
    <link href="{{ asset('dashboard/assets/css/user.min.css') }}" type="text/css" rel="stylesheet"
        id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <link href="{{ asset('dashboard/vendors/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
</head>

<body>
    <main class="main" id="top">
        <div class="px-3">
            <div class="row min-vh-100 flex-center p-5">
                <div class="col-12 col-xl-10 col-xxl-8">
                    <div class="row justify-content-center g-5">
                        <div class="col-12 col-lg-6 text-center order-lg-1"><img class="img-fluid w-lg-100 d-light-none"
                                src="{{ asset('dashboard/assets/img/spot-illustrations/500-illustration.png') }}" alt="" width="400" /><img
                                class="img-fluid w-md-50 w-lg-100 d-dark-none"
                                src="{{ asset('dashboard/assets/img/spot-illustrations/dark_500-illustration.png') }}" alt=""
                                width="540" /></div>
                        <div class="col-12 col-lg-6 text-center text-lg-start"><img
                                class="img-fluid mb-6 w-50 w-lg-75 d-dark-none"
                                src="{{ asset('dashboard/assets/img/spot-illustrations/500.png') }}" alt="" /><img
                                class="img-fluid mb-6 w-50 w-lg-75 d-light-none"
                                src="{{ asset('dashboard/assets/img/spot-illustrations/dark_500.png') }}" alt="" />
                            <h2 class="text-body-secondary fw-bolder mb-3">Unknow error!</h2>
                            <p class="text-body mb-5">But relax! Our cat is here to play you some music.</p><a
                                class="btn btn-lg btn-primary" href="{{ route('home') }}">Go Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('dashboard/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/ecommerce-dashboard.js') }}"></script>
</body>

</html>