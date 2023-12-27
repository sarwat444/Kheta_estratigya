<!DOCTYPE html>
<html class="no-js" lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@stack('title','dashboard')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/instructor/images/favicon.png')}}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/vendor/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/vendor/edumall-icon.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/vendor/bootstrap.min.css')}}">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/aos.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/jquery.powertip.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/plugins/select2.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/assets/instructor/css/style.css')}}">
    @stack('styles')
</head>

<body class="dashboard-page dashboard-nav-fixed">
@include('instructors.partials.top_navbar')
@include('instructors.partials.sidebar')
<!-- Dashboard Main Wrapper Start -->
<main class="dashboard-main-wrapper">

    <!-- Dashboard Content Start -->
    <div class="dashboard-content">

        <div class="container">

            @yield('content')
        </div>


    </div>
    <!-- Dashboard Content End -->

</main>
<!-- Dashboard Main Wrapper End -->




<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Vendors JS -->
<script src="{{asset('/assets/instructor/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/vendor/bootstrap.bundle.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('/assets/instructor/js/plugins/aos.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/parallax.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/jquery.powertip.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/nice-select.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/flatpickr.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/range-slider.js')}}"></script>
<script src="{{asset('/assets/instructor/js/plugins/select2.min.js')}}"></script>
<!-- Activation JS -->
<script src="{{asset('/assets/instructor/js/main.js')}}"></script>
<script  src="{{asset('/assets/admin/js/flasher.min.js')}}"></script>
@include('instructors.partials.scripts.flash-messages')
@include('instructors.partials.scripts.remove-is-invalid-class-inputs')
@include('instructors.partials.scripts.automatic-validation-flash')
@include('instructors.partials.scripts.constants-localization')
@stack('scripts')

</body>

</html>
