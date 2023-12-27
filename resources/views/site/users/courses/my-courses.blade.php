@extends('site.layouts.app')

@push('title','my courses')


@section('content')

    @include('site.users.courses.partials.slider')

    <!-- Courses Start -->
    <div class="courses-section section-padding-01">
        <div class="container">

            @include('site.users.courses.partials.header-list-grid')

            <div class="tab-content">

                <div class="tab-pane fade show active" id="grid">

                    <div class="row gy-6">
                        @forelse($courses as $course)
                            <div class="col-xl-3 col-lg-4 col-sm-6">

                                <!-- Course Start -->
                                <div class="course-item" data-course-id="{{$course->id}}" data-aos="fade-up"
                                     data-aos-duration="1000">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail rounded-0">
                                            <a href="{{route('site.courses.me.watch',$course->id)}}"><img
                                                    src="{{$course->getFirstMedia('courses')->getUrl('courses_thumb')}}"
                                                    alt="courses" width="330" height="221"></a>
                                        </div>
                                        @if($course->IsFree())
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        @elseif($course->IsTop())
                                            <div class="course-header__badge">
                                                <span class="hot">Top Level</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="course-info">
                                        <span
                                            class="course-info__badge-text {{\App\Enums\CourseLevel::badgeBootstrap(\App\Enums\CourseLevel::tryFrom($course->level))}}">{{\App\Enums\CourseLevel::tryFrom($course->level)->name}}</span>

                                        <h3 class="course-info__title">
                                            <a href="{{route('site.courses.me.watch',$course->id)}}">
                                                {{$course->title}}
                                            </a>
                                        </h3>
                                        <div class="course-info__description">
                                            <p>{{$course->description}}</p>
                                        </div>
                                        <div class="course-info__category">
                                            <a href="#">{{$course->category->name}}</a>
                                        </div>
                                        <div class="course-info__price">
                                            @if($course->IsFree())
                                                <span class="free">Free</span>
                                            @else
                                                <span class="sale-price">{{$course->price}}</span>
                                            @endif
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label"
                                                     style="width: {{$course->rates_avg_rate()}}%;"></div>
                                            </div>

                                            <span>({{$course->rates_count}})</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <h4 class="alert-heading">No Courses Found</h4>
                                    <p>There are no courses available at the moment.</p>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>

                <div class="tab-pane fade" id="list">
                    @forelse($courses as $course)
                        <div class="course-list-item">
                            <div class="course-list-header">
                                <div class="course-list-header__thumbnail ">
                                    <a href="{{route('site.courses.me.watch',$course->id)}}"><img
                                            src="{{$course->getFirstMediaUrl('courses')}}"
                                            alt="courses" width="270" height="181"></a>
                                </div>
                                @if($course->IsFree())
                                    <div class="course-header__badge">
                                        <span class="free">Free</span>
                                    </div>
                                @elseif($course->IsTop())
                                    <div class="course-header__badge">
                                        <span class="hot">Top Level</span>
                                    </div>
                                @endif
                            </div>
                            <div class="course-list-info">
                                <h3 class="course-list-info__title">
                                    <a href="{{route('site.courses.me.watch',$course->id)}}">
                                        {{$course->title}}
                                    </a>
                                </h3>
                                <div class="course-list-info__meta">
                                    <span><i class="far fa-play-circle"></i> {{$course->lessons_count}} Lessons</span>
                                    <span><i class="far fa-clock"></i> {{hours_minutes_seconds($course->lessons_sum_duration)}} hours</span>
                                    <span><i class="far fa-sliders-h"></i> {{\App\Enums\CourseLevel::tryFrom($course->level)->name}}</span>
                                </div>
                                <div class="course-list-info__description">
                                    <p>{{$course->description}}</p>
                                </div>
                                <div class="course-list-info__footer">
                                    <div class="course-list-info__price">
                                        @if($course->IsFree())
                                            <span class="free">Free</span>
                                        @else
                                            <span class="sale-price">{{$course->price}}</span>
                                        @endif
                                    </div>
                                    <div class="course-list-info__rating">

                                        <div class="rating-star">
                                            <div class="rating-label"
                                                 style="width: {{$course->rates_avg_rate()}}%;"></div>
                                        </div>



                                        <p class="course-list-info__rating-count">({{$course->rates_count}} ratings)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <h4 class="alert-heading">No Courses Found</h4>
                                <p>There are no courses available at the moment.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="page-pagination pagination justify-content-center">
                    {{$courses->withQueryString()->links()}}
                </div>

            </div>
        </div>
    </div>
    <!-- Courses End -->

    <!-- Courses Hover End -->
    <div id="course-hover">
        <div class="course-item-hover">
            <div class="course-item-hover__category"></div>
            <h2 class="course-item-hover__title"></h2>
            <div class="course-item-hover__rating"></div>
            <div class="course-item-hover__meta">
                <span></span>
                <span></span>
            </div>
            <div class="course-item-hover__benefits">
                <h6 class="course-item-hover__benefits-title"></h6>
                <ul class="course-item-hover__benefits-list"></ul>
            </div>
        </div>
    </div>
    <!-- Courses Hover End -->

@endsection

@push('scripts')
    <script src="{{asset('assets/site/js/helpers/time.js')}}"></script>
    @include('site.courses.scripts.grid-list-tabs')
    @include('site.courses.scripts.hover-course')
    @include('site.courses.scripts.hover-course-leave')
@endpush
