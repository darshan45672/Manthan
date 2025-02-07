@extends('layouts.dashboard.dashboard')

@section('content')
<div class="card mb-5">
    <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0"
        style="min-height: 214px;">
        <div class="hover-actions-trigger position-static">
            <div class="bg-holder rounded-top" style="background-image:url(../../assets/img/generic/cover-photo.png);">
            </div>
            <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white">
                <span class="fa-solid fa-camera me-2 overlay-icon"></span>
            </div>
        </div>
        <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
            <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                <div class="avatar avatar-5xl">
                    <img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0"
                        src="{{filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::disk('s3')->url(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.testimonial.update', $testimonial->id) }}" method="POST">
            @csrf
            <div class="row justify-content-xl-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap mb-3 align-items-center">
                        <h2 class="me-2">{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <div class="col-12 gy-6">
                    {{-- Title Field --}}
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="floatingProjectTitle" placeholder="Testimonial Title" name="title"
                               value="{{ $testimonial->title }}" />
                        <label for="floatingProjectTitle">Title</label>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Testimonial Field --}}
                    <div class="form-floating">
                        <textarea class="form-control @error('testimonial') is-invalid @enderror" 
                                  id="floatingProjectOverview" placeholder="Leave a comment here" 
                                  style="height: 50px" name="testimonial">{{ $testimonial->testimonial }}</textarea>
                        <label for="floatingProjectOverview">Your Experience</label>
                        @error('testimonial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 gy-6">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <a href="{{ route('user.testimonials') }}" class="btn btn-phoenix-primary px-5">Cancel</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary px-5">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
