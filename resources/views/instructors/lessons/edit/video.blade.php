@extends('instructors.layouts.app')
@push('title',__('instructor-dashboard.edit video lesson'))

@push('styles')
@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.Edit video lesson')}}</h4>

    <div class="dashboard-settings">

        <form id="update-lesson-video"
              action="{{route('dashboard.instructors.lessons.update.video',$lesson->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-12">
                    <div class="dashboard-content-box">
                        <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Edit Lesson Video Information')}}</h4>
                        <div class="row gy-4">

                            <div class="col-md-8">
                                <div class="dashboard-content__input">
                                    <label for="title" class="form-label-02">{{__('instructor-dashboard.Lesson Title')}}</label>
                                    <input type="text" value="{{$lesson->title}}" id="title" name="title"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="type" class="form-label-02">{{__('instructor-dashboard.Lesson Type')}}</label>
                                    <select name="type" class="form-select select2" required>
                                        <option value="{{ \App\Enums\LessonType::video->value }}"
                                                selected>{{ \App\Enums\LessonType::video->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-content__input">
                                    <label for="provider" class="form-label-02">{{__('instructor-dashboard.Lesson Provider')}}</label>
                                    <select name="provider" class="form-select select2" required>
                                        <option value="{{ \App\Enums\LessonProvider::vimeo->value }}"
                                                selected>{{ \App\Enums\LessonProvider::vimeo->name }}</option>
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
                <button type="submit" class="btn btn-primary btn-hover-secondary">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>

    </div>

@endsection

@push('scripts')
    @include('instructors.lessons.scripts.edit-video')
@endpush
