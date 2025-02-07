@extends('layouts.dashboard.dashboard')

@section('content')
@if (!$testimonials)
    <h1>No Testimonials</h1>
@else
<div class="card mb-5">
    <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0"
        style="min-height: 214px; ">
        <div class="hover-actions-trigger position-static">
            <div class="bg-holder rounded-top" style="background-image:url(../../assets/img/generic/cover-photo.png);">
            </div>
            {{-- <input class="d-none" id="upload-cover-image" type="file" /> --}}
            <label class="cover-image-file-input" for="upload-cover-image"></label>
            <div class=" end-0 bottom-0 pe-1 pb-2 text-white">
                {{-- <span class="fa-solid fa-camera me-2 overlay-icon"></span> --}}
            </div>
            <!--/.bg-holder-->
        </div>
        {{-- <input class="d-none" id="upload-porfile-picture" type="file" /> --}}
        <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
            {{-- <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;">
                {{-- <span class="fa-solid fa-camera fs-3 text-secondary-light"></span>
            </div> --}}
            <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                <div class="avatar avatar-5xl">
                    <img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0"
                        src="{{ filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::disk('s3')->url(Auth::user()->image)  }}" alt="{{ Auth::user()->name }}" />
                </div>
                <label class="w-100 h-100 position-absolute z-1" for="upload-porfile-picture"></label>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-xl-between">
            <div class="col-auto">
                <div class="d-flex flex-wrap mb-3 align-items-center">
                    <h2 class="me-2">{{ $testimonials->title }}</h2>
                    {{-- <span class="fw-semibold fs-7 text-body-emphasis">u/hansolo</span> --}}
                </div>
                <p class="fs-6 text-body-secondary">“{{ $testimonials->testimonial }}”</p>
            </div>
            <div class="col-auto">
                <div class="row g-2">
                    <div class="col-auto order-xxl-2">
                        <a href="{{ route('user.testimonial.edit') }}" class="btn btn-primary lh-1" >
                                <span class="fa-solid fa-user-plus me-2"></span>Edit
                        </a>
                    </div>
                    <div class="col-auto order-xxl-2">
                        <form action="{{ route('user.testimonial.destroy', $testimonials->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger lh-1">
                                <span class=" me-2" data-feather="trash"></span>Delete
                            </button>
                        </form>
                    </div>
                    {{-- <div class="col-auto order-xxl-1">
                        <button class="btn btn-phoenix-primary lh-1">
                            <span class="me-2" data-feather="x-circle"></span>
                            Cancel
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection