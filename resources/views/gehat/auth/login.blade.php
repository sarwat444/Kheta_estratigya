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
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">{{__('admin-dashboard.Welcome Back !')}}</h5>
                                    <p>{{__('admin-dashboard.Sign in to continue.')}}</p>
                                </div>
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
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('admins.login')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{__('admin-dashboard.email')}}</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="{{__('admin-dashboard.Enter email')}}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__('admin-dashboard.Password')}}</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="{{__('admin-dashboard.Enter password')}}" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        {{__('admin-dashboard.Remember me')}}
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">{{__('admin-dashboard.Log In')}}</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
