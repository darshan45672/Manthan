@extends('layouts.dashboard.dashboard')

@section('content')
<h2 class="mb-4">Add an activity</h2>
<div class="row">
    <div class="col-xl-12">

        <form class="row g-3 mb-6" method="POST" action="{{ route('user.activity.update', $activity->id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="col-sm-6 col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" value="{{ $activity->title }}" placeholder="TITLE" name="title" />
                    <label for="floatingInputGrid">TITLE</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectAssignees" name="activity_type">
                        @foreach ($activityTypes as $type)
                        <option value="{{ $type->id }}" {{ $activity->activity_type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->title }}
                        </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectAssignees">Activity Type </label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectAssignees" name="peo">
                        @foreach ($peos as $item)
                        <option value="{{ $item->id }}" {{ $activity->program_expected_outcomes_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectAssignees">Activity Type </label>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="flatpickr-input-container">
                    <div class="form-floating">
                        <input class="form-control datetimepicker" id="floatingInputStartDate"  type="date" value="{{ $activity->start_date ? \Carbon\Carbon::parse($activity->start_date)->format('Y-m-d') : '' }}" 
                            placeholder="Start date" data-options='{"disableMobile":true}' name="start_date" />
                        <label class="ps-3" for="floatingInputStartDate">Start date</label>
                        <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4">
                <div class="flatpickr-input-container">
                    <div class="form-floating">
                        <input  class="form-control datetimepicker" id="floatingInputStartDate" type="date" value="{{ $activity->end_date ? \Carbon\Carbon::parse($activity->end_date)->format('Y-m-d') : '' }}" 
                            placeholder="Start date" data-options='{"disableMobile":true}' name="end_date" />
                        <label class="ps-3" for="floatingInputStartDate">End date</label>
                        <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                    <input class="form-control" type="number" value="{{ $activity->hours }}" name="hours" />
                    <label for="floatingSelectAssignees">DURATION </label></div>
            </div>
            <div class="col-12 gy-6">
                <div class="form-floating">
                    <textarea class="form-control" id="floatingProjectOverview" placeholder="Leave a comment here" name="description" style="height: 200px">
                        {!! $activity->description !!}
                    </textarea><label for="floatingProjectOverview">Activity overview</label>
                </div>
            </div>
            <div class="col-md-6 gy-6">
                <div class="form-floating">
                    <input class="form-control" id="floatingInputBudget" type="file" name="report" accept="application/pdf" />
                    <label class="form-label">Upload Report</label>
                </div>
            </div>
            <div class="col-md-6 gy-6">
                <div class="form-floating">
                    <input class="form-control" id="floatingInputBudget" type="file" name="certificate" accept="image/*" />
                    <label class="form-label">Upload Certificate</label>
                </div>
            </div>

            <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                    <div class="col-auto">
                        {{-- <button type="ca" class="btn btn-phoenix-primary px-5">Cancel</button> --}}
                        <a href="{{ route('user.activity.edit', $activity->id)}}" class="btn btn-phoenix-primary px-5">Cancel</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary px-5 px-sm-15">Update</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection