<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} || DASHBOARD</title>
  
    <!-- Custom fonts for this template-->
    <link href="{{asset('public/backend/images/favicon.png')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
   <!-- <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">-->

    @stack('styles')
  
</head>