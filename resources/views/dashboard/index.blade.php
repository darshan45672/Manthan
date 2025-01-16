@extends('layouts.dashboard.dashboard')

@section('content')

@if (Auth::user()->role == 'student')
<div class="pb-5">
    <div class="row g-4">
        <div class="col-12 col-xxl-12 ">
            <div class="mb-8">
                <h2 class="mb-2">Student Dashboard</h2>
                <h5 class="text-body-tertiary fw-semibold">Track your progress</h5>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">5 Participation</h4>
                            <p class="text-body-secondary fs-9 mb-0">Participated events</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">2 Acceptance</h4>
                            <p class="text-body-secondary fs-9 mb-0">Reports accepted</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center">
                        <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
                            <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light" data-fa-transform="down-4 rotate--10 left-4"></span>
                            <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning" data-fa-transform="up-4 right-3 grow-2"></span>
                            <span class="fa-stack-1x fa-solid fa-star text-warning " data-fa-transform="shrink-2 up-8 right-6"></span>
                        </span>
                        <div class="ms-3">
                            <h4 class="mb-0">2 In-progress</h4>
                            <p class="text-body-secondary fs-9 mb-0">Reports under evaluation</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-pause text-danger "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">1 Pending</h4>
                            <p class="text-body-secondary fs-9 mb-0">Activity yet to be done</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-body-secondary mb-6 mt-4" />
        </div>

        <div class="col-12 col-xxl-12">
            <div class="row g-3">
                <div class="col-12 col-md-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Events</h5>
                                    <h6 class="text-body-tertiary">My participation</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-event-completions-per-student" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">FDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">0</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">SDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">STTP</h6>
                                    <h6 class="text-body fw-semibold mb-0">5</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Workshop</h6>
                                    <h6 class="text-body fw-semibold mb-0">2 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Seminar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Conference</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Weninar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Hackathon</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Bootcamp</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Other</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif (Auth::user()->role == 'faculty')
<div class="pb-5">
    <div class="row g-4">
        <div class="col-12 col-xxl-12 ">
            <div class="mb-8">
                <h2 class="mb-2">Faculty Dahboard</h2>
                <h5 class="text-body-tertiary fw-semibold">Here's what's going on at your department</h5>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">500 Students</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total students in the department</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-warning "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">45 Events</h4>
                            <p class="text-body-secondary fs-9 mb-0">SDP Registrations</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-pause text-danger "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">350 Submissions</h4>
                            <p class="text-body-secondary fs-9 mb-0">350/500 AICTE report Submissionsp>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-body-secondary mb-6 mt-4" />
        </div>

        <div class="col-12 col-xxl-12">
            <div class="row g-3">
                <!-- <div class="col-12 col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div>
                    <h5 class="mb-1">Total orders<span
                        class="badge badge-phoenix badge-phoenix-warning rounded-pill fs-9 ms-2"><span
                          class="badge-label">-6.8%</span></span></h5>
                    <h6 class="text-body-tertiary">Last 7 days</h6>
                  </div>
                  <h4>16,247</h4>
                </div>
                <div class="d-flex justify-content-center px-4 py-6">
                  <div class="echart-total-orders" style="height:85px;width:115px"></div>
                </div>
                <div class="mt-2">
                  <div class="d-flex align-items-center mb-2">
                    <div class="bullet-item bg-primary me-2"></div>
                    <h6 class="text-body fw-semibold flex-1 mb-0">Completed</h6>
                    <h6 class="text-body fw-semibold mb-0">52%</h6>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="bullet-item bg-primary-subtle me-2"></div>
                    <h6 class="text-body fw-semibold flex-1 mb-0">Pending payment</h6>
                    <h6 class="text-body fw-semibold mb-0">48%</h6>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

                <!-- <div class="col-12 col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div>
                    <h5 class="mb-1">New customers<span
                        class="badge badge-phoenix badge-phoenix-warning rounded-pill fs-9 ms-2"> <span
                          class="badge-label">+26.5%</span></span></h5>
                    <h6 class="text-body-tertiary">Last 7 days</h6>
                  </div>
                  <h4>356</h4>
                </div>
                <div class="pb-0 pt-4">
                  <div class="echarts-new-customers" style="height:180px;width:100%;"></div>
                </div>
              </div>
            </div>
          </div> -->
                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Student Summary</h5>
                                    <h6 class="text-body-tertiary">By Semester</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-student-summary-by-semester" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 1</h6>
                                    <h6 class="text-body fw-semibold mb-0">60 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 2</h6>
                                    <h6 class="text-body fw-semibold mb-0">68 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 3</h6>
                                    <h6 class="text-body fw-semibold mb-0">64 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 4</h6>
                                    <h6 class="text-body fw-semibold mb-0">56 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 5</h6>
                                    <h6 class="text-body fw-semibold mb-0">66 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 6</h6>
                                    <h6 class="text-body fw-semibold mb-0">69 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 7</h6>
                                    <h6 class="text-body fw-semibold mb-0">65 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 8</h6>
                                    <h6 class="text-body fw-semibold mb-0">65 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Events</h5>
                                    <h6 class="text-body-tertiary">Various events conducted</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-event-completions" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">FDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">SDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">STTP</h6>
                                    <h6 class="text-body fw-semibold mb-0">5</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Workshop</h6>
                                    <h6 class="text-body fw-semibold mb-0">2 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Seminar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Conference</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Weninar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Hackathon</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Bootcamp</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Other</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Activity Report Submissions</h5>
                                    <h6 class="text-body-tertiary">By Semester, out of 5</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-activity-report-submissions" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 1</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 2</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 3</h6>
                                    <h6 class="text-body fw-semibold mb-0">5/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 4</h6>
                                    <h6 class="text-body fw-semibold mb-0">2/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 5</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 6</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 7</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 8</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@elseif (Auth::user()->role == 'HoD')
<div class="pb-5">
    <div class="row g-4">

        <div class="col-12 col-xxl-12 ">
            <div class="mb-8">
                <h2 class="mb-2">HoD Dahboard</h2>
                <h5 class="text-body-tertiary fw-semibold">Here's what's going on at your department</h5>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">500 Students</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total students in the department</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-warning "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">45 Events</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total events conducted</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-pause text-danger "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">350 Submissions</h4>
                            <p class="text-body-secondary fs-9 mb-0">350/500 AICTE report Submissionsp>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-body-secondary mb-6 mt-4" />
        </div>

        <div class="col-12 col-xxl-12">
            <div class="row g-3">

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Faculty Summary</h5>
                                    <h6 class="text-body-tertiary">Department faculties summarized based on
                                        designation</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-faculty-summary-by-designation" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Professors</h6>
                                    <h6 class="text-body fw-semibold mb-0">5 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Associate professors</h6>
                                    <h6 class="text-body fw-semibold mb-0">10 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Assistant professors</h6>
                                    <h6 class="text-body fw-semibold mb-0">5 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Guest Lec turer</h6>
                                    <h6 class="text-body fw-semibold mb-0">10 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Student Summary</h5>
                                    <h6 class="text-body-tertiary">By Semester</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-student-summary-by-semester" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 1</h6>
                                    <h6 class="text-body fw-semibold mb-0">60 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 2</h6>
                                    <h6 class="text-body fw-semibold mb-0">68 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 3</h6>
                                    <h6 class="text-body fw-semibold mb-0">64 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 4</h6>
                                    <h6 class="text-body fw-semibold mb-0">56 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 5</h6>
                                    <h6 class="text-body fw-semibold mb-0">66 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 6</h6>
                                    <h6 class="text-body fw-semibold mb-0">69 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 7</h6>
                                    <h6 class="text-body fw-semibold mb-0">65 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 8</h6>
                                    <h6 class="text-body fw-semibold mb-0">65 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Activity Report Submissions</h5>
                                    <h6 class="text-body-tertiary">By Semester, out of 5</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-activity-report-submissions" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 1</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 2</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 3</h6>
                                    <h6 class="text-body fw-semibold mb-0">5/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 4</h6>
                                    <h6 class="text-body fw-semibold mb-0">2/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 5</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 6</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 7</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 8</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Events</h5>
                                    <h6 class="text-body-tertiary">Various events conducted</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-event-completions" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">FDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">SDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">STTP</h6>
                                    <h6 class="text-body fw-semibold mb-0">5</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Workshop</h6>
                                    <h6 class="text-body fw-semibold mb-0">2 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Seminar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Conference</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Weninar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Hackathon</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Bootcamp</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Other</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@elseif (Auth::user()->role == 'Principle')
<div class="pb-5">
    <div class="row g-4">

        <div class="col-12 col-xxl-12 ">
            <div class="mb-8">
                <h2 class="mb-2">Principal Dahboard</h2>
                <h5 class="text-body-tertiary fw-semibold">Here's what's going on in your college</h5>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">5000 Students</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total students in the college</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-success "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">1000 Faculties</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total faculties in the college</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-star text-warning "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">45 Events</h4>
                            <p class="text-body-secondary fs-9 mb-0">Total events conducted</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><span class="fa-stack"
                            style="min-height: 46px;min-width: 46px;"><span
                                class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                data-fa-transform="down-4 rotate--10 left-4"></span><span
                                class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                data-fa-transform="up-4 right-3 grow-2"></span><span
                                class="fa-stack-1x fa-solid fa-pause text-danger "
                                data-fa-transform="shrink-2 up-8 right-6"></span></span>
                        <div class="ms-3">
                            <h4 class="mb-0">3550 Submissions</h4>
                            <p class="text-body-secondary fs-9 mb-0">3550/5000 AICTE report Submissionsp>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-body-secondary mb-6 mt-4" />
        </div>

        <div class="col-12 col-xxl-12">
            <div class="row g-3">

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Faculty Summary</h5>
                                    <h6 class="text-body-tertiary">Faculties of all departments</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-faculty-summary-by-department" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">CSE</h6>
                                    <h6 class="text-body fw-semibold mb-0">50 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ISE</h6>
                                    <h6 class="text-body fw-semibold mb-0">45 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ECE</h6>
                                    <h6 class="text-body fw-semibold mb-0">30 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Mech</h6>
                                    <h6 class="text-body fw-semibold mb-0">25 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Civil</h6>
                                    <h6 class="text-body fw-semibold mb-0">28 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">AIDS</h6>
                                    <h6 class="text-body fw-semibold mb-0">15 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">AIML</h6>
                                    <h6 class="text-body fw-semibold mb-0">12 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ICB</h6>
                                    <h6 class="text-body fw-semibold mb-0">10 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Student Summary</h5>
                                    <h6 class="text-body-tertiary">Students of all departments</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-student-summary-by-department" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">CSE</h6>
                                    <h6 class="text-body fw-semibold mb-0">500 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ISE</h6>
                                    <h6 class="text-body fw-semibold mb-0">450 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ECE</h6>
                                    <h6 class="text-body fw-semibold mb-0">300 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Mech</h6>
                                    <h6 class="text-body fw-semibold mb-0">250 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Civil</h6>
                                    <h6 class="text-body fw-semibold mb-0">280 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">AIDS</h6>
                                    <h6 class="text-body fw-semibold mb-0">150 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">AIML</h6>
                                    <h6 class="text-body fw-semibold mb-0">120 </h6>
                                </div>
                                <div class="d-flex align-items-center  mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">ICB</h6>
                                    <h6 class="text-body fw-semibold mb-0">100 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Activity Report Submissions</h5>
                                    <h6 class="text-body-tertiary">By Semester, out of 5</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-activity-report-submissions" style="height:300px;width:100%;"></div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 1</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 2</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 3</h6>
                                    <h6 class="text-body fw-semibold mb-0">5/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 4</h6>
                                    <h6 class="text-body fw-semibold mb-0">2/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 5</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 6</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 7</h6>
                                    <h6 class="text-body fw-semibold mb-0">4/5 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Semester 8</h6>
                                    <h6 class="text-body fw-semibold mb-0">3/5 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-2">Events</h5>
                                    <h6 class="text-body-tertiary">Various events conducted</h6>
                                </div>
                            </div>
                            <div class="pb-4 pt-3">
                                <div class="echart-event-completions" style="height:300px;width:100%;">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">FDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-secondary me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">SDP</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-info me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">STTP</h6>
                                    <h6 class="text-body fw-semibold mb-0">5</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-success me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Workshop</h6>
                                    <h6 class="text-body fw-semibold mb-0">2 </h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-warning me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Seminar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-danger me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Conference</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Weninar</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Hackathon</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2 me-3">
                                    <div class="bullet-item bg-primary-dark me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Bootcamp</h6>
                                    <h6 class="text-body fw-semibold mb-0">4</h6>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bullet-item bg-info-light me-2"></div>
                                    <h6 class="text-body fw-semibold mb-0 me-3">Other</h6>
                                    <h6 class="text-body fw-semibold mb-0">3</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>
</div>
@endif

@endsection