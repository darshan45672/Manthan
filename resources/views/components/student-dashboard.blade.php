@extends('layouts.dashboard')
@section('sidebar')
    <!-- Scrollbar removed -->
    <div class="navbar-vertical-content">
        <ul class="navbar-nav nav nav-pills flex-column" id="navbarVerticalNav" role="tablist">

            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab"
                    aria-controls="dashboard" aria-selected="true">
                    <div class="d-flex align-items-center"><span class="nav-link-text">Dashboard</span></div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="addActivity-tab" data-bs-toggle="tab" href="#addActivity" role="tab"
                    aria-controls="addActivity" aria-selected="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text">Add Activity</span></div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="viewActivity-tab" data-bs-toggle="tab" href="#viewActivity" role="tab"
                    aria-controls="viewActivity" aria-selected="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text">View Activity</span></div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="events-tab" data-bs-toggle="tab" href="#events" role="tab"
                    aria-controls="events" aria-selected="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text">Events</span></div>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <!-- Tab panes -->
    <div class="tab-content">

        <!-- Dashboard content  -->
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">      
            <div class="row gy-3 mb-6 justify-content-between">
                <div class="col-md-9 col-auto">
                    <h2 class="mb-2 text-body-emphasis">Report</h2>
                    {{-- <h5 class="text-body-tertiary fw-semibold">Here’s what’s going on at your business right now</h5> --}}
                </div>
                <div class="col-md-3 col-auto">
                    <div class="flatpickr-input-container"><input class="form-control ps-6 datetimepicker" id="datepicker"
                            type="text"
                            data-options='{"dateFormat":"M j, Y","disableMobile":true,"defaultDate":"Mar 1, 2022"}' /><span
                            class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span></div>
                </div>
            </div>
            <div class="row mb-3 gy-6">
                <div class="col-12 col-xxl-2">
                    <div class="row align-items-center g-3 g-xxl-0 h-100 align-content-between">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                            <div class="d-flex align-items-center"><span
                                    class="fs-4 lh-1 uil uil-books text-primary-dark"></span>
                                <div class="ms-2">
                                    <div class="d-flex align-items-end">
                                        <h2 class="mb-0 me-2">2</h2><span
                                            class="fs-7 fw-semibold text-body">Completed</span>
                                    </div>
                                    <p class="text-body-secondary fs-9 mb-0">Valued</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                            <div class="d-flex align-items-center"><span
                                    class="fs-4 lh-1 uil uil-users-alt text-success-dark"></span>
                                <div class="ms-2">
                                    <div class="d-flex align-items-end">
                                        <h2 class="mb-0 me-2">2</h2><span class="fs-7 fw-semibold text-body">In
                                            progress</span>
                                    </div>
                                    <p class="text-body-secondary fs-9 mb-0">To be assessed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                            <div class="d-flex align-items-center"><span
                                    class="fs-4 lh-1 uil uil-invoice text-warning-dark"></span>
                                <div class="ms-2">
                                    <div class="d-flex align-items-end">
                                        <h2 class="mb-0 me-2">1</h2><span class="fs-7 fw-semibold text-body">Pending</span>
                                    </div>
                                    <p class="text-body-secondary fs-9 mb-0">Soon to be done</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                            <div class="d-flex align-items-center"><span
                                    class="fs-4 lh-1 uil uil-refresh text-danger-dark"></span>
                                <div class="ms-2">
                                    <div class="d-flex align-items-end">
                                        <h2 class="mb-0 me-2">3</h2><span class="fs-7 fw-semibold text-body">Refunds</span>
                                    </div>
                                    <p class="text-body-secondary fs-9 mb-0">Fresh start</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-12 col-xl-12 col-xxl-5">
                    <div class="mx-xxl-0">
                        <h3>Activity: zero Roadmap</h3>
                        <p class="text-body-tertiary">Phase 2 is now ongoing</p>
                        <div class="gantt-zero-roadmap">
                            <div class="row g-2 flex-between-center mb-3">
                                <div class="col-12 col-sm-auto">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-end me-3"><label
                                                class="form-check-label mb-0 me-2 lh-1 text-body"
                                                for="progress">Progress</label>
                                            <div class="form-check form-switch min-h-auto mb-0"><input
                                                    class="form-check-input" id="progress" type="checkbox" checked=""
                                                    data-gantt-progress="data-gantt-progress" /></div>
                                        </div>
                                        <div class="d-flex align-items-end flex-1"><label
                                                class="form-check-label mb-0 me-2 lh-1 text-body"
                                                for="links">Links</label>
                                            <div class="form-check form-switch min-h-auto flex-1 mb-0"><input
                                                    class="form-check-input" id="links" type="checkbox"
                                                    checked="" data-gantt-links="data-gantt-links" /></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="btn-group" role="group" data-gantt-scale="data-gantt-scale"><input
                                            class="btn-check" id="weekView" type="radio" name="scaleView"
                                            value="week" checked="" /><label
                                            class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0"
                                            for="weekView">Week</label><input class="btn-check" id="monthView"
                                            type="radio" name="scaleView" value="month" /><label
                                            class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0"
                                            for="monthView">Month</label><input class="btn-check" id="yearView"
                                            type="radio" name="scaleView" value="year" /><label
                                            class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0"
                                            for="yearView">Year</label></div>
                                </div>
                            </div>
                            <div class="gantt-zero-roadmap-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis pt-7 pb-3 border-y">
                <div class="row">
                    <div class="col-12 col-xl-7 col-xxl-6">
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <h3 class="text-body-emphasis text-nowrap">Issues Discovered</h3>
                                <p class="text-body-tertiary mb-md-7">Newly found and yet to be solved</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fw-bold">Issue type </p>
                                    <p class="mb-0 fs-9">Total count <span class="fw-bold">257</span></p>
                                </div>
                                <hr class="bg-body-secondary mb-2 mt-2" />
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-info-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Product design</p>
                                    <h5 class="mb-0 text-body">78</h5>
                                </div>
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-warning-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Development</p>
                                    <h5 class="mb-0 text-body">63</h5>
                                </div>
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-danger-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">QA &amp; Testing</p>
                                    <h5 class="mb-0 text-body">56</h5>
                                </div>
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-success-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Customer queries</p>
                                    <h5 class="mb-0 text-body">36</h5>
                                </div>
                                <div class="d-flex align-items-center"><span
                                        class="d-inline-block bg-primary bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">R &amp; D</p>
                                    <h5 class="mb-0 text-body">24</h5>
                                </div><button class="btn btn-outline-primary mt-5">See Details<span
                                        class="fas fa-angle-right ms-2 fs-10 text-center"></span></button>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="position-relative mb-sm-4 mb-xl-0">
                                    <div class="echart-issue-chart" style="min-height:390px;width:100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5 col-xxl-6">
                        <h3>Project: eleven Progress</h3>
                        <p class="text-body-tertiary mb-0 mb-xl-3">End &amp; progress</p>
                        <div class="echart-zero-burnout-chart" style="min-height:320px;width:100%"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.addActivity')

        @include('dashboard.viewActivity')

        @include('dashboard.events')
    </div>
@endsection
