@extends('layouts.guest')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                <a class="d-flex flex-center text-decoration-none mb-4" href="{{ route('home') }}">
                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                        <img src="{{ asset('ui/assets/img/favicon.png') }}" alt="logo" width="58" />
                    </div>
                </a>
                <div class="text-center mb-7">
                    <h3 class="text-body-highlight">Sign In</h3>
                    <p class="text-body-tertiary">Get access to your account</p>
                </div>
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-phoenix-secondary w-100 mb-3">
                        <span class="fab fa-google text-light me-2 fs-9"></span>
                        Sign in with Google
                    </button>
                </form>
                <button class="btn btn-phoenix-secondary w-100">
                    <span class="fab fa-github text-light me-2 fs-9"></span>
                    Sign in with GitHub
                </button>
                <div class="position-relative">
                    <hr class="bg-body-secondary mt-5 mb-4" />
                    <div class="divider-content-center">or use email</div>
                </div>
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('status'))
                <p class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                </p>
                @endif

                <div class="mb-3 text-start">
                    <label class="form-label" for="email">Email address</label>
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input  @error('email') is-invalid @enderror" id="email"
                            type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="username"
                            placeholder="name@example.com" />
                        <span class="fas fa-user text-body fs-9 form-icon"></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-icon-container" data-password="data-password">
                        <input class="form-control form-icon-input @error('password') is-invalid @enderror pe-6"
                            id="password" placeholder="Password" type="password" name="password" required
                            autocomplete="current-password" data-password-input="data-password-input" />
                        <span class="fas fa-key text-body fs-9 form-icon"></span>
                        <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                            data-password-toggle="data-password-toggle">
                            <span class="uil uil-eye show"></span>
                            <span class="uil uil-eye-slash hide"></span></button>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row flex-between-center mb-7">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" />
                            <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                        </div>
                    </div>
                    <div class="col-auto"><a class="fs-9 fw-semibold" href="{{ route('password.request') }}">Forgot
                            Password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
                <div class="text-center"><a class="fs-9 fw-bold" href="{{ route('register') }}">Create an account</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection