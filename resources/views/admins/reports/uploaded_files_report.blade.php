@extends('admins.layouts.app')

@push('title','تقرير أداء الجهات')

@push('styles')
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- DataTables -->
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link
        href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>
    <style>
        .performance
        {
            width: 51px;
            border: 6px;
            border-radius: 4px;
            padding: 3px;
            color: #fff;
            font-size: 12px;
        }
        .gehat div
        {
            margin-bottom: 30px;
        }

    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">تقرير  أداء  للجهات </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> التقارير </a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-size-15 mb-3"> أختر السنه </h3>
                    <div class="buttons d-flex mb-3" style="border-bottom: 1px solid #eee; padding-bottom: 22px;">
                        @foreach($years as $year)
                            <a data-id="{{$year->id}}"
                               href="{{ route('dashboard.mokasherat_files_report', ['kheta_id' => $year->kheta_id , 'year_id' => $year->id ]) }}"
                               class="me-2 btn @if($year_id == $year->id) btn-success @else btn-primary  @endif   waves-effect waves-light">{{ $year->year_name }}</a>
                        @endforeach
                    </div>
                    <h3 class="font-size-15 mb-3"> أختر الربع </h3>
                    <div class="buttons d-flex mb-3">
                        <a href="{{route('dashboard.mokasherat_files_report' ,['kheta_id'=>$kheta_id , 'year_id' => $year_id , 'part' => 1])}}"  class="btn @if(!empty($part))@if($part == 1 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الأول</a>
                        <a  href="{{route('dashboard.mokasherat_files_report' ,['kheta_id'=>$kheta_id ,  'year_id' => $year_id, 'part' => 2])}}"  class="btn @if(!empty($part))@if($part == 2 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الثانى </a>
                        <a href="{{route('dashboard.mokasherat_files_report' ,['kheta_id'=>$kheta_id ,   'year_id' => $year_id , 'part' => 3])}}"  class="btn @if(!empty($part))@if($part == 3 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الثالث </a>
                        <a  href="{{route('dashboard.mokasherat_files_report' ,['kheta_id'=>$kheta_id ,   'year_id' =>$year_id , 'part' => 4])}}"  class="btn @if(!empty($part))@if($part == 4 ) btn-success @else btn-primary  @endif @else btn-primary  @endif btn-sm" style="margin-left: 5px">الربع الرابع </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(!empty($results))
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المؤشر</th>
                                    <th>الجهات المنفذه </th>
                                    <th>ملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($results as $result)
                                    @if(!empty($part))
                                        @php
                                            $geha_execution = \App\Models\MokasherGehaInput::with('geha')->where('mokasher_id', $result->mokasher_id)->get();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $result->mokasher->name }}</td>
                                            <td>
                                                @foreach($geha_execution as $geha)
                                                    @php
                                                        if($geha->{"part_".$part} > 0 )
                                                         {
                                                             $performance = ($geha->{"rate_part_".$part}) / ($geha->{"part_".$part}) * 100;
                                                         }else{
                                                            $performance = 0 ;
                                                         }
                                                    @endphp
                                                    <div class="gehat">
                                                        <div>
                                                            {{ $geha->geha->geha }}
                                                            @if($performance < 50)
                                                                <span class="performance" style="background-color: #f00">{{ round($performance) }} %</span>
                                                            @elseif($performance >= 50 && $performance < 100)
                                                                <span class="performance" style="background-color: #f8de26">{{ round($performance) }} %</span>
                                                            @elseif($performance == 100)
                                                                <span class="performance" style="background-color: #00ff00">{{ round($performance) }} %</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if(!empty($result->note))
                                                    {{ $result->note }}
                                                @else
                                                    <span class="badge badge-soft-danger"> لا يوجد ملاحظات</span>
                                                @endif
                                            </td>
                                        </tr>


                                    @else
                                        @php
                                            $geha_execution  = \App\Models\MokasherGehaInput::with('mokasher' ,'geha')->withCount('mokasher')->where('geha_id' , $result->geha_id)->get();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @foreach($geha_execution as $geha)

                                                    @php
                                                        if(!empty($geha->evidence1)){
                                                            $part_1 = 1 ;
                                                        }else{
                                                            $part_1 = 0 ;
                                                        }

                                                       if(!empty($geha->evidence2)){
                                                            $part_2 = 1 ;
                                                        }else{
                                                            $part_2 = 0 ;
                                                        }

                                                       if(!empty($geha->evidence3)){
                                                            $part_3 = 1 ;
                                                        }else{
                                                            $part_3 = 0 ;
                                                        }

                                                      if(!empty($geha->evidence4)){
                                                            $part_4 = 1 ;
                                                        }else{
                                                            $part_4 = 0 ;
                                                        }

                                                      if($geha->mokasher_count  > 0 )
                                                      {
                                                       $performance = (($part_1 + $part_2 + $part_3 + $part_4) / $geha->mokasher_count) * 100 ;

                                                       }else
                                                       {
                                                        $performance = 0 ;
                                                       }
                                                    @endphp
                                                   {{$geha->geha->geha }}

                                                    @if($performance < 50 )
                                                        <span class="performance" style="background-color: #f00 ">{{round($performance)}} %</span>
                                                    @elseif($performance  >=  50 && $performance < 100 )
                                                        <span class="performance" style="background-color: #f8de26 ">{{round($performance)}} %</span>
                                                    @elseif($performance  ==  100)
                                                        <span class="performance" style="background-color: #00ff00 ">{{round($performance)}} %</span>
                                                    @endif


                                                @endforeach
                                            </td>
                                            <td>

                                            </td>

                                            <td> @if(!empty($result->note)){{$result->note}} @else  <span class="badge badge-soft-danger"> لا يوجد ملاحظات</span>@endif</td>
                                        </tr>
                                    @endif

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    @else
                        <span class="badge badge-soft-danger font-size-13">برجاء أختيار السنه  المطلوبه</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/sweet-alerts.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script
        src="{{asset(PUBLIC_PATH.'assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Responsive examples -->
    <script
        src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script
        src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/js/select2.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/datatables.init.js')}}"></script>

@endpush
