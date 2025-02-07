<!-- header-area-start -->
<header class="header header-2 sticky-active">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-inner">
                <div class="top-bar-left">
                    <ul class="top-bar-list">
                        <li><i class="fa-regular fa-phone"></i><a href="tel:256214203215">+91 901 9003 490</a></li>
                        <li><i class="fa-regular fa-location-dot"></i><span>A J Institute of Engineering and Technolgy, Mangalore</span></li>
                        <li><i class="fa-regular fa-clock"></i><span>Mon - Sat: 9:00 - 5:00</span></li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <div class="register-box">
                        <div class="icon"><i class="fa-regular fa-user"></i></div>
                        @auth
                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">/ Register</a>
                        @endguest
                    </div>
                    <div class="top-social-wrap">
                        <span>Follow Us</span>
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-discord"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="primary-header">
        <div class="container">
            <div class="primary-header-inner">
                <div class="header-logo d-lg-block">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('ui/assets/img/logo/logo-dark.png') }}" style="width: 300px; height: auto" alt="Logo">
                    </a>
                </div>
                <div class="header-right-wrap">
                    <div class="header-menu-wrap">
                        <div class="mobile-menu-items">
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('about') ? 'active' : '' }}">
                                    <a href="{{ route('about') }}">About Us</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('events') ? 'active' : '' }}">
                                    <a href="{{ route('events') }}">Events</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('gallery') ? 'active' : '' }}">
                                    <a href="{{ route('gallery') }}">Gallery</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('blogs') ? 'active' : '' }}">
                                    <a href="{{ route('blogs') }}">Blog</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.header-menu-wrap -->
                    <div class="header-right">
                        {{-- <div class="header-right-icon d-xl-block d-lg-none">
                            <a href="wishlist.html"><i class="fa-sharp fa-regular fa-heart"></i></a>
                            <span class="number">0</span>
                        </div>
                        <div class="header-right-icon shop-btn">
                            <a href="cart.html"><i class="fa-regular fa-cart-shopping"></i></a>
                            <span class="number">0</span>
                        </div> --}}
                        <a href="{{ route('contact') }}" class="ed-primary-btn header-btn">Get a quote <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        <div class="header-logo d-none d-lg-none">
                            <a href="index.html">
                                <img src="ui/assets/img/logo/logo-1.png" alt="Logo">
                            </a>
                        </div>
                        <div class="header-right-item d-lg-none d-md-block">
                            <a href="javascript:void(0)" class="mobile-side-menu-toggle"><i
                                    class="fa-sharp fa-solid fa-bars"></i></a>
                        </div>
                    </div>
                    <!-- /.header-right -->
                </div>
            </div>
            <!-- /.primary-header-inner -->
        </div>
    </div>
</header>
<!-- /.Main Header -->

<div id="popup-search-box">
    <div class="box-inner-wrap d-flex align-items-center">
        <form id="form" action="#" method="get" role="search">
            <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
        </form>
        <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
    </div>
</div>
<!-- /#popup-search-box -->

<div class="mobile-side-menu">
    <div class="side-menu-content">
        <div class="side-menu-head">
            <a href="{{ route('home') }}"><img src="{{ asset('ui/assets/img/logo/logo-dark.png') }}" alt="logo"></a>
            <button class="mobile-side-menu-close"><i class="fa-regular fa-xmark"></i></button>
        </div>
        <div class="side-menu-wrap"></div>
        <ul class="side-menu-list">
            <li><i class="fa-light fa-location-dot"></i>Address : <span>Amsterdam, 109-74</span></li>
            <li><i class="fa-light fa-phone"></i>Phone : <a href="tel:+01569896654">+01 569 896 654</a></li>
            <li><i class="fa-light fa-envelope"></i>Email : <a href="mailto:info@example.com">info@example.com</a>
            </li>
        </ul>
    </div>
</div>
<!-- /.mobile-side-menu -->
<div class="mobile-side-menu-overlay"></div>

<div id="preloader">
    <div class="spinner-logo"><img src="{{ asset('ui/assets/img/favicon.png') }}" alt="logo"></div>
    <div class="spinner"></div>
</div>
<!-- ./ preloader -->