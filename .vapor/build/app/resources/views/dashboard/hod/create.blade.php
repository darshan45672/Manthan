@extends('layouts.dashboard.dashboard')

@section('content')

<div class="border-bottom border-translucent mb-7 mx-n3 px-2 mx-lg-n6 px-lg-6">
    <div class="row">
        <div class="col-xl-9">
            <div class="d-sm-flex justify-content-between">
                <h2 class="mb-4">Edit Profile</h2>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-9">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="row g-3 mb-9" method="POST" action="{{ route('user.hod.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="d-flex align-items-end position-relative mb-7">
            {{-- <label class="w-100 h-100" for="upload-avatar">Profile Photo</label> --}}
            <input class="" id="upload-avatar" type="file" name="image" accept="image/*" />
            {{-- <div class="hoverbox" style="width: 150px; height: 150px">
                <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;">
                    <span class="fa-solid fa-camera fs-1 text-body-quaternary"></span>
                </div>
                <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                    <div class="avatar avatar-5xl">
                        <img class="rounded-circle" src="../../assets/img/team/150x150/58.webp" alt="" />
                    </div>
                    <label class="w-100 h-100 position-absolute z-1" for="upload-avatar"></label>
                </div>
            </div> --}}
        </div>
        <h4 class="mb-3">Details</h4>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" id="floatingSelectInstitution" name="name" />
                    <label for="floatingInputName">Name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" id="floatingInputEmail" type="email" name="email" />
                    <label for="floatingInputEmail">Email</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" id="floatingInputPhone" type="tel" placeholder="phone" name="phone"  />
                    <label for="floatingInputPhone">Phone</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectInstitution" name="college">
                        {{-- @foreach ($college as $item)
                        <option value="{{ $item->id }}" {{ old('college', Auth::user()->principle->college->id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach --}}
                    <option value="{{ Auth::user()->principle->college->id }}" selected> {{ Auth::user()->principle->college->name }} </option>
                    </select><label for="floatingSelectInstitution">Institution</label></div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select @error('branch') is-invalid @enderror" id="floatingSelectBranch" name="branch">
                        @foreach ($departments as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectBranch">Branch</label>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectDesignation" name="designation">
                        <option value="Proffesor" >Proffesor</option>
                        <option value="Associate Proffesor">Associate Proffesor</option>
                        <option value="Assistant Proffesor" >Assistant Proffesor</option>
                        <option value="Guest Proffesor" >Guest Proffesor</option>
                    </select>
                    <label for="floatingSelectDesignationt">Designation</label>
                </div>
            </div> --}}
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" id="floatingInputExperience" type="text" placeholder="Experience" name="expierience" />
                    <label for="floatingInputExperience">Experience</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" id="date-o-f-joining" type="date" name="join_date" />
                    <label class="form-label" for="date-o-f-joining">Date of Joining</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" id="date-o-f-leaving" type="date" name="leave_date"  />
                    <label class="form-label"
                        for="date-o-f-leaving">Date of Leaving</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('password') is-invalid @enderror" id="floatingSelectInstitution" value="{{ old('password') }}" type="password" name="password" placeholder="password" />
                    <label for="floatingInputName">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingSelectInstitution" value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" placeholder="password_confirmation" />
                    <label for="floatingInputName">Confirm Password</label>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card shadow-none border" data-component-card="data-component-card">
                    <div class="card-body p-0">
                        <div class="form-floating form-floating-advance-select">
                            <label for="floaTingLabelFacultyQualification">QUALIFICATION</label>
                            <select 
                                class="form-select" 
                                id="floaTingLabelFacultyQualification" 
                                data-choices="data-choices" 
                                multiple="multiple" 
                                name="qualification[]" 
                                data-options='{"removeItemButton":true,"placeholder":true}'>
                                
                                @php
                                    $qualifications = ['B.Tech', 'M.Tech', 'PhD', 'M.Sc', 'B.Sc'];
                                @endphp
                        
                                @foreach ($qualifications as $qualification)
                                    <option 
                                        value="{{ $qualification }}" 
                                        {{ in_array($qualification, old('qualification', $user->faculty->qualification ?? [])) ? 'selected' : '' }}>
                                        {{ $qualification }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card shadow-none border mb-4" data-component-card="data-component-card">
                    <div class="card-body p-0">
                        <div class="form-floating form-floating-advance-select">
                            <label for="floaTingLabelFacultySpecialization">Specialization</label>
                            <select 
                                class="form-select" 
                                id="floaTingLabelFacultySpecialization" 
                                data-choices="data-choices" 
                                multiple="multiple" 
                                name="specialization[]" 
                                data-options='{"removeItemButton":true,"placeholder":true}'>
                                
                                @php
                                    $specializations = [
                                        'Artificial Intelligence',
                                        'Data Science',
                                        'Cyber Security',
                                        'Robotics',
                                        'Quantum Computing',
                                        'Blockchain Technology',
                                        'Internet of Things',
                                        'Cloud Computing',
                                        'Augmented Reality',
                                        'Virtual Reality',
                                        'Machine Learning',
                                        'Big Data',
                                        'Bioinformatics',
                                        'Computer Vision',
                                        'Natural Language Processing',
                                        'Human-Computer Interaction',
                                        'Software Engineering',
                                        'Network Security',
                                        'Embedded Systems',
                                        'Mobile Computing',
                                    ];
                                @endphp
                
                                @foreach ($specializations as $specialization)
                                    <option 
                                        value="{{ $specialization }}" 
                                        {{ in_array($specialization, old('specialization', $user->faculty->specialization ?? [])) ? 'selected' : '' }}>
                                        {{ $specialization }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-4">Address Information</h4>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" id="floatingStudentAddress" placeholder="Leave a comment here" style="height: 128px" name="address">
                    </textarea>
                    <label for="floatingStudentAddress">Address</label>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end mt-6">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>    
@endsection