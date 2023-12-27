@extends('instructors.layouts.app')

@push('title','Courses')

@push('styles')@endpush

@section('content')

    <h4 class="dashboard-title text-center ">{{__('instructor-dashboard.My Courses')}}</h4>

    <a href="{{route('dashboard.instructors.courses.create')}}" class="btn btn-primary  btn-sm m-2 section-btn"><i class="fa fa-plus"> </i> {{__('instructor-dashboard.Create New Course')}}</a>

    <div class="dashboard-courses">
        @forelse($courses as $course)
        <div class="dashboard-courses__item">
            <div class="dashboard-courses__thumbnail">
                <a href="{{route('dashboard.instructors.courses.show',$course->id)}}"><img src="{{$course->getFirstMediaUrl('courses')}}" alt="Courses" width="260" height="174"></a>
            </div>
            <div class="dashboard-courses__content">

                <h3 class="dashboard-courses__title"><a href="{{route('dashboard.instructors.courses.show',$course->id)}}">{{$course->name}}</a></h3>
                <div class="dashboard-courses__rating">
                    <div class="rating-star">
                        <div class="rating-label" style="width: {{$course->rates_avg_rate * 20}}%;"></div>
                    </div>
                    <span>({{$course->rates_count}})</span>
                </div>
                <ul class="dashboard-courses__meta">
                    <li>
                        <span class="meta-label">{{__('instructor-dashboard.Status')}}:</span>
                        <span class="meta-value">{{($course->IsActive()) ? __('instructor-dashboard.publish') : __('instructor-dashboard.not publish')}}</span>
                    </li>
                    <li>
                        <span class="meta-label">{{__('instructor-dashboard.Duration')}}:</span>
                        <span class="meta-value">{{hours_minutes_seconds($course->lessons_sum_duration)}}</span>
                    </li>
                    <li>
                        <span class="meta-label">{{__('instructor-dashboard.Students')}}:</span>
                        <span class="meta-value">{{$course->enrollments_count}}</span>
                    </li>
                    <li>
                        <span class="meta-label">{{__('instructor-dashboard.Lessons')}}:</span>
                        <span class="meta-value">{{$course->lessons_count}}</span>
                    </li>
                </ul>
                <div class="dashboard-courses__footer">
                    <div class="dashboard-courses__price">
                        <span class="sale-price">{{__('instructor-dashboard.Price')}}: {{$course->price}}  /  <span class="oldprice"> {{$course->old_price}}   </span></span>
                    </div>
                    <div class="dashboard-courses__action">
                        <a class="action" href="{{route('dashboard.instructors.courses.edit',$course->id)}}"><i class="fal fa-pencil-alt"></i>{{__('instructor-dashboard.Edit')}}</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>

@endsection

@push('scripts')@endpush
