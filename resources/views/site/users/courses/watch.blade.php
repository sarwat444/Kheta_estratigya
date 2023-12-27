@extends('site.layouts.app')

@push('title','watch Course')

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/site/css/live-icon.css')}}">
@endpush

@section('content')

    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-11">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-main.html">Courses</a></li>
                        <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">Watch</a></li>
                        <li class="breadcrumb-item active">{{$course->title}}</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->



    <!-- Tutor Course Main content Start -->
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="container custom-container">

            <div class="row gy-10">
                <div class="col-lg-7">

                    <!-- Tutor Course Top Info Start -->
                    <div class="tutor-course-top-info">

                        <!-- Course Title Start -->
                        <div class="course-title"></div>
                        <!-- Course Title End -->

                        <div class="tutor-course-top-info__video-02 mt-6">
                            <div class="ratio ratio-16x9 lesson-media-preview">
                                @if($course->has_video)
                                    {!! $course->video->embed !!}
                                @else
                                    {{$course->getFirstMedia('courses')}}
                                @endif
                            </div>
                        </div>

                        <!-- Tutor Course Info Start -->
                        <div class="tutor-course-top-info__content">
                            <div class="tutor-course-top-info__badges">
                                <a class="badges-category" href="#">{{$course->category->name}}</a>
                            </div>
                            <h1 class="tutor-course-top-info__title">{{$course->title}}</h1>
                            <div class="tutor-course-top-info__meta">
                                @if($course->has_instructor)
                                    <div class="tutor-course-top-info__meta-instructor">
                                        <div class="instructor-avatar">
                                            <img src="{{asset('assets/site/images/instructor/instructor-01.jpg')}}"
                                                 alt="Instructor" width="36" height="36">
                                        </div>
                                        <div class="instructor-name">{{$course->user->name}}</div>
                                    </div>
                                @endif
                                <div class="tutor-course-top-info__meta-update">Last
                                    Update {{$course->lastLesson?->created_at->format('D-M-Y') ?? $course->updated_at->format('D-M-Y')}}</div>
                            </div>
                            <div class="tutor-course-top-info__meta">
                                <div class="tutor-course-top-info__meta-rating">

                                    <div class="rating-average"><strong>{{round($course->rates_avg_rate,2)}}</strong> /5
                                    </div>
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: {{$course->rates_avg_rate()}}%;"></div>
                                    </div>
                                    <div class="rating-count">({{$course->rates_count}})</div>

                                </div>
                                <div class="tutor-course-top-info__meta-action"><i
                                        class="meta-icon far fa-user-alt"></i> {{$course->enrollments_count}} already
                                    enrolled
                                </div>
                            </div>
                        </div>
                        <!-- Tutor Course Info End -->

                    </div>
                    <!-- Tutor Course Top Info End -->

                    <!-- Tutor Course tabs Menu Start -->
                    <div class="tutor-course-tabs tutor-course-tabs-02 bg-color-13 mt-6">
                        <ul class="nav justify-content-center">
                            <li>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button>
                            </li>
                            @if($course->has_instructor)
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#tab3">Instructors</button>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- Tutor Course tabs Menu End -->

                    <div class="tab-content mt-9">
                        <div class="tab-pane fade show active" id="tab1">

                            <!-- Tutor Course Main Segment Start -->
                            <div class="tutor-course-main-segment">

                                <!-- Tutor Course Segment Start -->
                                <div class="tutor-course-segment">
                                    <h4 class="tutor-course-segment__title">About This Course</h4>
                                    <!-- Tutor Course Segment Content Wrapper Start -->
                                    <div class="tutor-course-segment__content-wrap">
                                        <p>{{$course->description}}</p>
                                    </div>
                                    <!-- Tutor Course Segment Content Wrapper End -->
                                </div>
                                <!-- Tutor Course Segment End -->

                                <!-- Tutor Course Segment Start -->
                                <div class="tutor-course-segment">
                                    <h4 class="tutor-course-segment__title">Requirements</h4>

                                    <!-- Tutor Course Segment Requirements Items Start -->
                                    <div class="tutor-course-segment__requirements-content">
                                        @forelse($course->prerequisites as $prerequisite)
                                            <ul class="tutor-course-segment__list-style-01">
                                                <li>{{$prerequisite->course_prerequisites}}</li>
                                            </ul>
                                        @empty
                                            <ul class="list-unstyled">
                                                <div class="alert alert-primary text-center">
                                                    <span>there is no prerequisites</span>
                                                </div>
                                            </ul>
                                        @endforelse
                                    </div>
                                    <!-- Tutor Course Segment Requirements Items End -->
                                </div>
                                <!-- Tutor Course Segment End -->


                            </div>
                            <!-- Tutor Course Main Segment End -->

                        </div>
                        @if($course->has_instructor)
                            <div class="tab-pane fade" id="tab3">

                                <!-- Tutor Course Main Segment Start -->
                                <div class="tutor-course-main-segment">

                                    <!-- Tutor Course Segment Start -->
                                    <div class="tutor-course-segment">
                                        <h4 class="tutor-course-segment__title">Your Instructors</h4>

                                        <div class="tutor-course-segment__instructor">
                                            <div class="tutor-instructor">
                                                <div class="tutor-instructor__avatar">
                                                    <img src="assets/images/team/team-member-07.jpg" alt="instructor"
                                                         width="200" height="246">
                                                </div>
                                                <div class="tutor-instructor__instructor-info">
                                                    <h4 class="tutor-instructor__name">Owen Christ</h4>
                                                    <div class="tutor-instructor__ratings">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 90%;"></div>
                                                        </div>

                                                        <div class="rating-average">
                                                            <span class="rating-average__average">4.75</span>
                                                            <span class="rating-average__total">/5</span>
                                                        </div>
                                                    </div>
                                                    <div class="tutor-instructor__meta">
                                                        <span><i class="far fa-play-circle"></i> 42 Courses</span>
                                                        <span><i class="far fa-comment-alt"></i> 4 Reviews</span>
                                                        <span><i class="far fa-user"></i> 73 Students</span>
                                                    </div>
                                                    <a class="tutor-instructor__link" href="#"><i
                                                            class="far fa-plus"></i> See more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tutor Course Segment End -->

                                    <!-- Tutor Course Segment Start -->
                                    <div class="tutor-course-segment">
                                        <h4 class="tutor-course-segment__title">Student Feedback</h4>

                                        <div class="tutor-course-segment__feedback">
                                            <div class="tutor-course-segment__reviews-average">
                                                <div class="count">4.4</div>
                                                <div class="reviews-rating-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 90%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-total">8 Ratings</div>
                                            </div>
                                            <div class="tutor-course-segment__reviews-metar">

                                                <div class="course-rating-metar">
                                                    <div class="rating-metar-star">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-col">
                                                        <div class="rating-metar-bar">
                                                            <div class="rating-metar-line" style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-text">75%</div>
                                                </div>

                                                <div class="course-rating-metar">
                                                    <div class="rating-metar-star">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 80%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-col">
                                                        <div class="rating-metar-bar">
                                                            <div class="rating-metar-line" style="width: 13%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-text">13%</div>
                                                </div>

                                                <div class="course-rating-metar">
                                                    <div class="rating-metar-star">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-col">
                                                        <div class="rating-metar-bar">
                                                            <div class="rating-metar-line" style="width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-text">0%</div>
                                                </div>

                                                <div class="course-rating-metar">
                                                    <div class="rating-metar-star">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 40%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-col">
                                                        <div class="rating-metar-bar">
                                                            <div class="rating-metar-line" style="width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-text">0%</div>
                                                </div>

                                                <div class="course-rating-metar">
                                                    <div class="rating-metar-star">
                                                        <div class="rating-star">
                                                            <div class="rating-label" style="width: 20%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-col">
                                                        <div class="rating-metar-bar">
                                                            <div class="rating-metar-line" style="width: 13%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-metar-text">13%</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tutor Course Segment End -->

                                    <!-- Tutor Course Segment Start -->
                                    <div class="tutor-course-segment">
                                        <h4 class="tutor-course-segment__title">Reviews <span class="count">(3)</span>
                                        </h4>

                                        <div class="tutor-course-segment__review-commnet">
                                            <ul class="comment-list-02">
                                                <li>
                                                    <div class="comment-item-02">
                                                        <div class="comment-item-02__header">
                                                            <div class="comment-item-02__author">
                                                                <img src="assets/images/avatar/avatar-02.jpg"
                                                                     alt="Avatar" width="52" height="52">
                                                            </div>
                                                            <div class="comment-item-02__info">
                                                                <h6 class="comment-item-02__name"><a href="#">Chérif
                                                                        Akadiry</a></h6>
                                                                <p class="comment-item-02__date">2 weeks ago</p>
                                                            </div>
                                                        </div>
                                                        <div class="comment-item-02__body">

                                                            <div class="rating-star">
                                                                <div class="rating-label" style="width: 80%;"></div>
                                                            </div>

                                                            <p>el mejor de la historia</p>

                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-item-02">
                                                        <div class="comment-item-02__header">
                                                            <div class="comment-item-02__author">
                                                                <img src="assets/images/avatar/avatar-03.jpg"
                                                                     alt="Avatar" width="52" height="52">
                                                            </div>
                                                            <div class="comment-item-02__info">
                                                                <h6 class="comment-item-02__name"><a href="#">Edumall
                                                                        Website</a></h6>
                                                                <p class="comment-item-02__date">2 weeks ago</p>
                                                            </div>
                                                        </div>
                                                        <div class="comment-item-02__body">

                                                            <div class="rating-star">
                                                                <div class="rating-label" style="width: 100%;"></div>
                                                            </div>

                                                            <p>el mejor de la historia</p>

                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-item-02">
                                                        <div class="comment-item-02__header">
                                                            <div class="comment-item-02__author">
                                                                <img src="assets/images/avatar/avatar-04.jpg"
                                                                     alt="Avatar" width="52" height="52">
                                                            </div>
                                                            <div class="comment-item-02__info">
                                                                <h6 class="comment-item-02__name"><a href="#">Adeniyi
                                                                        David</a></h6>
                                                                <p class="comment-item-02__date">2 weeks ago</p>
                                                            </div>
                                                        </div>
                                                        <div class="comment-item-02__body">

                                                            <div class="rating-star">
                                                                <div class="rating-label" style="width: 100%;"></div>
                                                            </div>

                                                            <p>el mejor de la historia</p>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tutor Course Segment End -->

                                    <!-- Tutor Course Segment Start -->
                                    <div class="tutor-course-segment">
                                        <h4 class="tutor-course-segment__title">Write a review</h4>

                                        <div class="tutor-course-segment__reviews">
                                            <button
                                                class="tutor-course-segment__btn btn btn-primary btn-hover-secondary"
                                                data-bs-toggle="collapse" data-bs-target="#collapseForm">Write a review
                                            </button>

                                            <div class="collapse" id="collapseForm">
                                                <!-- Comment Form Start -->
                                                <div class="comment-form">
                                                    <form action="#">
                                                        <div class="comment-form__rating">
                                                            <label class="label">Your rating: *</label>
                                                            <ul id="rating" class="rating">
                                                                <li class="star" title='Poor' data-value='1'><i
                                                                        class="far fa-star"></i></li>
                                                                <li class="star" title='Poor' data-value='2'><i
                                                                        class="far fa-star"></i></li>
                                                                <li class="star" title='Poor' data-value='3'><i
                                                                        class="far fa-star"></i></li>
                                                                <li class="star" title='Poor' data-value='4'><i
                                                                        class="far fa-star"></i></li>
                                                                <li class="star" title='Poor' data-value='5'><i
                                                                        class="far fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="row gy-4">
                                                            <div class="col-md-6">
                                                                <div class="comment-form__input">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Your Name *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="comment-form__input">
                                                                    <input type="email" class="form-control"
                                                                           placeholder="Your Email *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="comment-form__input">
                                                                    <textarea class="form-control"
                                                                              placeholder="Your Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="comment-form__input form-check">
                                                                    <input type="checkbox" id="save">
                                                                    <label for="save">Save my name, email, and website
                                                                        in this browser for the next time I
                                                                        comment.</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="comment-form__input">
                                                                    <button class="btn btn-primary btn-hover-secondary">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Comment Form End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tutor Course Segment End -->

                                </div>
                                <!-- Tutor Course Main Segment End -->

                            </div>
                        @endif
                    </div>

                </div>
                <div class="col-lg-5">
                    <!-- Tutor Course Sidebar Start -->
                    <div class="tutor-course-sidebar sidebar-label" style="max-width: 100%;">
                        <div>
                        <span  class="dashboard-course-item__progress-bar-text "> <i class="fa fa-record-vinyl"></i> {{calculateProgress($course->course_progress_count,$course->lessons_count, true)}}</span>
                        <span  class="tutor-course-segment__duration float-end"><i class="fa fa-clock"></i> {{hours_minutes_seconds($course->lessons_sum_duration)}}</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{calculateProgress($course->course_progress_count,$course->lessons_count, true)}}" aria-valuenow="{{calculateProgress($course->course_progress_count,$course->lessons_count, true)}}" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>

                        <div class="tutor-course-segment__header">

                            <div class="tutor-course-segment__lessons-duration">


                            </div>
                        </div>
                        <!-- Tutor Course Price Preview Start -->
                        <div class="tutor-course-price-preview">
                            <span class="tutor-course-segment__lessons">{{$course->lessons_count}} Lessons</span>
                            <!-- Tutor Course Main Segment Start -->
                            <div class="tutor-course-main-segment">
                                <!-- Tutor Course Segment Start -->
                                <div class="tutor-course-segment">
                                    <div class="course-curriculum accordion">
                                        @forelse($course->sections as $section)
                                            <div class="accordion-item">
                                                <button class="accordion-button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse_section_{{$section->id}}"><i
                                                        class="tutor-icon"></i>{{$section->name}}</button>
                                                <div id="collapse_section_{{$section->id}}"
                                                     class="accordion-collapse collapse"
                                                     data-bs-parent="#accordionCourse">

                                                    <div class="course-curriculum__lessons">
                                                        @forelse($section->lessons as $lesson)
                                                            <div class="course-curriculum__lesson">
                                                            <span
                                                                class="course-curriculum__title play-lesson {{($lesson->lesson_progress?->is_last_viewed === 1) ? 'last-viewed' : '' }}"
                                                                id="play_lesson_{{$lesson->id}}"
                                                                onclick="playLesson({{$course->id}},{{$section->id}},{{$lesson->id}});"
                                                                data-course-id="{{$course->id}}"
                                                                data-section-id="{{$section->id}}"
                                                                data-lesson-id="{{$lesson->id}}">
                                                            <div class="live-icon"></div>
                                                            @if($lesson->isDocument())
                                                                    <i class="far fa-file-alt"></i>
                                                                @else
                                                                    <i class="far fa-play-circle"></i>
                                                                @endif
                                                                {{$lesson->title}}
                                                            </span>
                                                                <span class="course-curriculum__icon">
                                                                    <span class="completed-area">
                                                                    @if($lesson->lesson_progress?->is_completed)
                                                                            <i class='fa fa-check-circle'></i>
                                                                        @endif
                                                                    </span>
                                                                     @if($lesson->isFree())
                                                                        <i class="far fa-lock-alt"></i>
                                                                    @else
                                                                        <i class="far fa-lock-open"></i>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        @empty
                                                            <div class="alert alert-primary text-center">
                                                                <span class="alert-heading">there is no lessons.</span>
                                                            </div>
                                                        @endforelse
                                                    </div>

                                                </div>
                                            </div>
                                        @empty

                                        @endforelse
                                    </div>

                                </div>
                                <!-- Tutor Course Segment End -->

                            </div>
                            <!-- Tutor Course Main Segment End -->
                        </div>
                        <!-- Tutor Course Price Preview End -->

                    </div>
                    <!-- Tutor Course Sidebar End -->

                </div>
            </div>


        </div>
    </div>
    <!-- Tutor Course Main content End -->

@endsection

@push('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="{{asset('assets/site/js/helpers/time.js')}}"></script>
    <script src="{{asset('assets/site/js/helpers/time-constants.js')}}"></script>
    <script src="{{asset('assets/site/js/helpers/lessons-type.js')}}"></script>
    <script src="{{asset('assets/site/js/helpers/lessons-constants.js')}}"></script>
    @include('site.users.courses.scripts.play-last-viewed-lesson')
    @include('site.users.courses.scripts.lesson-progress')
@endpush
