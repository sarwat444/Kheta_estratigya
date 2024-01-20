@extends('ratingMembers.layouts.app')
@push('title','أضافه مدخلات المؤشر ')
@push('styles')
    <link href="{{asset('/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="text-align: right">
                    <h4 class="card-title mb-3"> عرض بيانات المؤشر للجهه </h4>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label> المستهدف  </label>
                            <input type="text" readonly value="{{$mokaser_data->target}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">الربع الأول</div>
                    <div class="form-group mb-2">
                        <label>المنجز</label>
                        <input type="text" class="form-control" value="{{$mokaser_data->part_1}}"
                               readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label>الأنشطه</label>
                        <textarea class="form-control" readonly>{{$mokaser_data->vivacity1}}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label>المعوقات </label>
                        <textarea class="form-control" readonly>{{$mokaser_data->impediments1}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>الأدله والشواهد </label>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>#</th>
                            <th>الملف</th>
                            </thead>
                            @if(!empty($mokaser_data->evidence1))
                                @php
                                    $files  = json_decode($mokaser_data->evidence1) ;
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
                        <form method="post" action="{{route('rating.storeRating')}}">
                            @csrf
                            <input required type="text" name="rate_part_1" class="form-control"
                                   placeholder="تقييم الربع الأول" value="{{$mokaser_data->rate_part_1}}">
                            <input type="hidden" value="1" name="part">
                            <input type="hidden" value="{{$mokaser_data->id}}" name="mokasher_geha_id">
                            <div class="mb-2 text-center">
                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                        class="sr-only"></span></div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                تقيم
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
                        <label>المنجز</label>
                        <input type="text" class="form-control" value="{{$mokaser_data->part_2}}"
                               readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label>الأنشطه</label>
                        <textarea class="form-control" readonly>{{$mokaser_data->vivacity2}}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label>المعوقات </label>
                        <textarea class="form-control" readonly>{{$mokaser_data->impediments2}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>الأدله والشواهد </label>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>#</th>
                            <th>الملف</th>
                            </thead>
                            @if(!empty($mokaser_data->evidence2))
                                @php
                                    $files  = json_decode($mokaser_data->evidence2) ;
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
                        <form method="post" action="{{route('rating.storeRating')}}">
                            @csrf
                            <input type="hidden" value="2" name="part">
                            <input type="hidden" value="{{$mokaser_data->id}}" name="mokasher_geha_id">
                            <input required type="text" name="rate_part_2" class="form-control" value="{{$mokaser_data->rate_part_2}}" placeholder="تقييم الربع الثانى " >
                            <div class="mb-2 text-center" >
                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                        class="sr-only"></span></div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                تقيم
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
                        <label>المنجز</label>
                        <input type="text" class="form-control" value="{{$mokaser_data->part_3}}"
                               readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label>الأنشطه</label>
                        <textarea class="form-control" readonly>{{$mokaser_data->vivacity3}}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label>المعوقات </label>
                        <textarea class="form-control" readonly>{{$mokaser_data->impediments3}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>الأدله والشواهد </label>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>#</th>
                            <th>الملف</th>
                            </thead>
                            @if(!empty($mokaser_data->evidence3))
                                @php
                                    $files  = json_decode($mokaser_data->evidence3) ;
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
                        <form method="post" action="{{route('rating.storeRating')}}">
                            @csrf
                            <input type="hidden" value="3" name="part">
                            <input type="hidden" value="{{$mokaser_data->id}}" name="mokasher_geha_id">
                            <input required type="text" name="rate_part_3" class="form-control"
                                   placeholder="تقييم الربع الثالث " value="{{$mokaser_data->rate_part_3}}">
                            <div class="mb-2 text-center">
                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                        class="sr-only"></span></div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                تقيم
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
                        <input type="text" class="form-control" value="{{$mokaser_data->part_4}}"
                               readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label>الأنشطه</label>
                        <textarea class="form-control" readonly>{{$mokaser_data->vivacity4}}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label>المعوقات </label>
                        <textarea class="form-control" readonly>{{$mokaser_data->impediments4}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>الأدله والشواهد </label>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>#</th>
                            <th>الملف</th>
                            </thead>
                            @if(!empty($mokaser_data->evidence4))
                                @php
                                    $files  = json_decode($mokaser_data->evidence4) ;
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
                        <form method="post" action="{{route('rating.storeRating')}}">
                            @csrf
                            <input type="hidden" value="4" name="part">
                            <input type="hidden" value="{{$mokaser_data->id}}" name="mokasher_geha_id">
                            <input required type="text" name="rate_part_4" class="form-control" value="{{$mokaser_data->rate_part_4}}"
                                   placeholder="تقييم الربع الرابع ">
                            <div class="mb-2 text-center">
                                <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                        class="sr-only"></span></div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-center" style="width: 100%">
                                تقيم
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{asset('/assets/admin/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/form-advanced.init.js')}}"></script>
    <script src="{{asset('/assets/admin/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/form-repeater.int.js')}}"></script>
    @include('admins.courses.scripts.detect-input-change')
    @include('admins.courses.scripts.store')
@endpush
