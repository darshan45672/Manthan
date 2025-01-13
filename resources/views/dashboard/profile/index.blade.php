@extends('layouts.dashboard.dashboard')

@section('content')
@if (Auth::user()->role == 'student')
<div class="mb-9">
    <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Profile</h2>
        </div>
        <div class="col-auto">
            <div class="row g-3">
                <div class="col-auto"><button class="btn btn-phoenix-danger"><span
                            class="fa-solid fa-trash-can me-2"></span>Delete profile</button></div>
                <div class="col-auto"><button class="btn btn-phoenix-secondary"><span
                            class="fas fa-key me-2"></span>Reset password</button></div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-12">
            <div class="row g-3 h-100">
                <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100 h-xxl-auto">
                        <div class="card-body d-flex flex-column justify-content-between pb-3">
                            <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                <div class="col-12 col-sm-auto mb-sm-2">
                                    <div class="avatar avatar-5xl"><img class="rounded-circle"
                                            {{-- src="{{ asset('dashboard/assets/img/team/150x150/58.webp') }}" --}}
                                            src="{{ filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::url(Auth::user()->image) }}"
                                             alt="{{ $user->name }}" /></div>
                                </div>
                                <div class="col-12 col-sm-auto flex-1">
                                    <h3>{{ $user->name }}</h3>
                                    <p class="text-body-secondary">{{ $user->student->department->name ?? '' }}</br>{{ $user->student->college->name ?? '' }}</p>
                                    <div><a class="me-2" href="#!"><span
                                                class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a
                                            class="me-2" href="#!"><span
                                                class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a
                                            href="#!"><span
                                                class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center border-top border-dashed pt-4">
                                <div>
                                    <h6>USN</h6>
                                    <p class="fs-7 text-body-secondary mb-0">{{ $user->student->usn ?? '' }}</p>
                                </div>
                                <div>
                                    <h6>BRANCH</h6>
                                    <p class="fs-7 text-body-secondary mb-0">{{ $user->student->department->name ?? '' }}</p>
                                </div>
                                <div>
                                    <h6>SEMESTER</h6>
                                    <p class="fs-7 text-body-secondary mb-0">{{ $user->student->semester ?? '' }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h3 class="me-1">Address</h3><button class="btn btn-link p-0"><span
                                        class=" fs-8 ms-3 text-body-quaternary"></span></button>
                            </div>
                            <h5 class="text-body-secondary">Address</h5>
                            <p class="text-body-secondary">{{ $user->address ?? '' }}
                            </p>
                            <div class="mb-3">
                                <h5 class="text-body-secondary">Email</h5><a
                                    href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                            <h5 class="text-body-secondary">Phone</h5><a class="text-body-secondary"
                                href="tel:+91{{ $user->phone ?? '' }}">+91 {{ $user->phone ?? '' }}</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@elseif (Auth::user()->role == 'faculty')
<div class="mb-9">
    <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Profile</h2>
        </div>
        <div class="col-auto">
            <div class="row g-3">
                <div class="col-auto">
                    <a href="{{ route('user.edit.profile') }}">
                        <button class="btn btn-phoenix-primary" >
                            <span class="fa-solid fa-trash-can me-2"></span>Edit profile
                        </button>
                    </a>
                </div>
                <div class="col-auto">
                    <button class="btn btn-phoenix-secondary">
                        <span class="fas fa-key me-2"></span>Reset password
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-12 col-xxl-4">
            <div class="row g-3 h-100">
                <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100 h-xxl-auto">
                        <div class="card-body d-flex flex-column justify-content-between pb-3">
                            <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                <div class="col-12 col-sm-auto mb-sm-2">
                                    <div class="avatar avatar-5xl">
                                        <img class="rounded-circle" src="{{filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::url(Auth::user()->image)  }}" alt="{{ $user->name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto flex-1">
                                    <h3>{{ $user->name }}</h3>
                                    <p class="text-body-secondary">
                                        {{ $user->faculty->designation  ?? '' }} 
                                        <br/> 
                                        {{ $user->faculty->department->name  ?? '' }} <br>
                                        {{ $user->faculty->college->name  ?? '' }} 
                                    </p>
                                    <div>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a href="#!">
                                            <span class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center border-top border-dashed pt-4">
                                <div>
                                    <h6>DESIGNATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ $user->faculty->designation  ?? '' }}</p>
                                </div>
                                <div>
                                    <h6>QUALIFICATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ', $user->faculty->qualification  ?? [])  }}</p>
                                </div>
                                <div>
                                    <h6>SPECIALIZATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ', $user->faculty->specialization  ?? [])  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h3 class="me-1">Address</h3>
                                <button class="btn btn-link p-0">
                                    <span class=" fs-8 ms-3 text-body-quaternary"></span>
                                </button>
                            </div>
                            {{-- <h5 class="text-body-secondary">Address</h5> --}}
                            <p class="text-body-secondary">
                                {{ $user->address  ?? '' }}
                            </p>
                            <div class="mb-3">
                                <h5 class="text-body-secondary">Email</h5>
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                            <h5 class="text-body-secondary">Phone</h5>
                            <a class="text-body-secondary" href="tel:+91{{ $user->phone  ?? '' }}">+91 {{ $user->phone  ?? ''}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

@elseif (Auth::user()->role == 'HoD')
<div class="mb-9">
    <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Profile</h2>
        </div>
        <div class="col-auto">
            <div class="row g-3">
                <div class="col-auto"><a href="{{ route('user.edit.profile') }}"><button class="btn btn-phoenix-primary" 
                    ><span
                            class="fa-solid fa-trash-can me-2"></span>Edit profile</button></a></div>
                <div class="col-auto"><button class="btn btn-phoenix-secondary"><span
                            class="fas fa-key me-2"></span>Reset password</button></div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-12 col-xxl-4">
            <div class="row g-3 h-100">
                <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100 h-xxl-auto">
                        <div class="card-body d-flex flex-column justify-content-between pb-3">
                            <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                <div class="col-12 col-sm-auto mb-sm-2">
                                    <div class="avatar avatar-5xl">
                                        <img class="rounded-circle" src="{{filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::url(Auth::user()->image)  }}" alt="{{ $user->name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto flex-1">
                                    <h3>{{ $user->name }}</h3>
                                    <p class="text-body-secondary">
                                        {{ $user->hod->department->name  ?? '' }} <br/>
                                        {{ $user->hod->college->name  ?? '' }}
                                    </p>
                                    <div>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a href="#!">
                                            <span class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center border-top border-dashed pt-4">
                                <div>
                                    <h6>QUALIFICATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ' , $user->hod->qualification  ?? [])   }}</p>
                                </div>
                                <div>
                                    <h6>SPECIALIZATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ', $user->hod->specialization  ?? [])  }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h3 class="me-1">Address</h3>
                                <button class="btn btn-link p-0">
                                    <span class=" fs-8 ms-3 text-body-quaternary"></span>
                                </button>
                            </div>
                            <p class="text-body-secondary">
                                {{ $user->address }}
                            </p>
                            <div class="mb-3">
                                <h5 class="text-body-secondary">Email</h5><a
                                    href="mailto:{{ $user->email }}">{{ $user->email  }}</a>
                            </div>
                            <h5 class="text-body-secondary">Phone</h5><a class="text-body-secondary"
                                href="tel:+91{{ $user->phone  ?? '' }}">+91 {{ $user->phone  ?? '' }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>  

@elseif (Auth::user()->role == 'Principle')
<div class="mb-9">
    <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Profile</h2>
        </div>
        <div class="col-auto">
            <div class="row g-3">
                <div class="col-auto"><a href="{{ route('user.edit.profile') }}"><button class="btn btn-phoenix-primary" 
                    ><span
                            class="fa-solid fa-trash-can me-2"></span>Edit profile</button></a></div>
                <div class="col-auto"><button class="btn btn-phoenix-secondary"><span
                            class="fas fa-key me-2"></span>Reset password</button></div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-12 col-xxl-4">
            <div class="row g-3 h-100">
                <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100 h-xxl-auto">
                        <div class="card-body d-flex flex-column justify-content-between pb-3">
                            <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                <div class="col-12 col-sm-auto mb-sm-2">
                                    <div class="avatar avatar-5xl">
                                        <img class="rounded-circle" src="{{ filter_var(Auth::user()->image, FILTER_VALIDATE_URL) ? Auth::user()->image : Storage::url(Auth::user()->image)  }}" alt="{{ $user->name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto flex-1">
                                    <h3>{{ $user->name }}</h3>
                                    <p class="text-body-secondary">
                                        {{-- {{ $user->principle->department->name }} <br/> --}}
                                        {{ $user->principle->college->name  ?? ''}}
                                    </p>
                                    <div>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a class="me-2" href="#!">
                                            <span class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                        <a href="#!">
                                            <span class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center border-top border-dashed pt-4">
                                <div>
                                    <h6>QUALIFICATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ' , $user->principle->qualification  ?? [])  }}</p>
                                </div>
                                <div>
                                    <h6>SPECIALIZATION</h6>
                                    <p class="fs-9 text-body-secondary mb-0">{{ implode(', ', $user->principle->specialization  ?? [])  }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h3 class="me-1">Address</h3>
                                <button class="btn btn-link p-0">
                                    <span class=" fs-8 ms-3 text-body-quaternary"></span>
                                </button>
                            </div>
                            <p class="text-body-secondary">
                                {{ $user->address }}
                            </p>
                            <div class="mb-3">
                                <h5 class="text-body-secondary">Email</h5><a
                                    href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                            <h5 class="text-body-secondary">Phone</h5><a class="text-body-secondary"
                                href="tel:+91{{ $user->phone  ?? '' }}">+91 {{ $user->phone  ?? '' }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 
@endif
@endsection