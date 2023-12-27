@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Create Course'))

@push('styles')@endpush

@section('content')

    <h4 class="dashboard-title text-center">{{__('instructor-dashboard.Create Course')}}</h4>

    <div class="dashboard-settings">

        <form id="store-course-from" action="{{route('dashboard.instructors.courses.store')}}" method="POST" class="repeater" enctype="multipart/form-data">
            @csrf
            <div class="row gy-6">
                <div class="col-12">

                    <div class="dashboard-content-box">
                        <div class="row mb-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label for="name" class="form-label-02">{{__('instructor-dashboard.Course Name')}}</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="{{__('instructor-dashboard.Course Name')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label for="title" class="form-label-02">{{__('instructor-dashboard.Course Title')}}</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="{{__('instructor-dashboard.Course Title')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <div class="dashboard-content__input">
                                        <label for="category_id" class="form-label-02">{{__('instructor-dashboard.Course Category')}}</label>
                                        <select name="category_id" class="form-select select2" required>
                                            <option selected disabled>{{__('instructor-dashboard.Select Category')}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dashboard-content__input">
                                        <label for="level" class="form-label-02">{{__('instructor-dashboard.Course Level')}}</label>
                                        <select name="level" class="form-select select2" required>
                                            <option selected disabled>{{__('instructor-dashboard.Select Level')}}</option>
                                            @foreach(\App\Enums\CourseLevel::cases() as $level)
                                                <option value="{{ $level->value }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dashboard-content__input">
                                        <label for="price" class="form-label-02">{{__('instructor-dashboard.Course Price')}}</label>
                                        <input type="number" id="price" name="price" value="0" class="form-control" placeholder="{{__('instructor-dashboard.Course Price')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dashboard-content__input">
                                        <label for="old_price" class="form-label-02">{{__('instructor-dashboard.Course Old Price')}}</label>
                                        <input type="number" id="old_price" name="old_price" value="0" class="form-control" placeholder="{{__('instructor-dashboard.Course Old Price')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-top: 40px">
                                    <div class="mb-3">
                                        <input type="checkbox" value="1" name="is_free" id="is_free" switch="none" style="float: left ;margin-top: 5px;  ">
                                        <label for="is_free" data-on-label="yes" data-off-label="no"></label>
                                        <p class="form-label mb-2" style="float: left ; padding-left: 6px ;">{{__('instructor-dashboard.Free Course')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-2"  style="padding-top: 40px" >
                                    <div class="mb-3">
                                        <input type="checkbox" value="1" name="is_active" id="is_active" switch="none" style="float: left ;margin-top: 5px; ">
                                        <label for="is_active" data-on-label="yes" data-off-label="no"></label>
                                        <p class="form-label mb-2" style="float: left ; padding-left: 6px ; " >{{__('instructor-dashboard.Active Courses')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">{{__('instructor-dashboard.Course Image')}}</label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02" for="description">{{__('instructor-dashboard.Course Description')}}</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="{{__('instructor-dashboard.Course Description')}}" required></textarea>
                                    </div>
                                </div>

                            </div>

                           <div class="col-md-12">
                                    <div class="mb-3" style="text-align: left">
                                        <div data-repeater-list="course_prerequisites">
                                            <div data-repeater-item class="row">
                                                <div class="mb-3 col-lg-11">
                                                    <label class="mb-3" style="color: #000;">{{__('instructor-dashboard.Course Prerequisite')}}</label>
                                                    <input type="text" name="course_prerequisites"
                                                           class="form-control"
                                                           placeholder="{{__('instructor-dashboard.enter one point course prerequisite')}}"/>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <div class="d-grid">
                                                         <i data-repeater-delete class="fa fa-trash repeater-delete"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0 repeater-add" value="{{__('instructor-dashboard.New')}}"/>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="dashboard-settings__btn">
                <button id="submit-form" class="btn btn-primary btn-hover-secondary section-btn">{{__('instructor-dashboard.Create')}}</button>
            </div>
        </form>

    </div>

@endsection

@push('scripts')
    <script src="{{asset('/assets/admin/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/form-repeater.int.js')}}"></script>
    @include('instructors.courses.scripts.detect-input-change')
    @include('instructors.courses.scripts.store')
@endpush
