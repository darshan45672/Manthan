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
        <form class="row g-3 mb-9" method="POST" action="{{ route('user.students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-end position-relative mb-7">
                <input class="" id="upload-avatar" name="image" type="file" />
            </div>
            <h4 class="mb-3">Details</h4>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" id="floatingSelectInstitution" value="{{ old('name') }}" name="name" placeholder="Name" />
                    <label for="floatingInputName">Name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('usn') is-invalid @enderror" id="floatingInputUsn" type="text" placeholder="USN" name="usn" value="{{ old('usn') }}" />
                    <label for="floatingInputUsn">USN</label>
                    @error('usn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('email') is-invalid @enderror" id="floatingInputEmail" type="email" placeholder="Email" name="email" value="{{ old('email') }}" />
                    <label for="floatingInputEmail">Email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control @error('phone') is-invalid @enderror" id="floatingInputPhone" type="tel" placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                    <label for="floatingInputPhone">Phone</label>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select @error('college') is-invalid @enderror" id="floatingSelectInstitution" name="college">
                        @foreach ($colleges as $item)
                            <option value="{{ $item->id }}" {{ old('college') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelectInstitution">Institution</label>
                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select @error('department') is-invalid @enderror" id="floatingSelectBranch" name="department">
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('department') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelectBranch">Branch</label>
                    @error('department')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <select class="form-select @error('semester') is-invalid @enderror" id="floatingSelectSemester" name="semester">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>{{ $i }}th</option>
                        @endfor
                    </select>
                    <label for="floatingSelectSemester">Semester</label>
                    @error('semester')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
            <h4 class="mt-6">Address Information</h4>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control @error('address') is-invalid @enderror" id="floatingStudentAddress" placeholder="Address" style="height: 128px" name="address">{{ old('address') }}</textarea>
                    <label for="floatingStudentAddress">Address</label>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end mt-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
