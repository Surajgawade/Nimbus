<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
@include('frontend.layouts.header')
@section('title','NUMBUS || Principle')
@section('main-content')
<main>
            
            <!-- breadcrumb-area -->
             <section class="breadcrumb-area d-flex align-items-center p-relative fix" style="background-image:url({{asset('public/frontend/img/bg/bdrc-bg.jpg')}})">
                 <div class="slider-circal"></div>
                  <div class="slider-circal-2"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Principle</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Principle</li>
                                    </ol>
                                </nav>
                            </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background-image: url({{asset('public/frontend/img/bg/about-bg.html')}}); background-size: cover;">
                <div class="container">
                    Comming Soon
                         
                </div>
            </section>
          
             
            
        </main>
        <!-- main-area-end -->
        @include('frontend.layouts.footer')
</body>
</html>    