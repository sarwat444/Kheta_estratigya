@extends('gehat.layouts.app')
@push('title','عرض بيانات المؤشر')
@push('styles')
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="text-align: right">
                    <h3 class="text-center  font-size-17 mb-4"> {{ $mokaser_data->name }}</h3>
                    <h4 class="mb-4 font-size-17" style="font-weight: bold">المستهدف السنوى : <span class="badge badge-soft-primary">{{ $mokaser_data->mokasher_geha_inputs->target }}</span></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">الربع الأول</div>
                                    <div class="form-group mb-2">
                                        <label>الأنشطه</label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->vivacity1}}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>المعوقات </label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->impediments1}}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>الأدله والشواهد </label>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <th>#</th>
                                            <th>الملف</th>
                                            </thead>
                                            @if(!empty($mokaser_data->mokasher_geha_inputs->evidence1))
                                                @php
                                                    $files  = json_decode($mokaser_data->mokasher_geha_inputs->evidence1) ;
                                                @endphp
                                                @foreach( $files as  $file)
                                                    <tr>
                                                        <td>{{$loop->iteration }}</td>
                                                        <td><a href="{{asset($file)}}"><i class="fa fa-file"></i> {{$file}} </a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <span>لا يوجد ملفات لعرضها !</span>
                                            @endif
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group mb-2">
                                        <form method="post" action="{{route('gehat.update_mokasher_parts')}}">
                                            @csrf
                                            <input required type="text" name="part_1" class="form-control"
                                                   placeholder=" الربع الأول" value="{{$mokaser_data->mokasher_geha_inputs->part_1}}">
                                            <input type="hidden" value="1" name="part">
                                            <input type="hidden" value="{{$mokaser_data->mokasher_geha_inputs->id}}" name="mokasher_geha_id">
                                            <div class="mb-2 text-center">
                                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                                        class="sr-only"></span></div>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                                حفظ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">الربع الثانى</div>

                                    <div class="form-group mb-2">
                                        <label>الأنشطه</label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->vivacity2}}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>المعوقات </label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->impediments2}}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>الأدله والشواهد </label>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <th>#</th>
                                            <th>الملف</th>
                                            </thead>
                                            @if(!empty($mokaser_data->mokasher_geha_inputs->evidence2))
                                                @php
                                                    $files  = json_decode($mokaser_data->mokasher_geha_inputs->evidence2) ;
                                                @endphp
                                                @foreach( $files as  $file)
                                                    <tr>
                                                        <td>{{$loop->iteration }}</td>
                                                        <td><a href="{{asset($file)}}"><i class="fa fa-file"></i> {{$file}} </a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <span>لا يوجد ملفات لعرضها !</span>
                                            @endif
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group mb-2">
                                        <form method="post" action="{{route('gehat.update_mokasher_parts')}}">
                                            @csrf
                                            <input type="hidden" value="2" name="part">
                                            <input type="hidden" value="{{$mokaser_data->mokasher_geha_inputs->id}}" name="mokasher_geha_id">
                                            <input required type="text" name="part_2" class="form-control" value="{{$mokaser_data->mokasher_geha_inputs->part_2}}" placeholder=" الربع الثانى " >
                                            <div class="mb-2 text-center" >
                                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                                        class="sr-only"></span></div>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                                حفظ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">الربع الثالث</div>


                                    <div class="form-group mb-2">
                                        <label>الأنشطه</label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->vivacity3}}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>المعوقات </label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->impediments3}}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>الأدله والشواهد </label>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <th>#</th>
                                            <th>الملف</th>
                                            </thead>
                                            @if(!empty($mokaser_data->mokasher_geha_inputs->evidence3))
                                                @php
                                                    $files  = json_decode($mokaser_data->mokasher_geha_inputs->evidence3) ;
                                                @endphp
                                                @foreach( $files as  $file)
                                                    <tr>
                                                        <td>{{$loop->iteration }}</td>
                                                        <td><a href="{{asset($file)}}"><i class="fa fa-file"></i> {{$file}} </a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <span>لا يوجد ملفات لعرضها !</span>
                                            @endif
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group mb-2">
                                        <form method="post" action="{{route('gehat.update_mokasher_parts')}}">
                                            @csrf
                                            <input type="hidden" value="3" name="part">
                                            <input type="hidden" value="{{$mokaser_data->mokasher_geha_inputs->id}}" name="mokasher_geha_id">
                                            <input required type="text" name="part_3" class="form-control"
                                                   placeholder=" الربع الثالث " value="{{$mokaser_data->mokasher_geha_inputs->part_3}}">
                                            <div class="mb-2 text-center">
                                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                                        class="sr-only"></span></div>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                                حفظ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">الربع الرابع</div>
                                    <div class="form-group mb-2">
                                        <label>المنجز</label>
                                        <input type="text" class="form-control" value="{{$mokaser_data->mokasher_geha_inputs->part_4}}"
                                               readonly>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>الأنشطه</label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->vivacity4}}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>المعوقات </label>
                                        <textarea class="form-control" readonly>{{$mokaser_data->mokasher_geha_inputs->impediments4}}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>الأدله والشواهد </label>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <th>#</th>
                                            <th>الملف</th>
                                            </thead>
                                            @if(!empty($mokaser_data->mokasher_geha_inputs->evidence4))
                                                @php
                                                    $files  = json_decode($mokaser_data->mokasher_geha_inputs->evidence4) ;
                                                @endphp
                                                @foreach( $files as  $file)
                                                    <tr>
                                                        <td>{{$loop->iteration }}</td>
                                                        <td><a href="{{asset($file)}}"><i class="fa fa-file"></i> {{$file}} </a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <span>لا يوجد ملفات لعرضها !</span>
                                            @endif
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group mb-2">
                                        <form method="post" action="{{route('gehat.update_mokasher_parts')}}">
                                            @csrf
                                            <input type="hidden" value="4" name="part">
                                            <input type="hidden" value="{{$mokaser_data->mokasher_geha_inputs->id}}" name="mokasher_geha_id">
                                            <input required type="text" name="part_4" class="form-control" value="{{$mokaser_data->mokasher_geha_inputs->part_4}}"
                                                   placeholder=" الربع الرابع ">
                                            <div class="mb-2 text-center">
                                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                                        class="sr-only"></span></div>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                                حفظ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

            @push('scripts')
                <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/js/select2.min.js')}}"></script>
                <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/form-advanced.init.js')}}"></script>
                <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
                <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/form-repeater.int.js')}}"></script>
    @include('admins.courses.scripts.detect-input-change')
    @endpush
