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
                    <form class="position-relative"><input class="form-control search-input search"
                            type="search" placeholder="Search projects" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between align-items-end mb-9 me-0 g-4">
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
        <div class="card" style="max-width:20rem;">
            <img class="card-img-top" src="docker.png" alt="...">
        </div>
    </div>
</div>
@endsection