@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="bg-item">
        {{-- <div class="bg-img" data-background="ui/assets/img/bg-img/page-header-bg.png"></div> --}}
        <div class="overlay"></div>
        <div class="shapes">
            {{-- <div class="shape shape-1"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-1.png') }}" alt="shape"></div> --}}
            <div class="shape shape-2"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-2.png') }}" alt="shape"></div>
            <div class="shape shape-3"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-3.png') }}" alt="shape"></div>
        </div>
    </div>
    <div class="container">
        <div class="page-header-content">
            <h1 class="title">Event Page</h1>
            <h4 class="sub-title"><a class="home" href="{{ route('home') }}">Home </a><span class="icon">/</span>
                <a class="inner-page" href="{{ route('events') }}"> Events </a></h4>
        </div>
    </div>
</section>
<!-- ./ page-header -->

<section class="features-event pt-120 pb-120">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="sidebar-widget">
                <h3 class="widget-title">Search</h3>
                <div class="search-box">
                    <form action="{{ route('events') }}" method="GET" class="search-form">
                        <input type="text" name="search" value="{{ request('search', '') }}" class="form-control" placeholder="Search">
                        <button class="search-btn" type="submit">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @if ($programs->isEmpty())
            <center>
                <h1 class="display-4">No Events Available</h1>
            </center>
            @else
            @foreach ($programs as $program)
            <div class="col-lg-4 col-md-6">
                <div class="event-item wow fade-in-bottom" data-wow-delay="400ms">
                    <div class="event-thumb">
                        <img src="{{ Storage::url($program->banner) }}" alt="{{ $program->name }}">
                        <div class="date-wrap"><h5 class="date">{{ \Carbon\Carbon::parse($program->start_date)->format('d') }}
                            <span>{{ \Carbon\Carbon::parse($program->start_date)->format('M') }}</span></h5></div>
                    </div>
                    <div class="event-content">
                        <span class="time"><i class="fa-regular fa-clock"></i>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $program->start_time)->format('h:i a') }} - 
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $program->end_time)->format('h:i a') }}
                        </span>
                        <h3 class="title"><a href="{{ route('events.show', $program->id) }}">{{ $program->name }}</a></h3>
                        <div class="location"><span><i class="fa-regular fa-location-dot"></i>{{ $program->address }}</span></div>
                        <center>
                            <a href="{{ route('events.show', $program->id) }}" class="ed-primary-btn mb-2" >View Details</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!-- ./ features-event -->
@endsection