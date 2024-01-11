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
                                <h3 class="text-center font-size-17 mt-5">الخطه الأستراتيجيه لجامعه بنها</h3>
                                <p class="text-primary text-center">تسجيل الدخول</p>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/admin/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">

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
