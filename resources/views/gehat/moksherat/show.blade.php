@extends('gehat.layouts.app')
@push('title','عرض بيانات المؤشر')
@push('styles')
    <link href="{{asset('/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="text-align: right">
                    <h3 class="text-center  font-size-20"> {{ $mokaser_data->name }}</h3>
                    <h4 class="mb-4">المستهدف : <span class="badge badge-soft-primary">{{ $mokaser_data->mokasher_geha_inputs->target  }}</span></h4>
                    <h4 class="font-size-14">المنجز </h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>الربع الاول</th>
                        <th>الربع الثانى</th>
                        <th>الربع الثالث</th>
                        <th>الربع الرابع</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $mokaser_data->mokasher_geha_inputs->part_1}}</td>
                            <td>{{ $mokaser_data->mokasher_geha_inputs->part_2}}</td>
                            <td>{{ $mokaser_data->mokasher_geha_inputs->part_3}}</td>
                            <td>{{ $mokaser_data->mokasher_geha_inputs->part_4}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <h4> الأدله والشواهد </h4>

                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>الملف</th>
                        </thead>
                            @if(!empty($mokaser_data->mokasher_geha_inputs->files))
                                @php
                                 $files  = json_decode($mokaser_data->mokasher_geha_inputs->files) ;
                                @endphp
                                @foreach( $files as  $file)
                                    <tr>
                                        <td>{{$loop->iteration }}</td>
                                        <td><a href="{{asset($file)}}"><i class="fa fa-file"></i> {{$file}} </a></td>
                                    </tr>
                                @endforeach
                            @endif
                        <tbody>
                        </tbody>
                    </table>

                    <h4>الموافقه والاعتماد </h4>
                    <input type="checkbox" name="accept" >

                    <h4>ملاحظات </h4>
                    <textarea class="form-control" rows="5"> {{$mokaser_data->mokasher_geha_inputs->notes}}</textarea>




                </div>
            </div>
            @endsection



            @push('scripts')
                <script src="{{asset('/assets/admin/libs/select2/js/select2.min.js')}}"></script>
                <script src="{{asset('/assets/admin/js/pages/form-advanced.init.js')}}"></script>
                <script src="{{asset('/assets/admin/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
                <script src="{{asset('/assets/admin/js/pages/form-repeater.int.js')}}"></script>
    @include('admins.courses.scripts.detect-input-change')
    @endpush
