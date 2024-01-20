@extends('admins.auth.layout.app')
@push('title',__('admin-dashboard.admin login'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <h3 class="text-center font-size-17 mt-5">الخطه الأستراتيجيه لجامعه بنها</h3>
                                <p class="text-primary text-center">تسجيل دخول - مدير النظام</p>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="http://127.0.0.1:8000/assets/admin/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2 text-center">
                            <div class="mb-1">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <b class="text-danger">{{ $error }}</b>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('admins.login')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">الأيميل </label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="الأيميل ">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الباسورد</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="الرقم السري" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>


                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">دخول</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
