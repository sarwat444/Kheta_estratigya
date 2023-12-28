@extends('gehat.auth.layout.app')
@push('title','تسجيل دخول الجهات')
@push('styles')
    <style>
        body , html
        {
            direction: rtl;
            text-align: right;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/admin/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/admin/images/logo-light.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>

                            <a href="" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/admin/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 text-center">
                            <div class="mb-1">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <b class="text-danger">{{ $error }}</b>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="p-2" >
                            <form class="form-horizontal" action="{{route('authenticate')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="job_number" class="form-label">الرقم الوظيفى</label>
                                    <input type="text" name="job_number" class="form-control" id="job_number" placeholder="الرقم  الوظيفى">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">الرقم السري </label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="الرقم السري  " aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
