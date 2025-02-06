@extends('layouts.dashboard.dashboard')

@section('content')
<div class="pb-5">
    <div class="mb-9">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div id="dept-faculties">
            <!-- data-list='{"valueNames":["studentName","usn","start","end","points","projectprogress","status","action"],"page":6,"pagination":true}' -->
            <div class="row mb-4 gx-6 gy-3 align-items-center">
                <div class="col-auto">
                    <h2 class="mb-0">Faculties<span class="fw-normal text-body-tertiary ms-3">({{ $faculties->count() }})</span>
                    </h2>
                </div>

            </div>

            <div class="table-responsive scrollbar">
                <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="faculty name" style="width:10%">NAME</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="email" style="width:10%">EMAIL</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="phone" style="width:10%;"> PHONE</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="designation" style="width:10%"> DESIGNATION </th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="qualification" style="width:10%"> QUALIFICATION </th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="experience" style="width:10%"> EXPERIENCE</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="doj" style="width:10%"> D.O.J </th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="doj" style="width:10%"> Is Cordiantor </th>
                            @if (Auth::user()->role == 'faculty' && Auth::user()->role == 'HoD')
                            <th class="sort align-middle text-end" scope="col" style="width:10%;"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="list" id="project-list-table-body">
                        @foreach ($faculties as $faculty)
                        <tr class="position-static">
                            <td class="align-middle time white-space-nowrap ps-0 facultyName py-4">
                                <a class="fw-bold fs-8" href="#">{{ $faculty->user->name }}</a>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ $faculty->user->email }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap points ps-3 py-4">
                                <p class="fw-bo text-body fs-9 mb-0">{{ $faculty->user->phone }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap points ps-3 py-4">
                                <p class="fw-bo text-body fs-9 mb-0">{{ $faculty->designation }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ implode(', ', $faculty->qualification) }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ $faculty->experience }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ \Carbon\Carbon::parse($faculty->joining_date)->format('M d, Y') }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ $faculty->is_cordinator ? "yes" : 'no' }}</p>
                            </td>
                            
                            @if (Auth::user()->role == 'faculty' && Auth::user()->role == 'HoD')
                            <td class="align-middle text-end white-space-nowrap pe-0 action">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                        aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('user.faculty.destroy', $faculty->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Remove</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection