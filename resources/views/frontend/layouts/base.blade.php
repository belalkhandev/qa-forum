<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title', $page_title)</title>
    <!--  bootstrap v4.1.3  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!--  fontawesome v5.3.1  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/slicknav/slicknav.min.css') }}">

    @stack('header-styles')

    <!--  styles  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">   
    <!--  custom styles  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>
<body>
    
    @yield('content.base')

    <!--  jquery main file  -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <!--  jquery plugin  -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel -->
    <script src="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- slicknav -->
    <script src="{{ asset('frontend/assets/vendors/slicknav/jquery.slicknav.min.js') }}"></script>
    <!--  jquery plugin active script  -->
    <script src="{{ asset('frontend/assets/js/active.js') }}"></script>
    
    @stack('footer-styles')

    @stack('footer-scripts')
    
</body>
</html>