@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="bg-item">
        {{-- <div class="bg-img" data-background="{{ asset('ui/assets/img/bg-img/page-header-bg.png') }}"></div> --}}
        <div class="overlay"></div>
        <div class="shapes">
            {{-- <div class="shape shape-1"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-1.png') }}" alt="shape"></div> --}}
            <div class="shape shape-2"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-2.png') }}" alt="shape"></div>
            <div class="shape shape-3"><img src="{{ asset('ui/assets/img/shapes/page-header-shape-3.png') }}" alt="shape"></div>
        </div>
    </div>
    <div class="container">
        <div class="page-header-content">
            <h1 class="title">Gallery</h1>
            <h4 class="sub-title"><a class="home" href="{{ route('home') }}">Home </a><span class="icon">/</span><a
                    class="inner-page" href="{{ route('gallery.show', $gallery->id) }}"> Gallery</a></h4>
        </div>
    </div>
</section>

<section>

    <div class="container">
        <div class="row gy-4 justify-content-center mt-3">
            @foreach ($gallery->gallery_images as $item)    
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="team-item-2 wow fade-in-bottom" data-wow-delay="200ms">
                    <div class="team-thumb">
                        <img src="{{ Storage::url($item) }}" alt="team">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ./ page-header -->
@endsection