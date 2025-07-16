<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{config('app.name') }} || DASHBOARD</title>


</head>
<body>
    <div class="main-wrapper">
        <div class="header header-one">

            <div class="header-left header-left-one">
                <a href="#" class="logo">
                <img src="{{asset('public/backend/images/logo.png')}}" alt="Logo">
                </a>
                <a href="#" class="white-logo">
                <img src="{{asset('public/backend/images/logo-white.png')}}" alt="Logo">
                </a>
                <a href="#" class="logo logo-small">
                <img src="{{asset('public/backend/images/logo.png')}}" alt="Logo" style="max-height: 10px;">
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>

            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav nav-tabs user-menu">

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                    <img src="{{asset('public/backend/images/profiles/avatar-01.jpg')}}" alt="">
                    <span class="status online">{{auth()->user()->email}}</span>
                    </span>
                    <span></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i data-feather="user" class="me-1"></i> Profile</a>
                        <!-- <a class="dropdown-item" href="#"><i data-feather="key" class="me-1"></i> Change Password</a> -->
                        <a class="dropdown-item text-danger" href="#"><i data-feather="log-out" class="me-1"></i> Logout</a>
                    </div>
                </li>

            </ul>
        </div>

        @include('admin.layouts.sidebar')
  
<script src="{{asset('public/backend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.validate.min.js')}}"></script>
  @stack('scripts')
    

   

   
   