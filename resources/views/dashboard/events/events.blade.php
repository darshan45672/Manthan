@extends('layouts.dashboard.dashboard')

@section('content')
<div class="pb-5">
    <div class="row gx-6 gy-3 mb-4 align-items-center">
        <div class="col-auto">
            <h2 class="mb-0">Events<span class="fw-normal text-body-tertiary ms-3">(2)</span></h2>
        </div>
    </div>
    <div class="row justify-content-between align-items-end mb-4 g-3">
        <div class="col-12 col-sm-auto">
            <ul class="nav nav-links mx-n2">
                <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page"
                        href="#"><span>All</span><span class="text-body-tertiary fw-semibold">(2)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Workshop</span><span
                            class="text-body-tertiary fw-semibold">(2)</span></a></li>
                <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Webinar</span><span
                            class="text-body-tertiary fw-semibold">(0)</span></a></li>
                <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Technical
                            Talks</span><span class="text-body-tertiary fw-semibold">(0)</span></a></li>
                <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Hackathons</span><span
                            class="text-body-tertiary fw-semibold">(0)</span></a></li>
            </ul>
        </div>

        <div class="col-12 col-sm-auto">
            <div class="d-flex align-items-center">
                <div class="search-box me-3">
                    <form class="position-relative"><input class="form-control search-input search" type="search"
                            placeholder="Search projects" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-around align-items-center mb-9 me-3 g-4">
        @foreach ($events as $event)
        <div class="col-md-4">
            <a href="{{ route('events.show', $event->id) }}" target="_blank" style="text-decoration: none">
                <div class="card" style="max-width:20rem;">
                    <img class="card-img-top pt-2" src="{{ Storage::disk('s3')->url($event->banner) }}" alt="{{ $event->name }}">
                    <center>
                        <h3 class="mt-2 mb-0">{{ $event->name }}</h3>
                    </center>
                    <div class="card-body d-flex flex-column  justify-content-center">
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-success" target="_blank">View
                            Event</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection