@extends('admins.layouts.app')
@push('title', __('admin-dashboard.Dashboard'))
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/js/pages/apexcharts.init.js')}}"></script>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">المؤشرات </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">المؤشرات</a></li>
                        <li class="breadcrumb-item active">  البرامج  </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-xl-6">
            <div class="d-flex flex-wrap gap-2 mb-3">
                @foreach($Execution_years as $year)
                    <a href="{{route('dashboard.mokashrat_statastics' ,['kheta_id'=>$kheta_id , 'program_id'=>$program_id , 'year_id' => $year->id]  )}}" class="btn @if($year_id == $year->id) btn-success @else btn-primary  @endif  waves-effect waves-light">{{$year->year_name}}</a>
                @endforeach
            </div>

            <div class="buttons d-flex mb-2">
                <a href="{{route('dashboard.mokashrat_statastics' ,['kheta_id'=>$kheta_id , 'program_id'=>$program_id , 'year_id' => $year_id , 'part' => 1])}}"  class="btn @if(!empty($part))@if($part == 1 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الأول</a>
                <a  href="{{route('dashboard.mokashrat_statastics' ,['kheta_id'=>$kheta_id , 'program_id'=>$program_id , 'year_id' => $year_id, 'part' => 2])}}"  class="btn @if(!empty($part))@if($part == 2 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الثانى </a>
                <a href="{{route('dashboard.mokashrat_statastics' ,['kheta_id'=>$kheta_id , 'program_id'=>$program_id , 'year_id' => $year_id , 'part' => 3])}}"  class="btn @if(!empty($part))@if($part == 3 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الثالث </a>
                <a  href="{{route('dashboard.mokashrat_statastics' ,['kheta_id'=>$kheta_id , 'program_id'=>$program_id , 'year_id' =>$year_id , 'part' => 4])}}"  class="btn @if(!empty($part))@if($part == 4 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الرابع </a>
            </div>

        </div>
    </div>

    <div class="row">
        @if(!empty($mokashers))
            @foreach ($mokashers  as $mokasher)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18"><i
                                                        class="bx bx-copy-alt"></i></span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">{{ $mokasher->name }}</h5>
                                </div>
                                <div class="text-muted mt-2">
                                    <div id="radialBar-chart{{$mokasher->id}}"></div>
                                </div>
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
                        series: [@if(!empty($mokasher->mokasher_geha_inputs)){{round($mokasher->mokasher_geha_inputs->percentage)}} @else 0 @endif],
                        labels: [""]
                    };
                    (chart = new ApexCharts(document.querySelector("#radialBar-chart{{$mokasher->id}}"), options)).render();
                </script>
            @endforeach
        @endif
    </div>
@endsection
@push('scripts')
@endpush


