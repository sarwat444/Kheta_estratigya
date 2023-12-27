@extends('site.layouts.app')

@push('title','Course Details')

@section('content')

    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-11">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('site.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('site.courses')}}">courses</a></li>
                        <li class="breadcrumb-item active">{{$course->name}}</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Tutor Course Top Info Start -->
    <div class="tutor-course-top-info section-padding-01 bg-color-11">
        <div class="container custom-container">

            <div class="row">
                <div class="col-lg-8">

                    <!-- Tutor Course Top Info Start -->
                    <div class="tutor-course-top-info__content">
                        <div class="tutor-course-top-info__badges">
                            <span class="badges-category">{{$course->category->name}}</span>
                        </div>
                        <h1 class="tutor-course-top-info__title">{{$course->title}}</h1>
                        <div class="tutor-course-top-info__meta">
                            @if($course->has_instructor)
                                <div class="tutor-course-top-info__meta-instructor">
                                    <div class="instructor-avatar">
                                        <img src="{{asset('assets/site/images/instructor/instructor-01.jpg')}}"
                                             alt="Instructor" width="36" height="36">
                                    </div>
                                    <div class="instructor-name">{{$course->user->full_name}}</div>
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
                    <!-- Tutor Course Top Info End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Tutor Course Top Info End -->

    <!-- Tutor Course Main content Start -->
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="container custom-container">

            <div class="row gy-10">
                <div class="col-lg-8">
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

                        <!-- Tutor Course Segment Start -->
                        <div class="tutor-course-segment">

                            <div class="tutor-course-segment__header">
                                <h4 class="tutor-course-segment__title">Curriculum</h4>

                                <div class="tutor-course-segment__lessons-duration">
                                    <span
                                        class="tutor-course-segment__lessons">{{$course->lessons_count}} Lessons</span>
                                    <span
                                        class="tutor-course-segment__duration">{{hours_minutes_seconds($course->lessons_sum_duration)}}</span>
                                </div>
                            </div>

                            <div class="course-curriculum accordion">
                                <div class="accordion-item">
                                    @forelse($course->sections as $section)

                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree{{$section->id}}">
                                            <i class="tutor-icon"></i>
                                            {{$section->name}}
                                        </button>
                                        <div id="collapseThree{{$section->id}}" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionCourse">
                                            <div class="course-curriculum__lessons">
                                                @forelse($section->lessons as $lesson)
                                                    <div class="course-curriculum__lesson">
                                                    <span class="course-curriculum__title">
                                                    @if($lesson->isDocument())
                                                            <i class="far fa-file-alt"></i>
                                                        @else
                                                            <i class="far fa-play-circle"></i>
                                                        @endif
                                                        {{$lesson->title}}
                                                    </span>
                                                        <span class="course-curriculum__icon">
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
                                    @empty


                                    @endforelse
                                </div>
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
                                @if($course->has_video)
                                    <div class="tutor-course-price-preview__thumbnail">
                                        <div class="ratio ratio-16x9">
                                            {!! $course->video->embed !!}
                                        </div>
                                    </div>
                                @else
                                    <div class="tutor-course-price-preview__thumbnail">
                                        <div class="ratio ratio-16x9">
                                            <img src="{{$course->getFirstMedia('courses')->getUrl('courses_thumb')}}"
                                                 alt="course-thumbnail">
                                        </div>
                                    </div>
                                @endif

                                <button class="btn btn-primary btn-sm freecoursebtn watch-free-lessons-btn">View Free
                                    Lessons
                                </button>
                                <div class="tutor-course-price-preview__price">
                                    <div class="tutor-course-price">
                                        @if($course->NotIsFree())
                                            <span class="sale-price">{{$course->price}}<span
                                                    class="separator">.00</span></span>
                                        @elseif($course->IsDiscounted())
                                            <span class="regular-price">{{$course->old_price}}<span class="separator">.00</span></span>
                                        @elseif($course->IsFree())
                                            <span class="free">Free</span>
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
                                            <div class="value">{{$course->lessons_count}} lectures</div>
                                        </li>
                                        <li>
                                            <div class="label"><i class="far fa-tag"></i> Subject</div>
                                            <div class="value">{{$course->category->name}}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tutor-course-price-preview__btn">
                                    @if(!\Cart::get($course->id) && auth()->check() && !$course->enrolled && $course->NotIsFree())
                                        <button data-item="{{$course->id}}"
                                                @class(['add-cart' => auth()->check() && !$course->enrolled,'btn btn-primary btn-hover-secondary w-100' => true]) @guest data-bs-toggle="modal"
                                                data-bs-target="#loginModal" @endguest><i
                                                class="far fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    @endif
                                    <a href="#" class="btn btn-light btn-hover-primary w-100">Add to wishlist</a>

                                    @if(auth()->check() && !$course->enrolled && $course->IsFree())
                                        <a href="{{route('site.courses.enroll',$course->id)}}"
                                           class="btn btn-light btn-hover-primary w-100">Enrol Now</a>
                                    @endif
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
    <!-- Tutor Course Main content End -->
    @include('site.courses.modals.free-course-lessons')
@endsection

@push('scripts')
    <script src="{{asset('assets/site/js/helpers/time.js')}}"></script>
    @include('site.courses.scripts.watch-course-lessons')
    @include('site.courses.scripts.free-course-lessons')
    @include('site.courses.scripts.add-to-cart')
@endpush
