@php
    use Illuminate\Support\Facades\DB;
    $latestEvents = DB::table('programs')->orderBy('start_date', 'desc')->take(2)->get();
@endphp

<footer class="footer-section pt-120" data-background="ui/assets/img/bg-img/footer-bg.png">
    <div class="footer-top-wrap">
        <div class="container">
            <div class="footer-top text-center">
                <h2 class="title">Subscribe Our Newsletter For <br>Latest Updates</h2>
                <div class="footer-form-wrap">
                    <form action="/" class="footer-form">
                        <div class="form-item">
                            <input type="text" id="email-2" name="email" class="form-control"
                                placeholder="Enter Your E-mail">
                        </div>
                        <button class="ed-primary-btn">sign up</button>
                    </form>
                </div>
            </div>
            <div class="row footer-wrap">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="widget-header">Get in touch!</h3>
                        <p class="mb-30">Fusce varius, dolor tempor interdum tristiquei bibendum.</p>
                        <div class="footer-contact">
                            <span class="number"><i class="fa-regular fa-phone"></i><a href="tel:702123-1478">+91 901 1900 3490</a></span>
                            <a href="mailto:drshnbhandary@gmail.com" class="mail">drshnbhandary@gmail.com</a>
                        </div>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget-2">
                        <h3 class="widget-header">Short Navs</h3>
                        <ul class="footer-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('events') }}">Events</a></li>
                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('blogs') }}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget-2">
                        <h3 class="widget-header">Useful Links</h3>
                        <ul class="footer-list">
                            <li><a href="{{ route('events') }}">Featured Events</a></li>
                            <li><a href="{{ route('events') }}">Latest Events</a></li>
                            <li><a href="{{ route('events') }}">SDPs</a></li>
                            <li><a href="{{ route('events') }}">FDPs</a></li>
                            <li><a href="{{ route('blogs') }}">News & Blogs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="widget-header">Recent Post</h3>
                        @foreach ($latestEvents as $item)
                        <div class="sidebar-post mb-20">
                            <img src="{{ Storage::url($item->banner) }}" alt="post">
                            <div class="post-content">
                                <h3 class="title"><a href="{{ route('events.show', $item->id) }}">{{ $item->name }}</a></h3>
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-calendar"></i>{{ \Carbon\Carbon::parse($item->start_date)->format('d M, Y') }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-content">
                <p>Copyright © 2024 Manthan. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- ./ footer-section -->

<div id="scrollup">
    <button id="scroll-top" class="scroll-to-top"><i class="fa-regular fa-arrow-up-long"></i></button>
</div>
<!--scrollup-->
