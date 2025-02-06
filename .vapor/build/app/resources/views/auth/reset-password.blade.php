{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.guest') 

@section('content')
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
      <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{{ route('home') }}">
          <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
            <img src="{{ asset('ui/assets/img/favicon.png') }}" alt="phoenix" width="58" /></div>
        </a>
        <div class="text-center mb-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <h4 class="text-body-highlight">Reset new password</h4>
          <p class="text-body-tertiary">Type your new password</p>
          <form class="mt-5" method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="position-relative mb-2" data-password="data-password">
                <input class="form-control form-icon-input pe-6 @error('email') is-invalid @enderror " id="password" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                @error('email')
                <span class="invalid-feedback ms-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="position-relative mb-2" data-password="data-password">
                <input class="form-control form-icon-input @error('password') is-invalid @enderror pe-6" id="password" type="password" name="password" required autocomplete="new-password" autofocus placeholder="Type new password" data-password-input="data-password-input" />
                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                    <span class="uil uil-eye show"></span><span class="uil uil-eye-slash hide"></span>
                </button>
                @error('email')
                <span class="invalid-feedback ms-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="position-relative mb-4" data-password="data-password">
                <input class="form-control form-icon-input pe-6 @error('password_confirmation') is-invalid @enderror" id="confirmPassword" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Cofirm new password" data-password-input="data-password-input" />
                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                    <span class="uil uil-eye show"></span><span class="uil uil-eye-slash hide"></span>
                </button>
                @error('email')
                <span class="invalid-feedback ms-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-primary w-100" type="submit">Set Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection