@extends('instructors.layouts.app')
@push('title',__('instructor-dashboard.upload video course'))

@push('styles')
@endpush

@section('content')
    <h4 class="dashboard-title">{{__('instructor-dashboard.upload new video course')}}</h4>
    <div class="dashboard-settings">
        <div id="upload-form-content">
            <form id="prepare-upload-video-course" action="{{route('dashboard.instructors.courses.video.upload',$course->id)}}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gy-6">
                    <div class="col-12">

                        <div class="dashboard-content-box">
                            <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Upload Course Video Information')}}</h4>
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="video" class="form-label">{{__('instructor-dashboard.Course Video')}}</label>
                                        <input type="file" name="video" id="video" class="form-control" required>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="mb-2 text-center">
                    <div class="spinner-border text-primary m-1 d-none" role="status"><span
                            class="sr-only"></span></div>
                </div>

                <div class="dashboard-settings__btn">
                    <button id="submit-button" class="btn btn-primary btn-hover-secondary">{{__('instructor-dashboard.Upload')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('/assets/tus/tus.min.js')}}"></script>
    @include('instructors.courses.video.scripts.upload-tus-video-course')
    @include('instructors.courses.video.scripts.store-video')
@endpush
