@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Edit Section'))

@push('styles')@endpush

@section('content')
    <h4 class="dashboard-title">{{__('instructor-dashboard.Edit Section')}}</h4>
    <div class="dashboard-settings">

        <form id="update-section-from" action="{{route('dashboard.instructors.sections.update',$section->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-12">

                    <div class="dashboard-content-box">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="dashboard-content__input">
                                    <label for="name" class="form-label-02">{{__('instructor-dashboard.Section Name')}}</label>
                                    <input type="text" value="{{$section->name}}" id="name" name="name"
                                           class="form-control" placeholder="{{__('instructor-dashboard.Section Name')}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dashboard-content__input">
                                    <label for="course_id" class="form-label-02">{{__('instructor-dashboard.Course')}}</label>
                                    <select name="course_id" class="form-select select2" required>
                                        <option selected disabled>{{__('instructor-dashboard.Select Course')}}</option>
                                        @foreach($courses as $course)
                                            <option
                                                value="{{ $course->id }}" {{($section->course_id === $course->id) ? 'selected' : ''}}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="dashboard-settings__btn">
                <button id="submit-form" class="btn btn-primary btn-hover-secondary section-btn">{{__('instructor-dashboard.Update')}}</button>
            </div>
        </form>

    </div>

@endsection

@push('scripts')
    @include('instructors.sections.scripts.update')
@endpush
