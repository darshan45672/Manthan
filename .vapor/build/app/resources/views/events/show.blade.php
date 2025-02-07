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
            <h1 class="title">Event Details</h1>
            <h4 class="sub-title"><a class="home" href="{{ route('home') }}">Home </a><span class="icon">/</span>
                <a class="inner-page" href="{{ route('events.show', $program->id) }}"> Event Details</a>
            </h4>
        </div>
    </div>
</section>
<!-- ./ page-header -->


<section class="event-details pt-120 pb-120">
    <div class="container">
        {{-- @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row gy-xl-0 gy-5">
            <div class="col-lg-8 col-md-12">
                <div class="event-details-content">
                    <div class="event-details-img">
                        <img src="{{ Storage::url($program->banner) }}" alt="event">
                    </div>
                    <h2 class="title">Event Overview</h2>
                    <p class="mb-30">{!! $program->description !!}</p>

                    <ul class="mt-5 event-details-list">
                        <li>
                            <i class="fa-sharp fa-regular fa-circle-check"></i>
                            <p><span>Define Clear Objectives:</span> Establish specific goals for the event, such as
                                enhancing participants' knowledge of innovative teaching techniques or providing
                                actionable strategies for classroom implementation.</p>
                        </li>
                        <li>
                            <i class="fa-sharp fa-regular fa-circle-check"></i>
                            <p><span>Curate Expert Speakers:</span> Establish specific goals for the event, such as
                                enhancing participants' knowledge of innovative teaching techniques or providing
                                actionable strategies for classroom implementation.</p>
                        </li>
                        <li>
                            <i class="fa-sharp fa-regular fa-circle-check"></i>
                            <p><span>Design Interactive Sessions:</span> Establish specific goals for the event, such as
                                enhancing participants' knowledge of innovative teaching techniques or providing
                                actionable strategies for classroom implementation.</p>
                        </li>
                    </ul>
                    <h2 class="title">Check Live Map</h2>
                    <div class="event-map-wrapper">
                        <iframe src="{{ $program->location }}" width="100%" height="350" frameborder="0"
                            style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <h2 class="title">Event Speakers</h2>
                    <div class="row gy-xl-0 gy-4 inner-team-wrap justify-content-center">
                        @foreach ($speakers as $speaker)
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                            <div class="team-item-3 bg-white wow fade-in-bottom" data-wow-delay="200ms">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb">
                                        <img src="{{ asset('ui/assets/img/team/team-9.png') }}" alt="team">
                                        {{-- <img src="{{ $speaker->image->getImageURL() }}" alt="team"> --}}
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{ $speaker->name }}</h3>
                                    <span>{{ $speaker->designation }}</span>
                                    <ul class="social-list">
                                        @if (!empty($speaker->instagram))
                                        <li><a href="{{ $speaker->instagram }}" target="blank"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        @endif
                                        @if (!empty($speaker->linkedin))
                                        <li><a href="{{ $speaker->linkedin }}" target="blank"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                        @endif
                                        @if (!empty($speaker->twitter))
                                        <li><a href="{{ $speaker->twitter }}" target="blank"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="course-sidebar price-box event-sidebar">
                    <form action="{{ route('event.register', $program->id) }}" method="POST">
                        @csrf
                        @if (auth()->check() && $registeredPrograms)
                        <button type="submit" class="ed-primary-btn" disabled>Already Registered</button>
                        @else
                        <button type="submit" class="ed-primary-btn">Register</button>
                        @endif
                    </form>
                    {{-- <a href="contact.html" class="ed-primary-btn buy-btn"></a> --}}
                </div>
                <div class="course-sidebar event-sidebar sticky-widget">
                    <h4 class="sidebar-title">Event Information</h4>
                    <ul class="course-sidebar-list">
                        <li><i class="fa-light fa-calendar-days"></i>Date: <span>{{ $program->start_date->format('F d,
                                Y') }} - {{ $program->end_date->format('F d, Y') }}</span></li>
                        <li><i class="fa-regular fa-clock"></i>Time: <span>{{ \Carbon\Carbon::createFromFormat('H:i:s',
                                $program->start_time)->format('h:i a') }}
                                - {{ \Carbon\Carbon::createFromFormat('H:i:s', $program->end_time)->format('h:i a')
                                }}</span></li>
                        <li><i class="fa-regular fa-location-dot"></i>Venue: <span>{{ $program->venue }}</span></li>
                        <li><i class="fa-sharp fa-regular fa-map"></i>Address: <span>{{ $program->address }}</span></li>
                        {{-- <li><i class="fa-regular fa-user"></i>Name: <span>English</span></li> --}}
                        <li><i class="fa-regular fa-phone"></i>Phone: <span><a href="tel:+25621522156">(+91) 901 9003
                                    490</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection