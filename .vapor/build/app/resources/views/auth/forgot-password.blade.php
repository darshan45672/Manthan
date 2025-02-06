{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password
        reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4"><a class="d-flex flex-center text-decoration-none mb-4"
                href="{{ route('home') }}">
                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img
                        src="{{ asset('ui/assets/img/favicon.png') }}" alt="phoenix" width="58" /></div>
            </a>
            <div class="px-xxl-5">
                <div class="text-center mb-6">
                    <h4 class="text-body-highlight">Forgot your password?</h4>
                    <p class="text-body-tertiary mb-5">Enter your email below and we will send <br
                            class="d-sm-none" />you a reset link</p>
                    @if (session('status'))
                    <p class="alert alert-success">
                        {{ session('status') }}
                    </p>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="d-flex align-items-center mb-5">
                            <input class="form-control @error('email') is-invalid @enderror flex-1" id="email"
                                type="email" name="email" required autofocus placeholder="Email" />
                            <button type="submit" class="btn btn-primary ms-2">
                                Send<span class="fas fa-chevron-right ms-2"></span>
                            </button>
                        </div>
                    </form>
                    <a class="fs-9 fw-bold" href="#!">Still having problems?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection