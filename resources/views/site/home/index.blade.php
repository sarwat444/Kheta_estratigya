@extends('site.layouts.app')

@push('title','home page')

@section('content')

    <!-- Slider Section Start -->
    @include('site.partials.slider')
    <!-- Slider Section End -->


    <!-- Features Section Start -->
    @include('site.home.features')
    <!-- Features Section End -->


    <!-- Course Section Start -->
    @include('site.home.courses')
    <!-- Course Section End -->



    <!-- Banner Start -->
    @include('site.home.banner')
    <!-- Banner End -->
@endsection

@push('scripts')
    <script src="{{asset('assets/site/js/helpers/time.js')}}"></script>
    @include('site.home.scripts.hover-course-leave')
    @include('site.courses.scripts.grid-list-tabs')
    @include('site.home.scripts.hover-course')
@endpush
