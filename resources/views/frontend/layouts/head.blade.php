<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/favicon.ico')}}">
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/dripicons.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/default.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
@stack('styles')

