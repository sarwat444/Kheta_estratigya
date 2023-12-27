@extends('instructors.layouts.app')
@push('title',__('instructor-dashboard.create document lesson'))

@push('styles')
@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.Create Lesson')}}</h4>

    <div class="dashboard-settings">

        <form id="store-lesson-document-from" action="{{route('dashboard.instructors.lessons.store.document')}}" method="POST">
            @csrf
            <div class="row gy-6">
                <div class="col-12">
                    <div class="dashboard-content-box">
                        <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Create Lesson Document Information')}}</h4>
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="title" class="form-label-02">{{__('instructor-dashboard.Lesson Title')}}</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           placeholder="{{__('instructor-dashboard.Lesson Title')}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="embed" class="form-label-02">{{__('instructor-dashboard.Document URL')}}</label>
                                    <input type="url" id="embed" name="embed" class="form-control"
                                           placeholder="{{__('instructor-dashboard.Document URL')}}" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <p class="form-label mb-2">{{__('instructor-dashboard.Is Free')}}</p>
                                    <input type="checkbox" value="1" name="is_free" id="is_free" switch="none">
                                    <label for="is_free" data-on-label="yes" data-off-label="no"></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <p class="form-label mb-2">{{__('instructor-dashboard.Is Publish')}}</p>
                                    <input type="checkbox" value="1" name="is_publish" id="is_publish" switch="none">
                                    <label for="is_publish" data-on-label="yes" data-off-label="no"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label for="course_id" class="form-label-02">{{__('instructor-dashboard.Course')}}</label>
                                    <select name="course_id" class="form-select select2 course" required>
                                        <option selected disabled>{{__('instructor-dashboard.Select Course')}}</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}" {{request()->input('course_id') == $course->id ? 'selected' : ''}}>{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label for="section_id" class="form-label-02">{{__('instructor-dashboard.Lesson Section')}}</label>
                                    <select name="section_id" class="form-select select2 sections" required>
                                        <option selected disabled>{{__('instructor-dashboard.Select Section')}}</option>
                                        @if(request()->input('section_id'))
                                            <option value="{{request()->input('section_id')}}" selected>{{request()->input('section_name')}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label for="type" class="form-label-02">{{__('instructor-dashboard.Lesson Type')}}</label>
                                    <select name="type" class="form-select select2" required>
                                        <option selected disabled>{{__('instructor-dashboard.Select Type')}}</option>
                                            <option value="{{ \App\Enums\LessonType::document->value }}">{{ \App\Enums\LessonType::document->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-content__input">
                                    <label for="provider" class="form-label-02">{{__('instructor-dashboard.Lesson Provider')}}</label>
                                    <select name="provider" class="form-select select2" required>
                                        <option selected disabled>{{__('instructor-dashboard.Select Provider')}}</option>
                                            <option value="{{ \App\Enums\LessonProvider::url->value }}">{{ \App\Enums\LessonProvider::url->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-settings__btn">
                <button id="submit-form" class="btn btn-primary btn-hover-secondary">{{__('instructor-dashboard.Create')}}</button>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    @include('instructors.lessons.scripts.course-sections')
    @include('instructors.lessons.scripts.store-document')
@endpush
