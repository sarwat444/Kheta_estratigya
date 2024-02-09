@extends('admins.layouts.app')
@push('title', __('admin-dashboard.Dashboard'))
@push('scripts')
    <script src="{{asset(PUBLIC_PATH.'assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'assets/admin/js/pages/apexcharts.init.js')}}"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        @endsection
        @push('scripts')
            <script>
                var colors = ['#556ee6', '#556ee6', '#556ee6', '#556ee6'];
                var options = {
                    series: [{
                        data: [21, 22, 10, 28]
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                                // console.log(chart, w, e)
                            }
                        }
                    },
                    colors: colors, // Assign the colors array here
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: [
                            'الربع الأول ',
                            'الربع الثانى ',
                            'الربع الثالث ',
                            'الربع الرابع '
                        ],
                        labels: {
                            style: {
                                colors: colors,
                                fontSize: '12px'
                            }
                        }
                    }
                };
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();

            </script>
    @endpush

