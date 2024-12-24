@extends('layouts.app')

@section('content')
    <section class="hero-section-2 overflow-hidden">
        <div class="hero-bg-wrap">
            <div class="hero-bg"><img src="ui/assets/img/bg-img/hero-bg.png" alt="hero"></div>
            <div class="hero-bg-shape"><img src="ui/assets/img/shapes/hero-bg-shape.png" alt="hero"></div>
            <div class="faq-text-box">
                <h4 class="student">Instructor</h4>
                <div class="faq-thumb-list-wrap">
                    <ul class="faq-thumb-list">
                        <li><img src="ui/assets/img/images/faq-thumb-1.png" alt="faq"></li>
                        <li><img src="ui/assets/img/images/faq-thumb-2.png" alt="faq"></li>
                        <li><img src="ui/assets/img/images/faq-thumb-3.png" alt="faq"></li>
                        <li><img src="ui/assets/img/images/faq-thumb-4.png" alt="faq"></li>
                        <li><img src="ui/assets/img/images/faq-thumb-5.png" alt="faq"></li>
                        <li class="number">+</li>
                    </ul>
                    <p><span>200+</span> <br>Instuctors</p>
                </div>
            </div>
            <div class="hero-text-box">
                <div class="icon"><i class="fa-solid fa-user"></i></div>
                <div class="content">
                    <h5 class="text-title">150K</h5>
                    <span>Assisted Students</span>
                </div>
            </div>
        </div>
        <div class="shapes">
            <div class="shape shape-1"><img src="ui/assets/img/shapes/hero-shape-11.png" alt="shape"></div>
            <div class="shape shape-2"><img src="ui/assets/img/shapes/hero-shape-12.png" alt="shape"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="hero-content-2">
                        <div class="section-heading mb-20">
                            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                        class="fa-sharp fa-solid fa-bolt"></i></span>Welcome to
                                Manthan - AICTE Activity/Event Management System </h4>
                            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Empowering Technical
                                Education,
                                <br<span>Enhancing Growth</span>
                            </h2>
                        </div>
                        <p class="desc">This system fosters skills such as leadership, teamwork, social responsibility,
                            and communication,
                            <br> preparing students to become well-rounded professionals.
                        </p>
                        <div class="hero-form">
                            <form action="/">
                                <input type="text" id="text" name="text" class="form-control"
                                    placeholder="What do you want to explore today?">
                            </form>
                            <button class="ed-primary-btn">Search Now <i class="fa-regular fa-arrow-right"></i></button>
                            <div class="icon"><i class="fa-regular fa-magnifying-glass"></i></div>
                        </div>
                        <div class="about-counter-items mb-0 wow fade-in-bottom" data-wow-delay="600ms">
                            <div class="about-counter-item">
                                <div class="icon"><img src="ui/assets/img/icon/about-1.png" alt="about"></div>
                                <div class="content">
                                    <h3 class="title"><span class="odometer" data-count="9.5">0</span><span
                                            class="number">K+</span></h3>
                                    <p>Total active faculties taking <br>benefits</p>
                                </div>
                            </div>
                            <div class="about-counter-item">
                                <div class="icon"><img src="ui/assets/img/icon/about-2.png" alt="about"></div>
                                <div class="content">
                                    <h3 class="title"><span class="odometer" data-count="15.5">0</span><span
                                            class="number">K+</span></h3>
                                    <p>Total active students taking <br>benefitted courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ hero-section -->

    <section class="course-section bg-grey pt-120 pb-120">
        <div class="shapes">
            <div class="shape shape-1"><img src="ui/assets/img/shapes/feature-shape-3.png" alt="shape"></div>
            <div class="shape shape-2"><img src="ui/assets/img/shapes/feature-shape-4.png" alt="shape"></div>
        </div>
        <div class="container">
            <div class="course-top heading-space align-items-end">
                <div class="section-heading mb-0">
                    <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                class="fa-sharp fa-solid fa-bolt"></i></span>Trending Events</h4>
                    <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Latest Events</h2>
                </div>
                <div class="course-top-right wow fade-in-bottom" data-wow-delay="300ms">
                    <a href="{{ route('events') }}" class="ed-primary-btn">Browse All Events <i
                            class="fa-regular fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($events as $event)
                    <div class="col-xl-6 col-lg-12">
                        <div class="course-item course-item-2 wow fade-in-bottom" data-wow-delay="300ms">
                            <div class="course-thumb-wrap">
                                <div class="course-thumb">
                                    <img src="{{ Storage::url($event->banner) }}" alt="course">
                                </div>
                            </div>
                            <div class="course-content-wrap">
                                <div class="course-content">
                                    <span class="offer">Free</span>
                                    <h3 class="title"><a href="/">{{ $event->name }}</a></h3>
                                    <ul class="course-list">
                                        <li><i class="fa-light fa-file"></i>{{ $event->duration }}</li>
                                        <li><i class="fa-light fa-user"></i>{{ $event->type }}</li>
                                        <li><i class="fa-light fa-eye"></i>{{ $event->fees }}</li>
                                    </ul>
                                    <div class="course-author-box">
                                        @if ($event->speakers->isNotEmpty())
                                            @php
                                                $speaker = $event->speakers->first();
                                            @endphp
                                            <div class="course-author">
                                                <div class="author-img">
                                                    <img src="{{ Storage::url($speaker->image) }}" alt="course">
                                                </div>
                                                <div class="author-info">
                                                    <h4 class="name">{{ $speaker->name }}</h4>
                                                    <span>{{ $speaker->designation }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <ul class="course-review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li class="point">(4.7)</li>
                                </ul> --}}
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <span class="price"> ₹ {{ $event->fees }}</span>
                                    <a href="{{ route('events.show', $event->id) }}" class="course-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./ course-section -->

    <section class="feature-section pt-120">
        <div class="feature-wrap pt-120 pb-120">
            <div class="container">
                <div class="course-top heading-space align-items-end white-content">
                    <div class="section-heading mb-0">
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                    class="fa-sharp fa-solid fa-bolt"></i></span>Our Events</h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Event Types</h2>
                    </div>
                    <div class="course-top-right wow fade-in-bottom" data-wow-delay="300ms">
                        <a href="{{ route('events') }}" class="ed-primary-btn">Browse All Events <i
                                class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row gy-xl-0 gy-4 justify-content-center">
                    @foreach ($eventTypes as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="feature-item text-center wow fade-in-bottom" data-wow-delay="200ms">
                                <div class="icon"><img src="ui/assets/img/icon/feature-1.png" alt="feature"></div>
                                <h3 class="title">{{ $item }}</h3>
                                <a href="{{ route('events') }}" class="feature-btn"><i
                                        class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ./ feature-section -->

    <section class="feature-course bg-white pt-120 pb-120">
        <div class="container">
            <div class="section-heading text-center">
                <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                            class="fa-sharp fa-solid fa-bolt"></i></span>Top Class Events</h4>
                <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Explore Featured Events</h2>
            </div>
            <div class="row gy-xl-0 gy-4 justify-content-center">
                @foreach ($events->where('is_featured', true)->take(3) as $event)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="course-item wow fade-in-bottom" data-wow-delay="200ms">
                            <div class="course-thumb-wrap">
                                <div class="course-thumb">
                                    <img src="{{ Storage::url($event->banner) }}" alt="{{ $event->name }}">
                                </div>
                            </div>
                            <div class="course-content">
                                <span class="offer">Free</span>
                                <h3 class="title"><a href="/">{{ $event->name }}</a></h3>
                                <ul class="course-list">
                                    <li><i class="fa-light fa-file"></i>{{ $event->duration }}</li>
                                    <li><i class="fa-light fa-user"></i>{{ $event->type }}</li>
                                    <li><i class="fa-light fa-eye"></i>{{ $event->fees }}</li>
                                </ul>
                                <div class="course-author-box">
                                    @if ($event->speakers->isNotEmpty())
                                        @php
                                            $speaker = $event->speakers->first();
                                        @endphp
                                        <div class="course-author">
                                            <div class="author-img">
                                                <img src="{{ Storage::url($speaker->image) }}" alt="course">
                                            </div>
                                            <div class="author-info">
                                                <h4 class="name">{{ $speaker->name }}</h4>
                                                <span>{{ $speaker->designation }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <ul class="course-review">
                                        <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        <li class="point">(4.7)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <span class="price"> ₹ {{ $event->fees }}</span>
                                <a href="{{ route('events.show', $event->id) }}" class="course-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./ course-section -->

    <section class="cta-section pt-140 pb-140">
        <div class="cta-bg-img"><img src="ui/assets/img/bg-img/cta-bg-img.png" alt="cta"></div>
        <div class="shapes">
            <div class="shape-1"><img src="ui/assets/img/shapes/dot-shape.png" alt="shape"></div>
            <div class="shape-2"><img src="ui/assets/img/shapes/cta-shape-2.png" alt="shape"></div>
        </div>
        <div class="container">
            <div class="cta-content">
                <h2 class="title wow fade-in-bottom" data-wow-delay="200ms">Join Us in Revolutionizing Technical Education
                </h2>
                <p class="wow fade-in-bottom" data-wow-delay="400ms">With this platform, we aim to empower students,
                    faculty, and institutions to contribute effectively to the national vision of well-rounded technical
                    professionals. Together, we can bring about a significant shift in how Activity Points are managed and
                    ensure that every student maximizes their potential beyond academics.</p>
                <div class="cta-btn-wrap wow fade-in-bottom" data-wow-delay="500ms">
                    <a href="contact.html" class="ed-primary-btn cta-btn">Login<i
                            class="fa-regular fa-arrow-right"></i></a>
                    <a href="contact.html" class="ed-primary-btn cta-btn-2">Register<i
                            class="fa-regular fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->

    <section class="faq-section pt-120 pb-120 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="faq-img-wrap-2 wow fade-in-left" data-wow-delay="400ms">
                        <div class="faq-img-1"><img src="ui/assets/img/images/faq-img-2.png" alt="faq"></div>
                        <div class="faq-img-2"><img src="ui/assets/img/images/faq-img-3.png" alt="faq"></div>
                        <div class="faq-img-3"><img src="ui/assets/img/images/faq-img-4.png" alt="faq"></div>
                        <div class="faq-text-box">
                            <h4 class="student">Instructor</h4>
                            <div class="faq-thumb-list-wrap">
                                <ul class="faq-thumb-list">
                                    <li><img src="ui/assets/img/images/faq-thumb-1.png" alt="faq"></li>
                                    <li><img src="ui/assets/img/images/faq-thumb-2.png" alt="faq"></li>
                                    <li><img src="ui/assets/img/images/faq-thumb-3.png" alt="faq"></li>
                                    <li><img src="ui/assets/img/images/faq-thumb-4.png" alt="faq"></li>
                                    <li class="number">25+</li>
                                </ul>
                                <p><span>200+</span> <br>Instuctor</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="faq-content">
                        <div class="section-heading mb-30">
                            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span
                                    class="heading-icon"><i class="fa-sharp fa-solid fa-bolt"></i></span>Our Course
                                Categories</h4>
                            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Shaping Future Engineers</h2>
                        </div>
                        <div class="faq-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item wow fade-in-bottom" data-wow-delay="400ms">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne"><span>01.</span>Easy Tracking of Activity
                                            Points</button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Students can track their progress, see completed activities, and ensure they
                                            meet the minimum required points for graduation.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo"><span>02.</span>Streamlined Verification
                                            Process</button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Faculty coordinators can easily verify and approve students' activities,
                                            reducing the administrative burden.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree"><span>03.</span>Effective
                                            Communication of AICTE Programs</button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Stay up-to-date with the latest AICTE development programs like the Faculty
                                            Development Program (FDP) and student workshops. Real-time notifications will
                                            help you never miss an opportunity!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree"><span>04.</span>Program
                                            Registration</button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Register for AICTE Faculty Development Programs (FDPs) and student workshops
                                            with ease.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ./ faq-section -->

    <section class="team-section pb-120">
        <div class="container">
            <div class="team-top heading-space">
                <div class="section-heading mb-0">
                    <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                class="fa-sharp fa-solid fa-bolt"></i></span>Our Instructors</h4>
                    <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Meet Our Expert Instructor</h2>
                </div>
                <div class="team-top-btn">
                    <a href="{{ route('contact') }}" class="ed-primary-btn">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="team-container">
            <div class="row gy-xl-0 gy-4 justify-content-center">
                @foreach ($colleges as $college)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-item-2 wow fade-in-bottom" data-wow-delay="200ms">
                        <div class="team-thumb">
                            <img src="{{ Storage::url($college->logo) }}" alt="{{ $college->name }}">
                            <div class="team-content">
                                <div class="instructor-info">
                                    <h3 class="title">{{ $college->name }}</h3>
                                    <span>{{ $college->college_code }}</span>
                                </div>
                                <div class="team-social">
                                    <div class="expand">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                    <ul class="social-list">
                                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./ team-section -->

    <section class="testimonial-section pt-120 pb-120">
        <div class="shapes">
            <div class="shape-1"><img src="ui/assets/img/shapes/testi-shape-1.png" alt="testi"></div>
            <div class="shape-2"><img src="ui/assets/img/shapes/testi-shape-2.png" alt="testi"></div>
        </div>
        <div class="container">
            <div class="section-heading white-content text-center">
                <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                            class="fa-sharp fa-solid fa-bolt"></i></span>Our Testimonials</h4>
                <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">What Users Think and Say About Manthan
                </h2>
            </div>
            <div class="testi-carousel-3 swiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testi-item">
                                <h3 class="title">{{ $testimonial->title }}</h3>
                                <p>"{{ $testimonial->testimonial }}”</p>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="{{ Storage::url($testimonial->user->image) }}"
                                            alt="{{ $testimonial->user->name }}">
                                    </div>
                                    <h4 class="name">{{ $testimonial->user->name }}
                                        <span>{{ $testimonial->user->role }}</span></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ./ testimonial-section -->

    <section class="blog-section pt-120 pb-120">
        <div class="container">
            <div class="section-heading text-center">
                <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                            class="fa-sharp fa-solid fa-bolt"></i></span>News & Blogs</h4>
                <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Latest News Updates</h2>
            </div>
            <div class="row gy-lg-0 gy-4 justify-content-center post-card-2-wrap">
                @foreach ($posts as $post)
                    <div class="col-lg-12 col-md-6">
                        <div class="post-card-2 wow fade-in-bottom" data-wow-delay="200ms">
                            <div class="post-thumb">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                            </div>
                            <div class="post-content-wrap">
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li><i
                                                class="fa-sharp fa-regular fa-clock"></i>{{ $post->created_at->format('F, d') }}
                                        </li>
                                        <li><i class="fa-sharp fa-regular fa-folder"></i>{{ $post->category->name }}</li>
                                    </ul>
                                    <h3 class="title"><a
                                            href="{{ route('blogs.show', $post->id) }}">{{ $post->title }}</a></h3>
                                    <p>{{ \Illuminate\Support\Str::words($post->content, 100, '...') }}</p>
                                    <a href="{{ route('blogs.show', $post->id) }}" class="ed-primary-btn">Read More <i
                                            class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./ blog-section -->
@endsection
