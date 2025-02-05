@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="bg-item">
        {{-- <div class="bg-img" data-background="{{ asset('ui/assets/img/bg-img/page-header-bg.png') }}"></div> --}}
        <div class="overlay"></div>
        <div class="shapes">
            {{-- <div class="shape shape-1"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-1.png') }}"
                    alt="shape"></div> --}}
            <div class="shape shape-2"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-2.png') }}"
                    alt="shape"></div>
            <div class="shape shape-3"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-3.png') }}"
                    alt="shape"></div>
        </div>
    </div>
    <div class="container">
        <div class="page-header-content">
            <h1 class="title">About Us</h1>
            <h4 class="sub-title"><a class="home" href="{{ route('home') }}">Home </a><span class="icon">/</span>
                <a class="inner-page" href="{{ route('about') }}"> About Us</a>
            </h4>
        </div>
    </div>
</section>
<!-- ./ page-header -->

<section class="about-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="about-img-wrap wow fade-in-left" data-wow-delay="400ms">
                    <div class="about-img-1">
                        <img src="{{ asset('ui/assets/img/images/about-img-1.jpg') }}" alt="about">
                        <div class="video-btn">
                            <a class="video-popup venobox" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/JwC-Qx1lJso">
                                <div class="play-btn">
                                    <i class="fa-sharp fa-solid fa-play"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="about-img-2">
                        <img src="{{ asset('ui/assets/img/images/about-img-2.jpg') }}" alt="about">
                    </div>
                    <div class="about-contact">
                        <div class="icon"><i class="fa-sharp fa-regular fa-phone-volume"></i></div>
                        <div class="content">
                            <span>Online Support</span>
                            <a href="tel:+919019003490">9019003490</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="about-content">
                    <div class="section-heading mb-40">
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                    class="fa-sharp fa-solid fa-bolt"></i></span>Get More About Us</h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">AICTE - Shaping Future
                            Engineers</h2>
                        <p class="mt-10 wow fade-in-bottom" data-wow-delay="500ms">The All India Council for Technical
                            Education (AICTE) plays a pivotal role in regulating and elevating technical education
                            across India. As part of this mission, AICTE requires students to earn Activity Points
                            alongside their academic achievements to ensure holistic development. This system fosters
                            skills such as leadership, teamwork, social responsibility, and communication, preparing
                            students to become well-rounded professionals.</p>
                    </div>
                    <div class="about-counter-items wow fade-in-bottom" data-wow-delay="600ms">
                        <div class="about-counter-item">
                            <div class="icon"><img src="{{ asset('ui/assets/img/icon/about-1.png') }}" alt="about">
                            </div>
                            <div class="content">
                                <h3 class="title"><span class="odometer" data-count="9.5">0</span><span
                                        class="number">k+</span></h3>
                                <p>Total affiliated institutions</p>
                            </div>
                        </div>
                        <div class="about-counter-item">
                            <div class="icon"><img src="{{ asset('ui/assets/img/icon/about-2.png') }}" alt="about">
                            </div>
                            <div class="content">
                                <h3 class="title"><span class="odometer" data-count="6.7">0</span><span
                                        class="number">k+</span></h3>
                                <p>Total active students</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-btn wow fade-in-bottom" data-wow-delay="700ms">
                        <a href="{{ route('register') }}" class="ed-primary-btn">Join Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ about-section -->

<section class="about-feature pt-120 pb-120">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                        class="fa-sharp fa-solid fa-bolt"></i></span>Our Features</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Online Education That Improves You</h2>
        </div>
        <div class="row gy-lg-0 gy-5">
            <div class="col-lg-4 col-md-6">
                <div class="about-feature-card">
                    <div class="icon"><img src="{{ asset('ui/assets/img/icon/about-feature-1.png') }}" alt="icon">
                    </div>
                    <div class="content">
                        <h3 class="title">Role-Based Access</h3>
                        <p>Customized interfaces for Principal, HOD, Faculty and Student ensuring efficient management
                            of tasks and data.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="about-feature-card">
                    <div class="icon"><img src="{{ asset('ui/assets/img/icon/about-feature-1.png') }}" alt="icon"></div>
                    <div class="content">
                        <h3 class="title">Streamlined Verification Process</h3>
                        <p>Faculty coordinators can easily verify and approve students' activities, reducing the
                            administrative burden.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="about-feature-card">
                    <div class="icon"><img src="{{ asset('ui/assets/img/icon/about-feature-1.png') }}" alt="icon"></div>
                    <div class="content">
                        <h3 class="title">Easy Tracking of Activity Points</h3>
                        <p>Students can track their progress, see completed activities, and ensure they meet the minimum
                            required points for graduation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ about-feature -->

<section class="counter-section">
    <div class="container">
        <div class="row counter-wrap gy-lg-0 gy-5">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item item-1 white-content">
                    <h3 class="title"><span class="odometer" data-count="3,192">0</span>+</h3>
                    <p>Successflly Trained</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item white-content">
                    <h3 class="title"><span class="odometer" data-count="15,485">0</span>+</h3>
                    <p>Courses Completed</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item white-content">
                    <h3 class="title"><span class="odometer" data-count="97.55">0</span>%</h3>
                    <p>Hackathons</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item item-4 white-content">
                    <h3 class="title"><span class="odometer" data-count="97.55">0</span>%</h3>
                    <p>Webinars</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ counter-section -->

<section class="team-section pt-120 pb-120">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                        class="fa-sharp fa-solid fa-bolt"></i></span>Our Council</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Meet Our Council Members</h2>
        </div>
        <div class="row gy-lg-0 gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-item-3 team-item-5">
                    <div class="team-thumb">
                        <div class="shape"><img src="{{ asset('ui/assets/img/shapes/team-shape-3.png') }}" alt="team">
                        </div>
                        <div class="team-men">
                            <img src="{{ asset('ui/assets/img/team/team-men-1.png') }}" alt="team">
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="title"><a href="team-details.html">Mason D. Logan</a></h3>
                        <span>IT Trainier</span>
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item-3 team-item-5">
                    <div class="team-thumb">
                        <div class="shape"><img src="{{ asset('ui/assets/img/shapes/team-shape-3.png') }}" alt="team">
                        </div>
                        <div class="team-men">
                            <img src="{{ asset('ui/assets/img/team/team-men-2.png') }}" alt="team">
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="title"><a href="team-details.html">Scarlett Hannah</a></h3>
                        <span>IT Trainier</span>
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item-3 team-item-5">
                    <div class="team-thumb">
                        <div class="shape"><img src="{{ asset('ui/assets/img/shapes/team-shape-3.png') }}" alt="team">
                        </div>
                        <div class="team-men">
                            <img src="{{ asset('ui/assets/img/team/team-men-3.png') }}" alt="team">
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="title"><a href="team-details.html">Chloe Smith</a></h3>
                        <span>IT Trainier</span>
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item-3 team-item-5">
                    <div class="team-thumb">
                        <div class="shape"><img src="{{ asset('ui/assets/img/shapes/team-shape-3.png') }}" alt="team">
                        </div>
                        <div class="team-men">
                            <img src="{{ asset('ui/assets/img/team/team-men-4.png') }}" alt="team">
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="title"><a href="team-details.html">Madison Chloe</a></h3>
                        <span>IT Trainier</span>
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ team-section -->

<section class="testimonial-section-3 pt-120 pb-120">
    <div class="shapes">
        <div class="shape shape-1"><img src="{{ asset('ui/assets/img/shapes/testi-shape-3.png') }}" alt="shape">
        </div>
        <div class="shape shape-2"><img src="{{ asset('ui/assets/img/shapes/testi-shape-4.png') }}" alt="shape">
        </div>
    </div>
    <div class="container">
        <div class="row gy-xl-0 gy-5 align-items-center">
            <div class="col-xl-5 col-lg-12">
                <div class="testi-left-content white-content">
                    <div class="section-heading mb-20 white-content">
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                    class="fa-sharp fa-solid fa-bolt"></i></span>Our Testimonials
                        </h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">What Students Think and
                            <br>Say About Manthan
                        </h2>
                    </div>
                    <p class="mb-0 wow fade-in-bottom" data-wow-delay="500ms">Empowering businesses with cutting-edge
                        technology, reliable support, <br> and seamless integration.</p>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                @if (!$testimonials->isEmpty())
                <div class="testi-carousel-wrap-2">
                    <div class="testi-carousel-2 swiper">
                        <div class="swiper-wrapper">
                            
                            @foreach ($testimonials as $item)
                            <div class="swiper-slide">
                                <div class="testi-item-3">
                                    <h3 class="title">{{ $item->title }}</h3>
                                    <p>"{{ $item->testimonial }}”</p>
                                    <div class="testi-author">
                                        <div class="testi-author-img">
                                            <img src="{{ Storage::url($item->user->image) }}" alt="testi">
                                        </div>
                                        <h4 class="name">{{ $item->user->name }} <span> {{ $item->user->role }}</span></h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-arrow">
                        <div class="swiper-nav swiper-next"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="swiper-nav swiper-prev"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- ./ testimonial-section -->

<section class="video-feature-section pt-120 pb-120">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                        class="fa-sharp fa-solid fa-bolt"></i></span>Our Features</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Founded by Industry Leaders With
                <br>Large Scale Business
            </h2>
        </div>
        <div class="row gy-md-0 gy-4">
            <div class="col-md-6">
                <div class="video-feature text-center">
                    <div class="video-thumb">
                        <img src="{{ asset('ui/assets/img/images/video-img-1.png') }}" alt="video">
                        <div class="video-btn">
                            <a class="video-popup venobox" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/JwC-Qx1lJso?feature=shared">
                                <div class="play-btn">
                                    <i class="fa-sharp fa-solid fa-play"></i>
                                </div>
                                <div class="ripple"></div>
                            </a>
                        </div>
                    </div>
                    <div class="video-content">
                        <h3 class="title">Career Opportunities in EdCare</h3>
                        <p>Appropriately recaptiualize cooperative catalysts change through <br> prospective leadership
                            nvisioneer goal-oriented</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video-feature text-center">
                    <div class="video-thumb">
                        <img src="{{ asset('ui/assets/img/images/video-img-2.png') }}" alt="video">
                        <div class="video-btn">
                            <a class="video-popup venobox" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/JwC-Qx1lJso?feature=shared">
                                <div class="play-btn">
                                    <i class="fa-sharp fa-solid fa-play"></i>
                                </div>
                                <div class="ripple"></div>
                            </a>
                        </div>
                    </div>
                    <div class="video-content">
                        <h3 class="title">Become A Partner Of EdCare</h3>
                        <p>Appropriately recaptiualize cooperative catalysts change through <br> prospective leadership
                            nvisioneer goal-oriented</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ video-section -->
@endsection