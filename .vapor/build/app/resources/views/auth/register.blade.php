{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                <a class="d-flex flex-center text-decoration-none mb-4" href="{{ route('home') }}">
                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                        <img src="{{ asset('ui/assets/img/favicon.png') }}" alt="logo" width="58" />
                    </div>
                </a>
                <div class="text-center mb-3">
                    <h3 class="text-body-highlight">Sign Up</h3>
                    <p class="text-body-tertiary">Create your account today</p>
                </div>
                {{-- <button class="btn btn-phoenix-secondary w-100 mb-3">
                <span class="fab fa-google text-danger me-2 fs-9"></span>
                Sign up with google
            </button>
            <button class="btn btn-phoenix-secondary w-100">
                <span class="fab fa-facebook text-primary me-2 fs-9"></span>
                Sign up with facebook
            </button>
            <div class="position-relative mt-4">
                <hr class="bg-body-secondary" />
                <div class="divider-content-center">or use email</div>
            </div> --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3 text-start"><label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" placeholder="Name" name="name" required
                            autofocus autocomplete="name" />
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                            placeholder="name@example.com" name="email" required autocomplete="username" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6"><label class="form-label" for="password">Password</label>
                            <div class="position-relative" data-password="data-password">
                                <input class="form-control form-icon-input pe-6 @error('password') is-invalid @enderror"
                                    id="password" type="password" name="password" required autocomplete="new-password"
                                    placeholder="Password" data-password-input="data-password-input" />
                                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                    data-password-toggle="data-password-toggle">
                                    <span class="uil uil-eye show"></span>
                                    <span class="uil uil-eye-slash hide"></span>
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="position-relative" data-password="data-password">
                                <input
                                    class="form-control form-icon-input pe-6 @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Confirm Password" data-password-input="data-password-input" />
                                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                    data-password-toggle="data-password-toggle">
                                    <span class="uil uil-eye show"></span>
                                    <span class="uil uil-eye-slash hide"></span>
                                </button>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox" /><label
                            class="form-label fs-9 text-transform-none" for="termsService">I accept the <a
                                href="#!">terms
                            </a>and <a href="#!">privacy policy</a></label></div>
                    <button class="btn btn-primary w-100 mb-3" type="submit">Sign up</button>
                    <div class="text-center"><a class="fs-9 fw-bold" href="{{ route('login') }}">Sign in to an existing
                            account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
