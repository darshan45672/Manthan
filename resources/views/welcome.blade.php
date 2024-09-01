<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manthan</title>

    <!--    Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../vendors/simplebar/simplebar.min.js"></script>
    <script src="../../assets/js/config.js"></script>

    <!--    Stylesheets-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="../../assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="../../assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="../../assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="../../assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
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
    <link href="../../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>
<body class="bg-body-emphasis" style="--phoenix-scroll-margin-top: 1.2rem;">
    <!--    Main Content-->
    <main class="main" id="top">
        <!-- Navbar -->
        <div class="bg-body-emphasis sticky-top" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
            <nav class="navbar navbar-landing navbar-expand-lg container-medium">
                <a class="navbar-brand flex-1 flex-lg-grow-0 me-lg-8 me-xl-13" href="../../index.html">
                    <div class="d-flex align-items-center"><img src="../../assets/img/icons/logo.png" alt="phoenix"
                            width="27" />
                        <h5 class="logo-text ms-2">Manthan</h5>
                    </div>
                </a>
                <div class="d-flex align-items-center gap-2 gap-sm-3 gap-md-4 my-2 order-lg-1">
                    <div class="theme-control-toggle fa-icon-wait">
                        <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"data-theme-control="phoenixTheme" value="dark"id="themeControlToggleSm"/>
                        <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggleSm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style="height:32px;width:32px;"><span class="icon"data-feather="moon"></span></label>
                        <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark"for="themeControlToggleSm" data-bs-toggle="tooltip" data-bs-placement="left"data-bs-title="Switch theme" style="height:32px;width:32px;"><span class="icon"data-feather="sun"></span></label>
                    </div>
                        <a class="btn btn-link text-body-tertiary p-0" href="#!"><span data-feather="bell" style="width: 20px; height: 20px"></span></a>
                        <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                            <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a class="nav-link"href="{{ route('login') }}">Sign in</a></li>
                            <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a class="nav-link"href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                </div><button class="navbar-toggler fs-8 ps-1 ps-sm-3 pe-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a class="nav-link"href="#">Home</a></li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a class="nav-link" href="flight/homepage.html">About Us</a></li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a class="nav-link" href="../events/event-detail.html">Event</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="booking-hero-header d-flex align-items-center">
            <div class="bg-holder bg-holder overlay bg-opacity-50" style="background-image:url(../../assets/video/travel.png);"><video class="bg-video" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline"><source src="{{ asset('assets/video/travel.mp4') }}" type="video/mp4" /></video>
            </div>
            <!--/.bg-holder-->
            <div class="container-medium position-relative z-5">
                <h2 class="text-secondary-lighter fs-5 fs-md-3 fw-normal mb-3">Where is your</h2>
                <h1 class="fs-4 fs-md-1 text-white fw-normal mb-6 overflow-hidden">NEXT <span class="typed-text text-primary" data-typed-text="[&quot;&lt;span class=text-primary&gt;TRIP!&lt;/span&gt;&quot;,&quot;&lt;span class=text-warning&gt;TOUR?&lt;/span&gt;&quot;, &quot;&lt;span class=text-info&gt;SOJOURN?&lt;/span&gt;&quot;, &quot;&lt;span class=text-success&gt;VACAY?&lt;/span&gt;&quot;]"></span>
                </h1>
                <div class="input-group rounded-2 py-1 ps-2 w-lg-50 border border-light">
                    <div class="form-icon-container flex-1 d-flex align-items-center" data-fa-transform="down-1"><span
                            class="fa-solid fa-location-dot form-icon text-danger-light"></span><input
                            class="form-control form-icon-input bg-transparent border-0 outline-none fs-8 fs-md-7 text-secondary-light"
                            type="text" placeholder="Search Destination" /></div>
                    <div class="dropdown d-flex align-items-center"><button
                            class="btn py-0 bg-transparent text-secondary-light fs-8 fs-md-7 fw-semibold border-0 border-start border-light rounded-0"
                            type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                            aria-expanded="false" data-bs-reference="parent">Flight<span
                                class="fa-solid fa-chevron-down ms-2"
                                data-fa-transform="down-1 shrink-4"></span></button>
                        <div class="dropdown-menu dropdown-menu-end" data-bs-theme="dark"><a class="dropdown-item"
                                href="#!">Flight</a><a class="dropdown-item" href="#!">Trip</a><a
                                class="dropdown-item" href="#!">Hotel</a></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="pt-6 pt-md-10 pb-10">
            <div class="container-medium">
                <div class="bg-holder d-none d-xl-block"
                    style="background-image:url(../../assets/img/bg/bg-left-27.png);background-size:auto;background-position:left;">
                </div>
                <!--/.bg-holder-->
                <div class="bg-holder d-none d-xl-block"
                    style="background-image:url(../../assets/img/bg/bg-right-27.png);background-size:auto;background-position:right;">
                </div>
                <!--/.bg-holder-->
                <div class="row g-3 position-relative">
                    <div class="col-lg-5">
                        {{-- <h2 class="fw-semibold mb-3">About</h4> --}}
                        <h2 class="fs-4 fw-semibold mb-3 mb-md-4">All India Council of <span
                                class="text-warning fw-bold ms-11 pt-4">Technical Education</span></h2>
                        <p class="mb-3 mb-md-0 text-body-tertiary">The beginning of formal technical education in India
                            can be dated back to the mid-19th century. Major policy initiatives in the pre-independence
                            period included the appointment of the Indian Universities Commission in 1902, issue of the
                            Indian Education Policy Resolution in 1904, and the Governor General’s policy statement of
                            1913 stressing the importance of technical education, the establishment of IISc in
                            Bangalore, Institute for Sugar, Textile & Leather Technology in Kanpur, N.C.E. in Bengal in
                            1905, and industrial schools in several provinces.
                        </p>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex flex-column gap-3 h-100">
                            <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a
                                    href="#!"> <img class="w-100 h-lg-100 object-fit-cover"
                                        src="../../assets/img/gallery/38.png" alt="" height="220" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-10 pt-0">
            <div class="bg-holder d-none d-md-block"
                style="background-image:url(../../assets/img/bg/bg-left-28.png);background-size:7%;background-position:left 27%;">
            </div>
            <!--/.bg-holder-->
            <div class="bg-holder d-none d-md-block"
                style="background-image:url(../../assets/img/bg/bg-right-28.png);background-size:16%;background-position:right -25px;">
            </div>
            <!--/.bg-holder-->
            <div class="container-medium text-center mb-11 position-relative">
                <h3 class="mb-2 text-body-emphasis">Travel more, spend less</h3>
                <p class="text-body-tertiary mb-0">Working with Phoenix means you’ll have all the plans and the perfect
                    price list to help you plan.</p>
            </div>
            <div class="container-fluid px-sm-0">
                <div class="swiper-theme-container swiper-slide-nav-top">
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right text-primary"
                                data-fa-transform="shrink-3"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left text-primary"
                                data-fa-transform="shrink-3"></span></div>
                    </div>
                    <div class="swiper theme-slider"
                        data-swiper='{"loop":true,"centeredSlides":true,"autoplay":true,"centeredSlidesBounds":true,"spaceBetween":16,"slidesPerView":1,"speed":1500,"breakpoints":{"576":{"slidesPerView":"auto"}}}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/39.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/thailand.png" alt="" />
                                            <h4 class="mb-0 text-white">Thailand</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/40.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">15 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">24 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/switzerland.png" alt="" />
                                            <h4 class="mb-0 text-white">Switzerland</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/42.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">44 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/turkey.png" alt="" />
                                            <h4 class="mb-0 text-white">Turkey</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/41.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">55 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">41 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/new-zealand.png" alt="" />
                                            <h4 class="mb-0 text-white">New Zealand</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/43.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/sweden.png" alt="" />
                                            <h4 class="mb-0 text-white">Sweden</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/44.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">44 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/turkey.png" alt="" />
                                            <h4 class="mb-0 text-white">Turkey</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/58.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">54 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/vietnam.png" alt="" />
                                            <h4 class="mb-0 text-white">Vietnam</h4>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="swiper-slide w-sm-auto"><a
                                    class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                        class="w-100 w-sm-auto object-fit-cover" src="../../assets/img/gallery/57.png"
                                        alt="" height="220" />
                                    <div class="img-backdrop-faded">
                                        <div class="image-reveal-content mb-3">
                                            <div class="d-flex align-items-center gap-2 mb-2"><span
                                                    class="fa-solid fa-hotel text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                                <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><img
                                                src="../../assets/img/country/japan.png" alt="" />
                                            <h4 class="mb-0 text-white">Japan</h4>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Approved Institutions --}}
        <section class="py-10 overflow-hidden">
            <div class="bg-holder d-none d-xl-block"
                style="background-image:url(../../assets/img/bg/bg-left-30.png);background-size:40%;background-position:left;z-index:1;">
            </div>
            <!--/.bg-holder-->
            <div class="bg-holder d-none d-xl-block"
                style="background-image:url(../../assets/img/bg/bg-right-30.png);background-size:26%;background-position:right 25px;z-index:1;">
            </div>
            <!--/.bg-holder-->
            <div class="bg-booking-gallery"></div>
            <div class="container-medium position-relative z-2">
                <h3 class="mb-2 text-body-emphasis text-center">Approved Institutions</h3>
                <p class="mb-0 text-body-tertiary text-center mb-5">Explore the most popular AICTE approved Technical
                    Institutions</p>
                <ul class="nav mb-6 justify-content-center flex-wrap mx-auto w-max-content"
                    data-filter-nav="data-filter-nav">
                    <li class="nav-item"><a class="isotope-nav cursor-pointer active"
                            data-filter=".karnataka">Karnataka</a>
                    </li>
                    <li class="nav-item"><a class="isotope-nav cursor-pointer"
                            data-filter=".maharashtra">Maharashtra</a></li>
                    <li class="nav-item"><a class="isotope-nav cursor-pointer" data-filter=".newDelhi">New Delhi</a>
                    </li>
                    <li class="nav-item"> <a class="isotope-nav cursor-pointer"
                            data-filter=".hyderabad">Hyderabad</a></li>
                </ul>
                <div class="row g-0 justify-content-center">
                    <div class="col-md-9 col-lg-7 col-xl-5">
                        <div class="row gx-0 gy-3" id="image_gallery"
                            data-sl-isotope='{"layoutMode":"packery","filter":".karnataka"}'>
                            <div class="col-12 isotope-item w-100 karnataka">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-1.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">King Power Mahanakhon</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.8<span class="fs-10">/5
                                            </span>(1.4k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 karnataka">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-2.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Meiji Jingu</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>5<span class="fs-10">/5
                                            </span>(2.2k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 karnataka">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-3.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Imperial Palace</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.5<span class="fs-10">/5
                                            </span>(1.2k review)</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 isotope-item w-100 maharashtra">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/bali-1.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Nusa Lembongan</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.7<span class="fs-10">/5
                                            </span>(1.2k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 maharashtra">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/bali-2.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Waterbom Bali</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.5<span class="fs-10">/5
                                            </span>(1.8k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 maharashtra">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/bali-3.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Kuta Beach</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>5<span class="fs-10">/5
                                            </span>(4.1k review)</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 isotope-item w-100 newDelhi">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-1.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">The Rocks</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.8<span class="fs-10">/5
                                            </span>(1.9k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 newDelhi">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-2.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Manly Beach</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.7<span class="fs-10">/5
                                            </span>(1.1k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 newDelhi">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-3.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Darling Harbour</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>5<span class="fs-10">/5
                                            </span>(3.2k review)</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 isotope-item w-100 hyderabad">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/paris-1.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Louvre Museum</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.4<span class="fs-10">/5
                                            </span>(4.3k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 hyderabad">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/paris-2.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Montmartre</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>5<span class="fs-10">/5
                                            </span>(5k review)</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 isotope-item w-100 hyderabad">
                                <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                            class="w-100 object-fit-cover" src="../../assets/img/gallery/paris-3.png"
                                            alt="" height="220" /></a><button
                                        class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                            class="far fa-heart"></span></button>
                                    <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                            href="#!">Tuileries Garden</a>
                                        <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                                data-fa-transform="shrink-2"></span>4.1<span class="fs-10">/5
                                            </span>(4.5k review)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
                    <h5 class="mb-0">Explore more popular destination</h5>
                    <div class="btn-ping">
                        <div class="btn-ping-bg"></div><button
                            class="btn border p-0 fs-8 text-primary d-flex align-items-center justify-content-center"><span
                                class="fa-solid fa-arrow-right"></span></button>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="pb-7 pt-0">
            <div class="container-medium">
                <div class="text-center mb-5">
                    <h3 class="mb-2 text-body-emphasis">Latest photos from FDP's</h3>
                    <p class="mb-0 text-body-tertiary">Teacher trainig workshop on technology enabled learning</p>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover"
                                    src="../../assets/img/gallery/FDP/51.png" alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Bali
                                    Indonesia</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover"
                                    src="../../assets/img/gallery/FDP/52.png" alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Barcelona</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover"
                                    src="../../assets/img/gallery/FDP/53.png" alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Bali
                                    Indonesia</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover"
                                    src="../../assets/img/gallery/FDP/54.png" alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Sydney</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover"
                                    src="../../assets/img/gallery/FDP/55.png" alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Great
                                    Barrier Reef</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                    class="latest-img w-100 object-fit-cover" src="../../assets/img/gallery/56.png"
                                    alt="" /></a>
                            <div class="backdrop-faded"><a
                                    class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                    href="#!"><span
                                        class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Grand
                                    Canyon</a></div>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- <section> begin ============================-->
        <section class="booking-footer pb-6 pb-md-11 pt-15">
            <div class="container-medium">
                <div class="row gy-3 justify-content-between align-items-center">
                    <div class="col-auto"><a href="#!"><img src="../../assets/img/icons/logo-1.png"
                                alt="" /></a></div>
                    <div class="col-auto">
                        <ul class="mb-0 list-unstyled d-flex flex-wrap">
                            <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">Home</a></li>
                            <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">About</a></li>
                            <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">Contact</a>
                            </li>
                            <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">FAQ</a></li>
                            <li><a class="fs-8 fw-bold text-white" href="#!">Gallery</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="row gy-3 justify-content-between">
                    <div class="col-auto"> <a class="text-white me-4" href="#!"><span
                                class="fa-brands fa-facebook-f"> </span></a><a class="text-white me-4"
                            href="#!"><span class="fa-brands fa-twitter"></span></a><a class="text-white me-4"
                            href="#!"><span class="fa-brands fa-linkedin-in"></span></a><a class="text-white"
                            href="#!"><span class="fa-brands fa-behance"></span></a></div>
                    <div class="col-auto">
                        <p class="mb-0 text-white">Thank you for creating with Phoenix | 2023 © <a class="text-white"
                                href="https://themewagon.com/">Themewagon</a></p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--    JavaScripts-->
    <script src="../../vendors/popper/popper.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../vendors/is/is.min.js"></script>
    <script src="../../vendors/fontawesome/all.min.js"></script>
    <script src="../../vendors/lodash/lodash.min.js"></script>
    <script src="../../vendors/list.js/list.min.js"></script>
    <script src="../../vendors/feather-icons/feather.min.js"></script>
    <script src="../../vendors/dayjs/dayjs.min.js"></script>
    <script src="../../assets/js/phoenix.js"></script>
    <script src="../../vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../../vendors/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="../../vendors/bigpicture/BigPicture.js"></script>
    <script src="../../vendors/typed.js/typed.umd.js"></script>
    <script src="../../vendors/swiper/swiper-bundle.min.js"></script>
</body>
</html>
