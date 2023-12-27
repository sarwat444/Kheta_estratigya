@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Dashboard'))

@push('styles')@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.Dashboard')}}</h4>
    <div class="dashboard-info">
        <div class="row gy-2 gy-sm-6">
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <a class="dashboard-info__card-box" href="#">
                        <div class="dashboard-info__card-icon icon-color-01">
                            <i class="edumi edumi-open-book"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value">19</div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Enrolled Courses')}}</div>
                        </div>
                    </a>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <a class="dashboard-info__card-box" href="#">
                        <div class="dashboard-info__card-icon icon-color-02">
                            <i class="edumi edumi-streaming"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value">0</div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Active Courses')}}</div>
                        </div>
                    </a>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <a class="dashboard-info__card-box" href="#">
                        <div class="dashboard-info__card-icon icon-color-03">
                            <i class="edumi edumi-correct"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value">27</div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Completed Courses')}}</div>
                        </div>
                    </a>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <div class="dashboard-info__card-box">
                        <div class="dashboard-info__card-icon icon-color-04">
                            <i class="edumi edumi-group"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value">146</div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Total Students')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <div class="dashboard-info__card-box">
                        <div class="dashboard-info__card-icon icon-color-05">
                            <i class="edumi edumi-user-support"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value">1</div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Total Courses')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- Dashboard Info Card Start -->
                <div class="dashboard-info__card">
                    <div class="dashboard-info__card-box">
                        <div class="dashboard-info__card-icon icon-color-06">
                            <i class="edumi edumi-coin"></i>
                        </div>
                        <div class="dashboard-info__card-content">
                            <div class="dashboard-info__card-value"><span class="sale-price">$383.<small class="separator">01</small></span></div>
                            <div class="dashboard-info__card-heading">{{__('instructor-dashboard.Total Earnings')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Info Card End -->
            </div>
        </div>
        <div class="row statistics">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('instructor-dashboard.Users Statistics')}}</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('instructor-dashboard.courses Statistics')}}</h3>
                    </div>
                    <div class="card-body">
                        <div id="courses">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @include('instructors.dashboard.scripts.courses-statistics')
    @include('instructors.dashboard.scripts.chart')
@endpush
