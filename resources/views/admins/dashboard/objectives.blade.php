@extends('admins.layouts.app')
@push('title', __('admin-dashboard.Dashboard'))
<script src="{{asset('assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/apexcharts.init.js')}}"></script>
@section('content')

    <div class="row mt-2">
        <div class="col-xl-6">
            <div class="d-flex flex-wrap gap-2 mb-2">
                @foreach($Execution_years as $year)
                    <a data-id="{{$year->id}}" href="{{ route('dashboard.objectivesDashboard', ['year_id' => $year->id , 'kheta_id' => $year->kheta_id]) }}" class="btn @if($year_id == $year->id) btn-success @else btn-primary  @endif   waves-effect waves-light">{{ $year->year_name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        @if(!empty($objectives))
            @foreach ($objectives  as $ob_key => $objective)
                @php
                     $goals_count = $objective->goals_count;
                     $total = 0 ;
                     $ob_mokasher = [];
                     $programs_count= [] ;
                @endphp
                @if(!empty($objective->goals))
                    @foreach ($objective->goals  as  $key =>  $goal)
                        @php
                            $programs_count  = $goal->programs->count() ;
                            if(!empty($goal->programs))
                            {
                                foreach ($goal->programs as $program){
                                    if(!empty($program->moksherat)){

                                        $ob_mokasher[] = $program->moksherat->count();

                                        foreach ($program->moksherat as $mokasher)
                                        {
                                            if(!empty($mokasher->mokasher_geha_inputs))
                                            {
                                                   $total += $mokasher->mokasher_geha_inputs->percentage ;
                                            }
                                        }
                                    }
                                }
                            }
                        @endphp
                    @endforeach
                @endif
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <a  href="{{route('dashboard.goal_statastics',['kheta_id' => $kheta_id ,'objective_id' => $objective->id  ,'year_id' => 2])}}">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18"><i
                                                        class="bx bx-copy-alt"></i></span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">{{ $objective->objective }}</h5>
                                </div>
                                <div class="text-muted mt-2">
                                    <div id="radialBar-chart{{$objective->id}}"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                    options = {
                        chart: {height: 200, type: "radialBar", offsetY: -10},
                        plotOptions: {
                            radialBar: {
                                startAngle: -135,
                                endAngle: 135,
                                dataLabels: {
                                    name: {fontSize: "13px", color: void 0, offsetY: 60},
                                    value: {
                                        offsetY: 22, fontSize: "16px", color: function ({value, seriesIndex}) {
                                            console.log('value:', value);
                                            console.log('seriesIndex:', seriesIndex);
                                            if (seriesIndex === 0) {
                                                if (value <= 30) {
                                                    console.log('Color: Red');
                                                    return "#ff0000"; // Red color
                                                } else if (value > 50) {
                                                    console.log('Color: Blue');
                                                    return "#007bff"; // Blue color
                                                } else {
                                                    console.log('Color: Green');
                                                    return "#00ff00"; // Green color
                                                }
                                            }
                                            console.log('Color: Default');
                                            return ""; // Default color
                                        },
                                        formatter: function (e) {
                                            return e + "%";
                                        }
                                    }
                                }
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shade: "dark",
                                shadeIntensity: 0.15,
                                inverseColors: false,
                                opacityFrom: 1,
                                opacityTo: 1,
                                stops: [0, 50, 65, 91]
                            }
                        },
                        stroke: {dashArray: 4},
                        series: [
                            @if(!empty($goals_count) && $goals_count > 0 )
                                @if(!empty($programs_count) && $programs_count > 0 )
                                @if(!empty($ob_mokasher[$ob_key]) && $ob_mokasher[$ob_key] > 0 )
                                {{round((($total/$ob_mokasher[$ob_key])/($programs_count))/($goals_count))}}
                                @else
                                0
                            @endif
                                @else
                                0
                            @endif
                                @else
                                0
                            @endif
                        ],
                        labels: [""]
                    };
                    (chart = new ApexCharts(document.querySelector("#radialBar-chart{{$objective->id}}"), options)).render();
                </script>
            @endforeach
        @endif
    </div>
@endsection
@push('scripts')

@endpush

