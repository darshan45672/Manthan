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
            <h1 class="title">Blog Details</h1>
            <h4 class="sub-title"><a class="home" href="{{ route('home') }}">Home </a><span class="icon">/</span><a
                    class="inner-page" href="{{ route('blogs.show', $blog->id) }}"> Blog Details</a></h4>
        </div>
    </div>
</section>
<!-- ./ page-header -->

<section class="blog-details pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-top-wrap">
                    <div class="blog-details-top">
                        <div class="blog-details-thumb">
                            <img src="{{ Storage::url($blog->image) }}" alt="blog">
                        </div>
                        <ul class="post-meta">
                            <li><i class="fa-sharp fa-regular fa-clock"></i>{{
                                    \Carbon\Carbon::parse($blog->created_at)->format('M d, y') }}</li>
                            <li><i class="fa-sharp fa-regular fa-folder"></i>{{ $blog->category->name }}</li>
                            <li><i class="fa-light fa-user"></i>{{ $blog->user->name }}</li>
                        </ul>
                    </div>
                    <div class="blog-details-content">
                        <h1 class="display-3 mb-4">{{ $blog->title }}</h1>
                        {!! $blog->content !!}
                        <div class="tag-wrap">
                            <div class="tags">
                                <h4 class="tag">Tags:</h4>
                                <ul>
                                    @foreach ($blog->tags as $tag)
                                        <li><a href="#">{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="social-list-wrap">
                                <h4 class="share">Share:</h4>
                                <ul class="social-list">
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-contact-form">
                    <h2 class="title">Leave a Reply</h2>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="request-form">
                        <form action="/" method="post" id="ajax_contact"
                            class="form-horizontal">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <input type="text" id="fullname" name="fullname" class="form-control"
                                            placeholder="Your Name">
                                        <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Your Email">
                                        <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <input type="text" id="website" name="website" class="form-control"
                                            placeholder="Website">
                                        <div class="icon"><i class="fa-light fa-globe"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item message-item">
                                        <textarea id="message" name="message" cols="30" rows="5"
                                            class="form-control address" placeholder="Message"></textarea>
                                        <div class="icon"><i class="fa-light fa-messages"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ed-contact-input-remeber">
                                <input id="remeber" type="checkbox">
                                <label for="remeber">Save my name, email, and website in this browser for the next time
                                    I comment.</label>
                            </div>
                            <div class="submit-btn">
                                <button id="submit" class="ed-primary-btn" type="submit">Submit Message <i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget">
                    <h3 class="widget-title">Search</h3>
                    <div class="search-box">
                        <form action="#" class="search-form">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="search-btn" type="button">
                                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="sidebar-widget">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="tags">
                        @foreach ($categories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h3 class="widget-title">Recent Post</h3>
                    @foreach ($posts as $post)
                    <div class="sidebar-post">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                        <div class="post-content">
                            <h3 class="title"><a href="#">{{ $post->title }}</a></h3>
                            <ul class="post-meta">
                                <li><i class="fa-light fa-user"></i>By {{ $post->user->name }}</li>
                                <li><i class="fa-sharp fa-regular fa-folder-open"></i>{{ $post->category->name }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sidebar-widget sticky-widget">
                    <h3 class="widget-title">Tags</h3>
                    <ul class="tags">
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Top</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">New</a></li>
                        <li><a href="#">Best</a></li>
                        <li><a href="#">Brutie</a></li>
                        <li><a href="#">Sonds</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ blog-details -->
@endsection