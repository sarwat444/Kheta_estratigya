@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Edit Course'))

@push('styles')@endpush

@section('content')
    <div class="dashboard-settings">
        <form id="update-course-from" action="{{route('dashboard.instructors.courses.update',$course->id)}}"
              method="POST" class="repeater" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-8">
                    <div class="dashboard-content-box">

                        <div class="mb-8">
                            <button type="button" class="btn btn-primary waves-effect waves-light create-new-lesson section-btn mb-4">
                                <i class="fa fa-plus"></i> {{__('instructor-dashboard.New Lesson')}}
                            </button>
                        </div>

                         <div class="editcourseform">
                            <div class="row gy-4">
                                <div class="row mb-8">
                                    <div class="col-md-6">
                                        <div class="dashboard-content__input">
                                            <label for="name" class="form-label-02">{{__('instructor-dashboard.Course Name')}}</label>
                                            <input type="text" id="name" name="name" value="{{$course->name}}"
                                                   class="form-control" placeholder="{{__('instructor-dashboard.Course Name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dashboard-content__input">
                                            <label for="title" class="form-label-02">{{__('instructor-dashboard.Course Title')}}</label>
                                            <input type="text" id="title" name="title" value="{{$course->title}}"
                                                   class="form-control" placeholder="{{__('instructor-dashboard.Course Title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-8">
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label for="category_id" class="form-label-02">{{__('instructor-dashboard.Course Category')}}</label>
                                                <select name="category_id" class="form-select">
                                                    <option selected disabled>{{__('instructor-dashboard.Select Category')}}</option>
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}" {{($course->category_id === $category->id) ? 'selected' : ''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label for="level" class="form-label-02">{{__('instructor-dashboard.Course Level')}}</label>
                                                <select name="level" class="form-select">
                                                    <option selected disabled>{{__('instructor-dashboard.Select Level')}}</option>
                                                    @foreach(\App\Enums\CourseLevel::cases() as $level)
                                                        <option
                                                            value="{{ $level->value }}" {{($course->level === $level->value) ? 'selected' : ''}}>{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                                <div class="mb-3" style="overflow: hidden; padding: 5px; margin-top: 40px;">
                                                    <p class="form-label mb-2" style="float: right" >{{__('instructor-dashboard.Free Course')}}</p>

                                                    <input type="checkbox" value="1" name="is_free" id="is_free"
                                                           switch="none" {{ ($course->IsFree()) ? 'checked' : ''}}>
                                                    <label for="is_free" data-on-label="yes" data-off-label="no"></label>
                                                </div>
                                         </div>

                                        <div class="col-md-3">
                                            <div  class="mb-3" style="overflow: hidden; padding: 5px; margin-top: 40px;">
                                                <p class="form-label mb-2" style="float: right" >Active Course</p>

                                                <input type="checkbox" value="1" name="is_active" id="is_active"
                                                       switch="none" {{ ($course->IsActive()) ? 'checked' : ''}}>
                                                <label for="is_active" data-on-label="yes" data-off-label="no"></label>
                                            </div>
                                        </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <img src="{{$course->getFirstMediaUrl('courses')}}" alt="course image "
                                             width="100px" class="img-thumbnail">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="image" class="form-label">{{__('instructor-dashboard.Course Image (New)')}}</label>
                                        <input type="file" name="image" id="image" class="form-control editcourseimage" >

                                    </div>

                                    <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label for="price" class="form-label-02">{{__('instructor-dashboard.Course Price')}}</label>
                                                <input type="number" id="price" name="price"
                                                       value="{{$course->price}}" class="form-control"
                                                       placeholder="{{__('instructor-dashboard.Course Price')}}" {{$course->isFree() ? 'disabled' : ''}}>
                                            </div>
                                     </div>
                                     <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label for="old_price" class="form-label-02">{{__('instructor-dashboard.Course Old Price')}}</label>
                                                <input type="number" id="old_price" name="old_price"
                                                       value="{{$course->old_price}}" class="form-control"
                                                       placeholder="{{__('instructor-dashboard.Course Old Price')}}" {{$course->isFree() ? 'disabled' : ''}}>
                                            </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02" for="description">{{__('instructor-dashboard.Course Description')}}</label>
                                        <textarea class="form-control" id="description" name="description"
                                                  placeholder="{{__('instructor-dashboard.Course Description')}}">{{$course->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                         </div>

                    </div>


                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light section2-btn" style="background-color: #86b223;"
                                        data-bs-toggle="modal" data-bs-target="#create-new-section">
                                    <i class="fa fa-plus"> </i> {{__('instructor-dashboard.New Section')}}
                                </button>
                            </div>
                            <table class="table table-striped table-bordered sections-tabel">
                                <tr>
                                    <th colspan="2" class="text-center" style="color: #86b223;">{{__('instructor-dashboard.Course Sections')}}</th>
                                </tr>
                                @forelse($course->sections as $section)
                                    <tr>
                                        <th colspan="2">
                                            <ul>
                                                <li> <i class="fa fa-angle-right"></i> {{$section->name}}</li>
                                            </ul>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">{{__('instructor-dashboard.No Sections')}}</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-settings__btn">
                <button id="submit-form" class="btn btn-primary btn-hover-secondary section-btn">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>
    </div>
    @include('instructors.courses.modals.create-new-section')
    @include('instructors.courses.modals.create-new-lesson')
@endsection

@push('scripts')
    @include('instructors.courses.scripts.create-lesson-redirection')
    @include('instructors.courses.scripts.detect-input-change')
    @include('instructors.courses.scripts.create-new-section')
    @include('instructors.courses.scripts.course-sections')
    @include('instructors.courses.scripts.update')
@endpush
