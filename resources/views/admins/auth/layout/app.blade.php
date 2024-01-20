<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset(PUBLIC_PATH.'assets/admin/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset(PUBLIC_PATH.'assets/admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset(PUBLIC_PATH.'assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset(PUBLIC_PATH.'assets/admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@500&display=swap" rel="stylesheet">
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />
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
<body>
<div class="account-pages my-5 pt-sm-5">
    @yield('content')
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset(PUBLIC_PATH.'assets/admin/libs/node-waves/waves.min.js')}}"></script>
<!-- App js -->
<script src="{{asset(PUBLIC_PATH.'assets/admin/js/app.js')}}"></script>
</body>
</html>
