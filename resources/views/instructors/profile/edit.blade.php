@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Edit Profile'))

@push('styles')@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.Email Account')}}</h4>

    <div class="dashboard-settings">

        <form action="{{route('dashboard.instructors.profile.update.email')}}"
              method="POST">
            @csrf
            <div class="row gy-6">
                <div class="col-12">
                    <div class="dashboard-content-box">
                        <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Change Your Email Account')}}</h4>
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="dashboard-content__input">
                                    <label for="email" class="form-label-02">{{__('instructor-dashboard.Email')}}</label>
                                    <input type="email" id="email" value="{{auth()->user()->email}}" name="email"
                                           class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-settings__btn">
                <button class="btn btn-primary btn-hover-secondary section2-btn">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>

    </div>


    <h4 class="dashboard-title mt-5">{{__('instructor-dashboard.Security Information')}}</h4>

    <div class="dashboard-settings">

        <form action="{{route('dashboard.instructors.profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-12">
                    <div class="dashboard-content-box">
                        <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Change Your Email Account')}}</h4>
                        <div class="row gy-4">
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">{{__('instructor-dashboard.Current Password')}}</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">{{__('instructor-dashboard.New Password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">{{__('instructor-dashboard.Confirm New Password')}}</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">{{__('instructor-dashboard.New Image')}}</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-settings__btn">
                <button class="btn btn-primary btn-hover-secondary section2-btn">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>

    </div>

@endsection

@push('scripts')@endpush
