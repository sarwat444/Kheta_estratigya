<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8" />
    <title>@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
   <link href="{{asset('/assets/admin/css/bootstrap-rtl.min.css')}}"  rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets/admin/css/app.min.css')}}"   rel="stylesheet" type="text/css" />
    <script src="{{asset('/assets/admin/js/pace.min.js')}}"></script>
    <link href="{{asset('/assets/admin/css/pace.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/admin/css/custom-responsive.css')}}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@500&display=swap" rel="stylesheet">
    <link href="{{asset('/assets/admin/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            body
            {
                direction: rtl;
                font-family: 'Noto Kufi Arabic', sans-serif;
            }
            html
            {
                font-family: 'Noto Kufi Arabic', sans-serif;
            }
            .main-content
            {
                margin-left: 0 !important;
            }
            th{
                font-size: 13px !important;
            }
        </style>
    @stack('styles')
</head>

<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    @include('sub_geha.partials.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('sub_geha.partials.side-menu')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('sub_geha.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('sub_geha.partials.right-bar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('/assets/admin/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/admin/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('/assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/assets/admin/libs/node-waves/waves.min.js')}}"></script>

{{-- this file under comment control language files --}}
<script src="{{asset('/assets/admin/js/app.js')}}"></script>
<script  src="{{asset('/assets/admin/js/flasher.min.js')}}"></script>
@include('gehat.partials.scripts.flash-messages')
@include('gehat.partials.scripts.remove-is-invalid-class-inputs')
@include('gehat.partials.scripts.automatic-validation-flash')
@include('gehat.partials.scripts.constants-localization')
@include('gehat.partials.scripts.search')
@stack('scripts')
</body>
</html>
