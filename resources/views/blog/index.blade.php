@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="bg-item">
        {{-- <div class="bg-img" data-background="ui/assets/img/bg-img/page-header-bg.png"></div> --}}
        <div class="overlay"></div>
        <div class="shapes">
            {{-- <div class="shape shape-1"><img src="ui/assets/img/shapes/page-header-shape-1.png" alt="shape"></div>
            --}}
            <div class="shape shape-2"><img src="ui/assets/img/shapes/page-header-shape-2.png" alt="shape"></div>
            <div class="shape shape-3"><img src="ui/assets/img/shapes/page-header-shape-3.png" alt="shape"></div>
        </div>
    </div>
    <div class="container">
        <div class="page-header-content">
            <h1 class="title">Blog</h1>
            <h4 class="sub-title"><a class="home" href="index.html">Home </a><span class="icon">/</span><a
                    class="inner-page" href="blog.html"> Blog</a></h4>
        </div>
    </div>
</section>
<!-- ./ page-header -->

<section class="blog-details pt-120 pb-120">
    <div class="container">
        <div class="row">
            @if ($posts->isEmpty())
            <center>
                <h1 class="display-4">No Posts Available</h1>
            </center>
            @else
            <div class="col-lg-8">
                @foreach ($posts as $post)
                <div class="post-card-4 post-inner-2 fade-top">
                    <div class="post-thumb">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="post-content-wrap">
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-sharp fa-regular fa-clock"></i>{{
                                    \Carbon\Carbon::parse($post->created_at)->format('M d, y') }}</li>
                                <li><i class="fa-sharp fa-regular fa-folder"></i>{{ $post->category->name }}</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">{{ $post->title }}</a></h3>
                            <p>{{ \Illuminate\Support\Str::words($post->content, 100, '...') }}</p>
                            <div class="post-bottom">
                                <a class="read-more ed-primary-btn" href="{{ route('blogs.show', $post->id) }}">Read
                                    More<i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <ul class="pagination-wrap mt-20 text-left">
                    {{-- <li><a href="#">1</a></li>
                    <li><a href="#" class="active">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa-sharp fa-regular fa-arrow-right"></i></a></li> --}}
                    {{ $posts->links('vendor.pagination.default') }}
                </ul>
            </div>
            @endif
            @if (!$posts->isEmpty())
            <div class="col-lg-4">
                <div class="sidebar-widget">
                    <h3 class="widget-title">Search</h3>
                    <div class="search-box">
                        <form action="{{ route('blogs') }}" method="GET" class="search-form">
                            <input type="text" name="search" value="{{ request('search', '') }}" class="form-control" placeholder="Search">
                            <button class="search-btn" type="submit">
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
                {{-- <div class="sidebar-widget sticky-widget">
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
                </div> --}}
            </div>
            @endif
        </div>
    </div>
</section>
<!-- ./ blog-details -->
@endsection