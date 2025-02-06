@extends('layouts.dashboard.dashboard')

@section('content')
<h2 class="mb-4">Add an activity</h2>
<div class="row">
    <div class="col-xl-12">

        {{-- Display validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row g-3 mb-6" method="POST" action="{{ route('user.activity.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6 col-md-6">
                <div class="form-floating">
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="floatingInputGrid" 
                        placeholder="TITLE" 
                        name="title" 
                        value="{{ old('title') }}" />
                    <label for="floatingInputGrid">TITLE</label>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-floating">
                    <select 
                        class="form-select @error('activity_type') is-invalid @enderror" 
                        id="floatingSelectAssignees" 
                        name="activity_type">
                        <option value="">Select Activity Type</option>
                        @foreach ($activityTypes as $type)
                            <option value="{{ $type->id }}" {{ old('activity_type') == $type->id ? 'selected' : '' }}>
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectAssignees">Activity Type </label>
                    @error('activity_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-floating">
                    <select 
                        class="form-select @error('peo') is-invalid @enderror" 
                        id="floatingSelectAssignees" 
                        name="peo">
                        <option value="">Select PEO</option>
                        @foreach ($peos as $item)
                            <option value="{{ $item->id }}" {{ old('peo') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectAssignees">PEO </label>
                    @error('peo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="flatpickr-input-container">
                    <div class="form-floating">
                        <input 
                            class="form-control datetimepicker @error('start_date') is-invalid @enderror" 
                            id="floatingInputStartDate"  
                            type="date"
                            placeholder="Start date" 
                            name="start_date"
                            value="{{ old('start_date') }}" />
                        <label for="floatingInputStartDate">Start date</label>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4">
                <div class="flatpickr-input-container">
                    <div class="form-floating">
                        <input 
                            class="form-control datetimepicker @error('end_date') is-invalid @enderror" 
                            id="floatingInputStartDate" 
                            type="date" 
                            placeholder="End date" 
                            name="end_date" 
                            value="{{ old('end_date') }}" />
                        <label for="floatingInputStartDate">End date</label>
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input 
                        class="form-control @error('hours') is-invalid @enderror" 
                        type="number" 
                        name="hours" 
                        value="{{ old('hours') }}" />
                    <label for="floatingSelectAssignees">DURATION </label>
                    @error('hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 gy-6">
                <div class="form-floating">
                    <textarea 
                        class="form-control @error('description') is-invalid @enderror" 
                        id="floatingProjectOverview" 
                        placeholder="Leave a comment here" 
                        name="description" 
                        style="height: 200px">{{ old('description') }}</textarea>
                    <label for="floatingProjectOverview">Activity overview</label>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 gy-6">
                <div class="form-floating">
                    <input 
                        class="form-control @error('report') is-invalid @enderror" 
                        id="floatingInputBudget" 
                        type="file" 
                        name="report" 
                        accept="application/pdf" />
                    <label class="form-label">Upload Report</label>
                    @error('report')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 gy-6">
                <div class="form-floating">
                    <input 
                        class="form-control @error('certificate') is-invalid @enderror" 
                        id="floatingInputBudget" 
                        type="file" 
                        name="certificate" 
                        accept="image/*" />
                    <label class="form-label">Upload Certificate</label>
                    @error('certificate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                    <div class="col-auto">
                        <a href="{{ route('user.activity.create')}}" class="btn btn-phoenix-primary px-5">Cancel</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary px-5 px-sm-15">Submit</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
