@extends('admins.layouts.app')
@push('title', __('admin-dashboard.Dashboard'))

<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/js/pages/apexcharts.init.js')}}"></script>

@section('content')
    <div class="row">
        @if(!empty($programs))
            @foreach ($programs  as $program)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 14px;margin-bottom: 30px;">{{ $program->program }}</h3>
                            <div id="year_chart{{$program->id}}"></div>
                        </div>
                    </div>
                </div>
                @php
                    $custom_programs = \App\Models\Program::withCount('moksherat')->with(['moksherat.mokasher_geha_inputs' => function ($query) use($program) {
                    $query->select('year_id',
                            DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                    )->groupBy('year_id');
                    }])->where('id', $program->id )->get() ;

                    $summations = [];
                    foreach ($custom_programs as $program) {
                        $total = 0;
                        if (!empty($program->moksherat)) {
                            foreach ($program->moksherat as $mokasher) {
                                if (!empty($mokasher->mokasher_geha_inputs)) {
                                    $total += $mokasher->mokasher_geha_inputs->percentage;
                                }
                            }
                        }
                        $summations[] = $total;
                    }

                @endphp

                <script>
                    var summations = {!! json_encode($summations) !!};
                    var colors = ['#f8de26']

                    var options = {
                        series: [{
                            data: summations
                        }],
                        chart: {
                            height: 350,
                            type: 'bar',
                            events: {
                                click: function (chart, w, e) {
                                    // console.log(chart, w, e)
                                }
                            }
                        },
                        colors: colors, // Assign the colors array here
                        plotOptions: {
                            bar: {
                                columnWidth: '20%',
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
                                @foreach($Execution_years as $year)
                                    '{{$year->year_name}}',
                                @endforeach
                            ],
                            labels: {
                                style: {
                                    colors: colors,
                                    fontSize: '12px'
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(document.querySelector("#year_chart{{$program->id}}"), options);
                    chart.render();
                </script>
            @endforeach
        @endif
@endsection

