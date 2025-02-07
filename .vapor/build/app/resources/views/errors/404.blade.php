@extends('layouts.app')

@section('content')
<section class="error-section pb-120">
    <div class="container">
        <div class="error-content text-center">
            <center>
                <img src="{{ asset('ui/assets/img/images/error-img.png') }}" alt="img">
            </center>
            <h2 class="text">404 - Page Not Found</h2>
            <p class="mb-10 mt-10">The page you are looking for does not exist</p>
            <a class="ed-primary-btn" href="{{ route('home') }}">Back To Home Page</a>
        </div>
    </div>
</section>
@endsection