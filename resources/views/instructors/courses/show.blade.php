@extends('instructors.layouts.app')

@push('title','Show Course')

@push('styles')
    <link href="{{asset('/assets/admin/libs/dragula/dragula.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/assets/admin/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')

    <main class="main-wrapper">
        <h4 class="dashboard-title text-center">{{__('instructor-dashboard.course information')}}</h4>
        <!-- Tutor Course Top Info Start -->
        <div class="tutor-course-top-info  bg-color-11">
            <div class="container custom-container">

                <div class="row">
                    <div class="col-lg-8">

                        <!-- Tutor Course Top Info Start -->
                        <div class="tutor-course-top-info__content">
                            <h1 class="tutor-course-top-info__title">{{$course->name}}</h1>
                            <h1 class="tutor-course-top-info__title">{{$course->title}}</h1>
                            <div class="tutor-course-top-info__meta">
                                <div class="tutor-course-top-info__meta-rating">

                                    <div class="rating-average">
                                        <strong>{{number_format($course->rates_avg_rate,2)}}</strong> /5
                                    </div>
                                    <div class="rating-star">
                                        <div class="rating-label"
                                             style="width: {{$course->rates_avg_rate * 20}}%;"></div>
                                    </div>
                                    <div class="rating-count">({{$course->rates_count}})</div>

                                </div>
                                <div class="tutor-course-top-info__meta-action"><i
                                        class="meta-icon far fa-user-alt"></i> {{$course->enrollments_count}} {{__('instructor-dashboard.already enrolled')}}
                                </div>
                            </div>
                        </div>
                        <!-- Tutor Course Top Info End -->

                    </div>
                </div>

            </div>
        </div>
        <!-- Tutor Course Top Info End -->


        <div class="tutor-course-main-content section-padding-01 sticky-parent">
            <div class="container custom-container">

                <div class="row gy-10">
                    <div class="col-lg-8">

                        <!-- Tutor Course Main Segment Start -->
                        <div class="tutor-course-main-segment">

                            <!-- Tutor Course Segment Start -->
                            <div class="tutor-course-segment">
                                <h4 class="tutor-course-segment__title">{{__('instructor-dashboard.About This Course')}}</h4>

                                <!-- Tutor Course Segment Content Wrapper Start -->
                                <div class="tutor-course-segment__content-wrap">
                                    <p>{{$course->description}}</p>
                                </div>
                                <!-- Tutor Course Segment Content Wrapper End -->
                            </div>
                            <!-- Tutor Course Segment End -->


                            <!-- Tutor Course Segment Start -->
                            <div class="tutor-course-segment">
                                <h4 class="tutor-course-segment__title">{{__('instructor-dashboard.Requirements')}}</h4>

                                <!-- Tutor Course Segment Requirements Items Start -->
                                <div class="tutor-course-segment__requirements-content">
                                    <ul class="tutor-course-segment__list-style-01">
                                        @forelse($course->prerequisites as $prerequisite)
                                            <li>{{$prerequisite->course_prerequisites}}</li>
                                        @empty
                                            <div class="alert alert-danger text-center text-capitalize">
                                                <p>{{__('instructor-dashboard.there is no prerequisites for this course')}}</p>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- Tutor Course Segment Requirements Items End -->
                            </div>
                            <!-- Tutor Course Segment End -->


                            <!-- Tutor Course Segment Start -->
                            <div class="tutor-course-segment">

                                <div class="tutor-course-segment__header">
                                    <h4 class="tutor-course-segment__title">{{__('instructor-dashboard.Curriculum')}}</h4>

                                    <div class="tutor-course-segment__lessons-duration">
                                        <span
                                            class="tutor-course-segment__lessons">{{$course->lessons_count}} {{__('instructor-dashboard.Lessons')}}</span>
                                        <span
                                            class="tutor-course-segment__duration">{{hours_minutes_seconds($course->lessons_sum_duration)}}</span>
                                    </div>
                                </div>

                                <div class="course-curriculum accordion">

                                    @forelse($course->sections as $section)
                                        <div class="accordion-item">
                                            <button class="accordion-button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne"><i
                                                    class="tutor-icon"></i> {{$section->name}}
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                 data-bs-parent="#accordionCourse">

                                                <div id="section-lessons-dragula{{$section->id}}"
                                                     data-section-id="{{$section->id}}"
                                                     class="course-curriculum__lessons">
                                                    @forelse($section->lessons as $lesson)
                                                        <div data-lesson-id="{{$lesson->id}}"
                                                             class="course-curriculum__lesson">
                                                    <span class="course-curriculum__title">
                                                    <i class="far fa-file-alt"></i>
                                                    {{$lesson->title}}
                                                </span>
                                                            <span class="course-curriculum__icon">
                                                            <a href="{{route('dashboard.instructors.lessons.likes',$lesson->id)}}"><i
                                                                    class="far fa-thumbs-up m-1"></i></a>{{$lesson->likes_count}}
                                                            <a href="{{route('dashboard.instructors.lessons.comments',$lesson->id)}}"><i
                                                                    class="far fa-comment-alt m-1"></i></a>{{$lesson->comments_count}}
                                                            <a href="{{route('dashboard.instructors.lessons.views',$lesson->id)}}"><i
                                                                    class="far fa-eye m-1"></i></a>{{$lesson->views_count}}
                                                                @if($lesson->isFree())
                                                                    <i class="far fa-lock-open-alt m-1"></i>
                                                                @else
                                                                    <i class="far fa-lock-alt m-1"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger text-center text-capitalize">
                                            <p>{{__('instructor-dashboard.There is no section in this course')}}</p>
                                        </div>
                                    @endforelse
                                </div>

                            </div>
                            <!-- Tutor Course Segment End -->

                        </div>
                        <!-- Tutor Course Main Segment End -->

                    </div>
                    <div class="col-lg-4">

                        <div class="sidebar-sticky">
                            <!-- Tutor Course Sidebar Start -->
                            <div class="tutor-course-sidebar">

                                <!-- Tutor Course Price Preview Start -->
                                <div class="tutor-course-price-preview">
                                    <div class="tutor-course-price-preview__thumbnail">
                                        <img src="{{$course->getFirstMediaUrl('courses')}}" alt="Course Thumbnail">
                                        @if($course->has_video)
                                            <div class="ratio ratio-16x9 mt-2">
                                                {!! $course->video->embed !!}
                                            </div>

                                            <div class="text-center">
                                                <form id="delete-course-video"
                                                      action="{{route('dashboard.instructors.courses.video.delete',$course->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger mt-2  btn-sm">
                                                        <i class="fa fa-trash"></i>{{__('instructor-dashboard.Delete Video')}}
                                                    </button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible fade show nocoursevideos"
                                                 role="alert">
                                                <a href="{{route('dashboard.instructors.courses.video',$course->id)}}"
                                                   class="text-danger">No Videos On This Cours </a>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="tutor-course-price-preview__price">
                                        <div class="tutor-course-price">
                                            <span class="sale-price">${{$course->price}}</span>
                                            <span class="regular-price">${{$course->old_price}}</span>
                                            @if($course->isFree())
                                                <span class="tutor-course-price__amount">Free</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tutor-course-price-preview__meta">
                                        <ul class="tutor-course-meta-list">
                                            <li>
                                                <div class="label"><i class="far fa-sliders-h"></i> Level</div>
                                                <div
                                                    class="value">{{\App\Enums\CourseLevel::tryFrom($course->level)->name}}</div>
                                            </li>
                                            <li>
                                                <div class="label"><i class="far fa-clock"></i> Duration</div>
                                                <div
                                                    class="value">{{hours_minutes_seconds($course->lessons_sum_duration)}}</div>
                                            </li>
                                            <li>
                                                <div class="label"><i class="far fa-play-circle"></i> Lectures</div>
                                                <div class="value">{{$course->sections_count}} lectures</div>
                                            </li>
                                            <li>
                                                <div class="label"><i class="far fa-tag"></i> Subject</div>
                                                <div class="value"><a href="#">{{$course->category->name}}</a></div>
                                            </li>
                                            <li>
                                                <div class="label"><i class="far fa-poo-storm"></i> Publish</div>
                                                <div class="value"><a
                                                        href="#">{{($course->IsActive()) ? 'yes' : 'no'}}</a></div>
                                            </li>
                                            <li>
                                                <div class="label"><i class="far fa-arrow-to-top"></i> Is Top</div>
                                                <div class="value"><a href="#">{{($course->IsTop()) ? 'yes' : 'no'}}</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Tutor Course Price Preview End -->

                            </div>
                            <!-- Tutor Course Sidebar End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </main>

@endsection

@push('scripts')
    <script src="{{asset('/assets/admin/libs/dragula/dragula.min.js')}}"></script>
    <script src="{{asset('/assets/admin/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/sweet-alerts.init.js')}}"></script>
    @include('instructors.courses.scripts.sortable-lessons')
    @include('instructors.courses.scripts.delete-course-video')
@endpush
