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
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Start benefiting from the
                            <br>world's <span>best tech council</span>
                        </h2>
                    </div>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                        <br> nec ullamcorper mattis
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
                <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Featured Events</h2>
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
                    <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Featured Events</h2>
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
                        class="fa-sharp fa-solid fa-bolt"></i></span>Top Class Courses</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Explore Featured Courses</h2>
        </div>
        <div class="row gy-xl-0 gy-4 justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="course-item wow fade-in-bottom" data-wow-delay="200ms">
                    <div class="course-thumb-wrap">
                        <div class="course-thumb">
                            <img src="ui/assets/img/images/course-img-1.png" alt="course">
                        </div>
                    </div>
                    <div class="course-content">
                        <span class="offer">Free</span>
                        <h3 class="title"><a href="/">React Tutorial Beginners For Skills Building
                                Carrera</a></h3>
                        <ul class="course-list">
                            <li><i class="fa-light fa-file"></i>Lesson 8</li>
                            <li><i class="fa-light fa-user"></i>Students 50</li>
                            <li><i class="fa-light fa-eye"></i>View: 12K</li>
                        </ul>
                        <div class="course-author-box">
                            <div class="course-author">
                                <div class="author-img">
                                    <img src="ui/assets/img/images/course-author-1.png" alt="course">
                                </div>
                                <div class="author-info">
                                    <h4 class="name">Kevin Perry</h4>
                                    <span>Instructor</span>
                                </div>
                            </div>
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
                        <span class="price">₹59.00</span>
                        <a href="/" class="course-btn">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="course-item wow fade-in-bottom" data-wow-delay="400ms">
                    <div class="course-thumb-wrap">
                        <div class="course-thumb">
                            <img src="ui/assets/img/images/course-img-2.png" alt="course">
                        </div>
                    </div>
                    <div class="course-content">
                        <span class="offer">Free</span>
                        <h3 class="title"><a href="/">Cultural Perspectives in Teaching <br>and
                                Learning Environments</a></h3>
                        <ul class="course-list">
                            <li><i class="fa-light fa-file"></i>Lesson 8</li>
                            <li><i class="fa-light fa-user"></i>Students 50</li>
                            <li><i class="fa-light fa-eye"></i>View: 12K</li>
                        </ul>
                        <div class="course-author-box">
                            <div class="course-author">
                                <div class="author-img">
                                    <img src="ui/assets/img/images/course-author-2.png" alt="course">
                                </div>
                                <div class="author-info">
                                    <h4 class="name">Kevin Perry</h4>
                                    <span>Instructor</span>
                                </div>
                            </div>
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
                        <span class="price">₹59.00</span>
                        <a href="/" class="course-btn">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="course-item wow fade-in-bottom" data-wow-delay="500ms">
                    <div class="course-thumb-wrap">
                        <div class="course-thumb">
                            <img src="ui/assets/img/images/course-img-3.png" alt="course">
                        </div>
                    </div>
                    <div class="course-content">
                        <span class="offer">Free</span>
                        <h3 class="title"><a href="/">Innovative Instructional Strategies <br>for
                                Enhancing Student</a></h3>
                        <ul class="course-list">
                            <li><i class="fa-light fa-file"></i>Lesson 8</li>
                            <li><i class="fa-light fa-user"></i>Students 50</li>
                            <li><i class="fa-light fa-eye"></i>View: 12K</li>
                        </ul>
                        <div class="course-author-box">
                            <div class="course-author">
                                <div class="author-img">
                                    <img src="ui/assets/img/images/course-author-3.png" alt="course">
                                </div>
                                <div class="author-info">
                                    <h4 class="name">Kevin Perry</h4>
                                    <span>Instructor</span>
                                </div>
                            </div>
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
                        <span class="price">₹59.00</span>
                        <a href="/" class="course-btn">View Details</a>
                    </div>
                </div>
            </div>
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
            <h2 class="title wow fade-in-bottom" data-wow-delay="200ms">50% Offer For Very First 50 Student’s &
                Mentors</h2>
            <p class="wow fade-in-bottom" data-wow-delay="400ms">The ability to learn at my own pace was a
                game-changer for me. The flexible schedule allowed me to balance my studies with work and personal
                life, making it possible to complete the course without feeling overwhelmed."</p>
            <div class="cta-btn-wrap wow fade-in-bottom" data-wow-delay="500ms">
                <a href="contact.html" class="ed-primary-btn cta-btn">Become a Student<i
                        class="fa-regular fa-arrow-right"></i></a>
                <a href="contact.html" class="ed-primary-btn cta-btn-2">Become a Teacher<i
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
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                    class="fa-sharp fa-solid fa-bolt"></i></span>Our Course
                            Categories</h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">Powerful Dashboard And
                            High Performance Framework</h2>
                    </div>
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item wow fade-in-bottom" data-wow-delay="400ms">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne"><span>01.</span>What courses do you
                                        offer?</button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We offer a wide range of courses in various subjects, including science,
                                        technology, engineering, mathematics, humanities, and social sciences. Our
                                        courses are designed for different education levels, from primary school to
                                        university.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo"><span>02.</span>How Can
                                        Teachers Effectively Manage a Diverse Classroom?</button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We offer a wide range of courses in various subjects, including science,
                                        technology, engineering, mathematics, humanities, and social sciences. Our
                                        courses are designed for different education levels, from primary school to
                                        university.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree"><span>03.</span>How Is
                                        Special Education Delivered in Inclusive Classrooms?</button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We offer a wide range of courses in various subjects, including science,
                                        technology, engineering, mathematics, humanities, and social sciences. Our
                                        courses are designed for different education levels, from primary school to
                                        university.
                                    </div>
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
                <a href="contact.html" class="ed-primary-btn">Contact Us</a>
            </div>
        </div>
    </div>
    <div class="team-container">
        <div class="row gy-xl-0 gy-4 justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="team-item-2 wow fade-in-bottom" data-wow-delay="200ms">
                    <div class="team-thumb">
                        <img src="ui/assets/img/team/team-5.png" alt="team">
                        <div class="team-content">
                            <div class="instructor-info">
                                <h3 class="title"><a href="teachers.html">William Samuel</a></h3>
                                <span>Instructor</span>
                            </div>
                            <div class="team-social">
                                <div class="expand">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </div>
                                <ul class="social-list">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="team-item-2 wow fade-in-bottom" data-wow-delay="400ms">
                    <div class="team-thumb">
                        <img src="ui/assets/img/team/team-6.png" alt="team">
                        <div class="team-content">
                            <div class="instructor-info">
                                <h3 class="title"><a href="teachers.html">Olivia Sophia</a></h3>
                                <span>Instructor</span>
                            </div>
                            <div class="team-social">
                                <div class="expand">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </div>
                                <ul class="social-list">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="team-item-2 wow fade-in-bottom" data-wow-delay="500ms">
                    <div class="team-thumb">
                        <img src="ui/assets/img/team/team-7.png" alt="team">
                        <div class="team-content">
                            <div class="instructor-info">
                                <h3 class="title"><a href="teachers.html">Jacob Mason</a></h3>
                                <span>Instructor</span>
                            </div>
                            <div class="team-social">
                                <div class="expand">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </div>
                                <ul class="social-list">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="team-item-2 wow fade-in-bottom" data-wow-delay="600ms">
                    <div class="team-thumb">
                        <img src="ui/assets/img/team/team-8.png" alt="team">
                        <div class="team-content">
                            <div class="instructor-info">
                                <h3 class="title"><a href="teachers.html">Isabella Grace</a></h3>
                                <span>Instructor</span>
                            </div>
                            <div class="team-social">
                                <div class="expand">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </div>
                                <ul class="social-list">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">What Students Think and Say About
                EdCare</h2>
        </div>
        <div class="testi-carousel-3 swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testi-item">
                        <h3 class="title">Interactive Learning Experience</h3>
                        <p>"I've been thoroughly impressed with how engaging and interactive the courses are on this
                            platform. The use of multimedia, quizzes, and live sessions makes learning enjoyable and
                            keeps me motivated.”</p>
                        <div class="testi-author">
                            <div class="author-img">
                                <img src="ui/assets/img/images/testi-author-1.png" alt="testi">
                            </div>
                            <h4 class="name">Markus Adina <span>Writer</span></h4>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testi-item">
                        <h3 class="title">Exceptional Instructor Support</h3>
                        <p>"I've been thoroughly impressed with how engaging and interactive the courses are on this
                            platform. The use of multimedia, quizzes, and live sessions makes learning enjoyable and
                            keeps me motivated.”</p>
                        <div class="testi-author">
                            <div class="author-img">
                                <img src="ui/assets/img/images/testi-author-2.png" alt="testi">
                            </div>
                            <h4 class="name">Markus Adina <span>Writer</span></h4>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testi-item">
                        <h3 class="title">Need Personalized Learning</h3>
                        <p>"I've been thoroughly impressed with how engaging and interactive the courses are on this
                            platform. The use of multimedia, quizzes, and live sessions makes learning enjoyable and
                            keeps me motivated.”</p>
                        <div class="testi-author">
                            <div class="author-img">
                                <img src="ui/assets/img/images/testi-author-4.png" alt="testi">
                            </div>
                            <h4 class="name">Markus Adina <span>Writer</span></h4>
                        </div>
                    </div>
                </div>
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
            <div class="col-lg-12 col-md-6">
                <div class="post-card-2 wow fade-in-bottom" data-wow-delay="200ms">
                    <div class="post-thumb">
                        <img src="ui/assets/img/blog/post-4.png" alt="post">
                    </div>
                    <div class="post-content-wrap">
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-sharp fa-regular fa-clock"></i>August 15, 2024</li>
                                <li><i class="fa-sharp fa-regular fa-folder"></i>Marketing</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">Repurpose mission critical action life
                                    items rather total</a></h3>
                            <p>we understand the importance of preparing students for the real world curriculum is
                                <br> designed strong emphasis on practical skills and real-world applications. By
                                integrating <br> project-based learning, internships, and industry partnerships,
                            </p>
                            <a href="blog-details.html" class="ed-primary-btn">Read More <i
                                    class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="post-card-2 wow fade-in-bottom" data-wow-delay="400ms">
                    <div class="post-thumb">
                        <img src="ui/assets/img/blog/post-5.png" alt="post">
                    </div>
                    <div class="post-content-wrap">
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-sharp fa-regular fa-clock"></i>August 15, 2024</li>
                                <li><i class="fa-sharp fa-regular fa-folder"></i>Marketing</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">Transforming Traditional Classrooms for
                                    21st-Century Learners</a></h3>
                            <p>we understand the importance of preparing students for the real world curriculum is
                                <br> designed strong emphasis on practical skills and real-world applications. By
                                integrating <br> project-based learning, internships, and industry partnerships,
                            </p>
                            <a href="blog-details.html" class="ed-primary-btn">Read More <i
                                    class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="post-card-2 wow fade-in-bottom" data-wow-delay="500ms">
                    <div class="post-thumb">
                        <img src="ui/assets/img/blog/post-6.png" alt="post">
                    </div>
                    <div class="post-content-wrap">
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-sharp fa-regular fa-clock"></i>August 15, 2024</li>
                                <li><i class="fa-sharp fa-regular fa-folder"></i>Marketing</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">The Role of Social-Emotional Learning in
                                    Building Resilient</a></h3>
                            <p>we understand the importance of preparing students for the real world curriculum is
                                <br> designed strong emphasis on practical skills and real-world applications. By
                                integrating <br> project-based learning, internships, and industry partnerships,
                            </p>
                            <a href="blog-details.html" class="ed-primary-btn">Read More <i
                                    class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ blog-section -->

@endsection