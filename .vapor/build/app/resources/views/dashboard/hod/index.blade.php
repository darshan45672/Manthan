@extends('layouts.dashboard.dashboard')

@section('content')
<div class="pb-5">
    <div class="mb-9">
        <div id="dept-faculties">
            <!-- data-list='{"valueNames":["studentName","usn","start","end","points","projectprogress","status","action"],"page":6,"pagination":true}' -->
            <div class="row mb-4 gx-6 gy-3 align-items-center">
                <div class="col-auto">
                    <h2 class="mb-0">HoD's<span class="fw-normal text-body-tertiary ms-3">({{ $hods->count() }})</span>
                    </h2>
                </div>

            </div>

            <div class="table-responsive scrollbar">
                <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="hod name" style="width:20%">NAME</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="email" style="width:10%">EMAIL</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="department" style="width:10%"> DEPARTMENT </th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="qualification" style="width:10%">QUALIFICATION </th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="specialization" style="width:10%"> SPECIALIZATION</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="experience" style="width:5%"> EXPERIENCE</th>
                            <th class="sort align-middle ps-3" scope="col" data-sort="doj" style="width:5%"> D.O.J</th>
                            <th class="sort align-middle text-end" scope="col" style="width:10%;"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="project-list-table-body">
                        @foreach ($hods as $hod)
                        <tr class="position-static">
                            <td class="align-middle time white-space-nowrap ps-0 facultyName py-4"><a
                                    class="fw-bold fs-8" href="#">{{ $hod->user->name }}</a>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ $hod->user->email }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap points ps-3 py-4">
                                <p class="fw-bo text-body fs-9 mb-0">{{ $hod->department->name }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap points ps-3 py-4">
                                <p class="fw-bo text-body fs-9 mb-0">{{ implode(', ', $hod->qualification) }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ implode(', ', $hod->specialization) }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ $hod->experience }}</p>
                            </td>
                            <td class="align-middle white-space-nowrap end ps-3 py-4">
                                <p class="mb-0 fs-9 text-body">{{ \Carbon\Carbon::parse($hod->joining_date)->format('M d, Y') }}</p>
                            </td>
                            <td class="align-middle text-end white-space-nowrap pe-0 action">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                        aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Remove</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection