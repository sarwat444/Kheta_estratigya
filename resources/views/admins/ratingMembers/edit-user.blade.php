@extends('admins.layouts.app')
@push('title','تعديل بيانات لجنه التقييم')

@push('styles')
    <link href="{{asset('/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <style>
        input[switch]{
            display: inline  !important;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="update-user-from" action="{{route('dashboard.ratingMembers.update',$member->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">الأسم  </label>
                                    <input type="text" name="username" value="{{$member->username}}" placeholder="الرقم الوظيفى" class="form-control" id="job_number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="job_number" class="form-label"> الرقم  الوظيفى  </label>
                                    <input type="text" name="job_number" value="{{$member->job_number}}" placeholder="الرقم الوظيفى" class="form-control" id="job_number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">الرقم السري الجديد </label>
                                    <input type="text" name="password" placeholder="الرقم السري الجديد " class="form-control"
                                           id="password" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="role_name" class="form-label">الجهات </label>

                                    @php
                                        $gehat = json_decode($member->gehat);
                                        $users = \App\Models\User::whereIn('id', $gehat)->get();
                                    @endphp
                                    <select name="gehat[]" id="gehat" class="form-control select2" required multiple>
                                        @foreach($all_gehat as $geha)
                                            <option value="{{ $geha->id }}" @if($users->contains('id', $geha->id)) selected @endif> {{$geha->geha}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 text-center">
                            <div class="spinner-border text-primary m-1 d-none" role="status"><span
                                    class="sr-only"></span></div>
                        </div>
                        <button type="submit" id="submit-button" class="btn btn-success w-md">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('/assets/admin/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/form-advanced.init.js')}}"></script>
    @include('admins.courses.scripts.detect-input-change')
    @include('admins.users.scripts.update-user')
@endpush
