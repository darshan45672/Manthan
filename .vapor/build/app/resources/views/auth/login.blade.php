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
                <a href="{{ route('social.login', 'google') }}" class="btn btn-phoenix-secondary w-100 mb-3">
                    {{-- <span class="fab fa-google text-light me-2 fs-9"></span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" class="me-1" height="25"
                        viewBox="0 0 48 48">
                        <path fill="#fbc02d"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                        <path fill="#e53935"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                        </path>
                        <path fill="#4caf50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                        </path>
                        <path fill="#1565c0"
                            d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                    </svg>
                    Sign in with Google
                </a>
                <a href="{{ route('social.login', 'github') }}" class="btn btn-phoenix-secondary w-100">
                    {{-- <span class="fab fa-github text-light me-2 fs-9"></span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" class="me-1" y="0px" width="25" height="25"
                        viewBox="0,0,256,256" style="fill:#1A1A1A;">
                        <g fill="#030303" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,256v-256h256v256z" id="bgRectangle"></path>
                        </g>
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(4,4)">
                                <path
                                    d="M32,6c-14.359,0 -26,11.641 -26,26c0,12.277 8.512,22.56 19.955,25.286c-0.592,-0.141 -1.179,-0.299 -1.755,-0.479v-5.957c0,0 -0.975,0.325 -2.275,0.325c-3.637,0 -5.148,-3.245 -5.525,-4.875c-0.229,-0.993 -0.827,-1.934 -1.469,-2.509c-0.767,-0.684 -1.126,-0.686 -1.131,-0.92c-0.01,-0.491 0.658,-0.471 0.975,-0.471c1.625,0 2.857,1.729 3.429,2.623c1.417,2.207 2.938,2.577 3.721,2.577c0.975,0 1.817,-0.146 2.397,-0.426c0.268,-1.888 1.108,-3.57 2.478,-4.774c-6.097,-1.219 -10.4,-4.716 -10.4,-10.4c0,-2.928 1.175,-5.619 3.133,-7.792c-0.2,-0.567 -0.533,-1.714 -0.533,-3.583c0,-1.235 0.086,-2.751 0.65,-4.225c0,0 3.708,0.026 7.205,3.338c1.614,-0.47 3.341,-0.738 5.145,-0.738c1.804,0 3.531,0.268 5.145,0.738c3.497,-3.312 7.205,-3.338 7.205,-3.338c0.567,1.474 0.65,2.99 0.65,4.225c0,2.015 -0.268,3.19 -0.432,3.697c1.898,2.153 3.032,4.802 3.032,7.678c0,5.684 -4.303,9.181 -10.4,10.4c1.628,1.43 2.6,3.513 2.6,5.85v8.557c-0.576,0.181 -1.162,0.338 -1.755,0.479c11.443,-2.726 19.955,-13.009 19.955,-25.286c0,-14.359 -11.641,-26 -26,-26zM33.813,57.93c-0.599,0.042 -1.203,0.07 -1.813,0.07c0.61,0 1.213,-0.029 1.813,-0.07zM37.786,57.346c-1.164,0.265 -2.357,0.451 -3.575,0.554c1.218,-0.103 2.411,-0.29 3.575,-0.554zM32,58c-0.61,0 -1.214,-0.028 -1.813,-0.07c0.6,0.041 1.203,0.07 1.813,0.07zM29.788,57.9c-1.217,-0.103 -2.411,-0.289 -3.574,-0.554c1.164,0.264 2.357,0.451 3.574,0.554z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    Sign in with GitHub
                </a>
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