<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@stack('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/favicon.png')}}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/edumall-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/bootstrap.min.css')}}">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/jquery.powertip.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/plugins/select2.min.css')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    @stack('styles')
</head>

<body>

<main class="main-wrapper">

    <!-- Header start -->
    @include('site.partials.header')
    <!-- Header End -->


    @yield('content')

    <!-- Footer Start -->
    @include('site.partials.footer')
    <!-- Footer End -->

    <!--Back To Start-->
    <button id="backBtn" class="back-to-top backBtn">
        <i class="arrow-top fal fa-long-arrow-up"></i>
        <i class="arrow-bottom fal fa-long-arrow-up"></i>
    </button>
    <!--Back To End-->

</main>

<!-- Log In Modal Start -->
@include('site.modals.login')
<!-- Log In Modal End -->

<!-- Log In Modal Start -->
@include('site.modals.register')
<!-- Log In Modal End -->




<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Vendors JS -->
<script src="{{asset('assets/site/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/site/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/site/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/site/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/site/js/plugins/aos.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/parallax.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/jquery.powertip.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/nice-select.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/flatpickr.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/range-slider.js')}}"></script>
<script src="{{asset('assets/site/js/plugins/select2.min.js')}}"></script>


<!-- Activation JS -->
<script src="{{asset('assets/site/js/main.js')}}"></script>
@include('site.partials.scripts.flash-messages')
@include('site.partials.scripts.automatic-validation-flash')
@include('site.scripts.login')
@stack('scripts')

</body>

</html>
