@extends('instructors.layouts.app')
@push('title',__('instructor-dashboard.edit document lesson'))

@push('styles')
@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.Edit document lesson')}}</h4>

    <div class="dashboard-settings">

        <form id="update-lesson-document"
              action="{{route('dashboard.instructors.lessons.update.document',$lesson->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-12">
                    <div class="dashboard-content-box">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <div class="dashboard-content__input">
                                    <label for="title" class="form-label-02">{{__('instructor-dashboard.Lesson Title')}}</label>
                                    <input type="text" value="{{$lesson->title}}" id="title" name="title"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dashboard-content__input">
                                    <label for="embed" class="form-label-02">{{__('instructor-dashboard.Document URL')}}</label>
                                    <input type="url" value="{{$lesson->embed}}" id="embed" name="embed"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="section_id" class="form-label-02">{{__('instructor-dashboard.Lesson Section')}}</label>
                                    <select name="section_id" class="form-select select2" required>
                                        <option disabled>{{__('instructor-dashboard.select section')}}</option>
                                        @foreach($sections as $section)
                                            <option
                                                value="{{$section->id}}" {{$lesson->section_id == $section->id ? 'selected' : ''}}>{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="type" class="form-label-02">{{__('instructor-dashboard.Lesson Type')}}</label>
                                    <select name="type" class="form-select select2" required>
                                        <option value="{{ \App\Enums\LessonType::document->value }}"
                                                selected>{{ \App\Enums\LessonType::document->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="provider" class="form-label-02">{{__('instructor-dashboard.Lesson Provider')}}</label>
                                    <select name="provider" class="form-select select2" required>
                                        <option value="{{ \App\Enums\LessonProvider::url->value }}"
                                                selected>{{ \App\Enums\LessonProvider::url->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="form-label mb-2">{{__('instructor-dashboard.Is Free')}}</p>
                                    <input type="checkbox" value="1" name="is_free" id="is_free"
                                           switch="none" {{$lesson->isFree() ? 'checked' : ''}}>
                                    <label for="is_free" data-on-label="yes" data-off-label="no"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="form-label mb-2">{{__('instructor-dashboard.Is Publish')}}</p>
                                    <input type="checkbox" value="1" name="is_publish" id="is_publish"
                                           switch="none" {{$lesson->isPublish() ? 'checked' : ''}}>
                                    <label for="is_publish" data-on-label="yes" data-off-label="no"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-settings__btn">
                <button type="submit" class="btn btn-primary btn-hover-secondary section-btn">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>

    </div>

@endsection

@push('scripts')
    @include('instructors.lessons.scripts.edit-document')
@endpush
