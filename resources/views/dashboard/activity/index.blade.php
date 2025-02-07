@extends('layouts.dashboard.dashboard')

@section('content')
<div class="mb-9">
    <div id="projectSummary">

        <div class="row mb-4 gx-6 gy-3 align-items-center">
            <div class="col-auto">
                <h2 class="mb-0">Activities<span class="fw-normal text-body-tertiary ms-3">({{ $activities->count() }})</span>
                </h2>
            </div>

        </div>

        <div class="table-responsive scrollbar">
            <table class="table fs-9 mb-0 border-top border-translucent">
                <thead>
                    <tr>
                        <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="activityTitle" style="width:38%;">TITLE</th>
                        <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="activityType" style="width:10%;">Student</th>
                        <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="activityType" style="width:10%;">Activity Type</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="start" style="width:5%;"> START DATE</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="end" style="width:5%;">END DATE</th>
                        <th class="sort align-middle" scope="col" data-sort="statuses" style="width:10%;">STATUS</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="points" style="width:10%;"> POINTS </th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="points" style="width:10%;"> Download Report </th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="points" style="width:10%;"> Download Certificates </th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="points" style="width:10%;"> Duration(hours) </th>
                        @if (Auth::user()->role == 'faculty' && Auth::user()->faculty->is_cordinator)
                        <th class="sort align-middle text-end" scope="col" style="width:10%;"></th>
                        @endif
                    </tr>
                </thead>
                <tbody class="list" id="project-list-table-body">
                    @if ($activities->isEmpty())
                    <center>
                        <tr class="position-static">
                            <td class="align-center justify-content-center time white-space-nowrap ps-0 activityTitle py-4" colspan="10">
                                <h1>No Activities Found</h1>
                            </td>
                        </tr>
                    </center>
                    @endif
                    @foreach ($activities as $activity)
                    <tr class="position-static">
                        <td class="align-middle time white-space-nowrap ps-0 activityTitle py-4">
                            <a class="fw-bold fs-9" href="#">{{ $activity->title }}</a>
                        </td>
                        
                        <td class="align-middle time white-space-nowrap ps-0 activityTitle py-4">
                            <p class="fs-9 text-body mb-0" >{{ $activity->student->user->name }}</p class="fs-9">
                        </td>

                        <td class="align-middle time white-space-nowrap ps-0 activityTitle py-4">
                            <p class="fs-9 text-body mb-0" >{{ $activity->activityType->title }}</p class="fs-9">
                        </td>

                        <td class="align-middle white-space-nowrap start ps-3 py-4">
                            <p class="mb-0 fs-9 text-body">{{ \Carbon\Carbon::parse($activity->start_date)->format('M d, Y') }}</p>
                        </td>
                        <td class="align-middle white-space-nowrap end ps-3 py-4">
                            <p class="mb-0 fs-9 text-body">{{ \Carbon\Carbon::parse($activity->end_date)->format('M d, Y') }}</p>
                        </td>
                        <td class="align-middle white-space-nowrap statuses">
                            @if ($activity->status == 'approved')
                                <span class="badge badge-phoenix fs-9 badge-phoenix-success">{{ $activity->status }}</span>
                            @elseif ($activity->status == 'pending')
                                <span class="badge badge-phoenix fs-9 badge-phoenix-warning">{{ $activity->status }}</span>
                            @else
                            <span class="badge badge-phoenix fs-9 pt-1 badge-phoenix-danger">{{ $activity->status }}</span>
                            @endif
                        </td>
                        <td class="align-middle white-space-nowrap points ps-3 py-4">
                            <p class="fw-bo text-body fs-9 mb-0">{{ $activity->activityType->credits }}</p>
                        </td>
                        <td class="align-middle white-space-nowrap points ps-3 py-4">
                                <a href="{{ Storage::disk('s3')->url($activity->file) }}" target="_blank" download class="fw-bo fs-9 mb-0"> Download</a>
                        </td>
                        <td class="align-middle white-space-nowrap points ps-3 py-4">
                            <a href="{{ Storage::disk('s3')->url($activity->certificate) }}" target="_blank" download class="fw-bo fs-9 mb-0"> Download</a>
                        </td>
                        <td class="align-middle white-space-nowrap points ps-3 py-4">
                            <p class="fw-bo text-body fs-9 mb-0">{{ $activity->hours }}</p>
                        </td>
                        @if (Auth::user()->role == 'faculty' && Auth::user()->faculty->is_cordinator)
                        <td class="align-middle text-end white-space-nowrap pe-0 action">
                            <div class="btn-reveal-trigger position-static">
                                <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <span class="fas fa-ellipsis-h fs-10"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2">
                                    @if (Auth::user()->role == 'student')
                                    <a class="dropdown-item" href="{{ route('user.activity.edit', $activity->id) }}">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('user.activity.destroy', $activity->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Remove</a>
                                    </form>
                                    @endif
                                    @if (Auth::user()->role == 'faculty' && Auth::user()->faculty->is_cordinator)
                                    <form action="{{ route('user.activity.status', [$activity->id, 1]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-success">Approve</a>
                                    </form>
                                    <form action="{{ route('user.activity.status', [$activity->id, 2] ) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Reject</a>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{-- <div class="d-flex flex-wrap align-items-center justify-content-between py-3 pe-0 fs-9 border-bottom border-translucent">
            <div class="d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p>
                <a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1"
                        data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!"
                    data-list-view="less">View Less<span class="fas fa-angle-right ms-1"
                        data-fa-transform="down-1"></span></a>
            </div>
            <div class="d-flex"><button class="page-link" data-list-pagination="prev"><span
                        class="fas fa-chevron-left"></span></button>
                <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span
                        class="fas fa-chevron-right"></span></button>
            </div>
        </div> --}}
    </div>
</div>
@endsection