<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
@include('frontend.layouts.header')
@section('title','NUMBUS || About us')
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
                                    <h2>About Us</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
              <!-- about-area -->
            <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background-image: url({{asset('public/frontend/img/bg/about-bg.html')}}); background-size: cover;">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                         <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                                <img src="{{asset('public/frontend/img/features/about_img.png')}}" alt="img">   
                               <div class="about-text second-about">
                                    <span>25+</span>
                                    <p>Years of Experience</p>
                                </div>
                            </div>
                          
                        </div>
                        
					<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                <div class="about-title second-title pb-25">  
                                    <h5>Who We Are</h5>
                                    <h2>Get The Best Connection</h2>                                   
                                </div>
                                    <p>Nulla a mauris feugiat, bibendum sapien pretium, dictum nisl. Integer fringilla varius nisl vitae ornare. Praesent dictum sem nibh, vitae bibendum eros porta vel. In eget quam egestas, aliquam lectus sed, porta neque.</p>
                                   <p>Roin vitae eros vestibulum, vestibulum velit eu, scelerisque quam. Aenean ullamcorper convallis risus at rhoncus. Ut vitae mi vitae nisl semper mollis vitae in velit. Mauris at commodo urna.</p>
                                    <div class="about-content3 mt-30">
                                    <div class="row">
                                    <div class="col-md-12">
                                     <ul class="green">                                              
                                                <li>
                                                    <h5>4K Ultra HD Quality</h5>
                                                    <p>With 350 Mbps</p>
                                                </li>
                                                <li>
                                                    <h5>Ultra Fast Wifi</h5>
                                                    <p>With 10 Gbps</p>
                                                </li>
                                           </ul>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                     
                    </div>
                </div>
            </section>
            
            <!-- testimonial-area-end -->

            <section class="cta-area cta-bg pt-120 pb-120" style="background-image:url({{asset('public/frontend/img/bg/cta_bg02.png')}})">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
								<h3>Watch Us</h3>
                                <h2>Get Internet With<br>TV Service</h2>
                                <p>Nunc pellentesque eros ac augue tempus, vitae convallis lorem consectetur. Nulla maximus at nisl eu malesuada. Nullam quis blandit lacus. Fusce tincidunt tellus turpis, quis fermentum justo tempus eget.</p>
								 <div class="cta-btn s-cta-btn wow fadeInRight animated mt-30" data-animation="fadeInDown animated" data-delay=".2s">
									  <a href="about.html" class="btn ss-btn smoth-scroll">Let’s Get Started</a>			
								</div>
                            </div>
                                             
                        </div>
					   <div class="col-lg-6">

                                <div class="s-video-content">
                                    <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="popup-video mb-50"><img src="{{asset('public/frontend/img/bg/play-button.png')}}" alt="circle_right"></a>
                                   
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-area-end -->	
             <!-- team-area -->
            <section class="team-area2 fix p-relative pt-105 pb-80">  
                <div class="container">  
                    <div class="row">   
                        <div class="col-lg-12 p-relative">
                           <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                               <h5>Our Team</h5>
                                <h2>
                                    Best Expert Team
                                </h2>
                             
                            </div>
                        </div>                        
                         
                    </div>
                   <div class="row team-active">                   
                        <div class="col-xl-4">
                            <div class="single-team mb-40" >
                                <div class="team-thumb">
                                    <div class="brd">
                                         <img src="{{asset('public/frontend/img/team/team01.jpg')}}" alt="img">
                                        
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">Howard Holmes</a></h4>
                                    <p>Designer</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a></li>   
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>   
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="single-team mb-40" >
                                <div class="team-thumb">
                                    <div class="brd">
                                        <img src="{{asset('public/frontend/img/team/team02.jpg')}}" alt="img">
                                    </div>                                     
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">Ella Thompson</a></h4>
                                    <p>Designer</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a></li>   
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>   
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="col-xl-4">
                            <div class="single-team mb-40" >
                                <div class="team-thumb">
                                    <div class="brd">
                                        <img src="{{asset('public/frontend/img/team/team03.jpg')}}" alt="img">
                                    </div>
                                    
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">Vincent Cooper</a></h4>
                                    <p>Designer</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a></li>   
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>   
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-4">
                            <div class="single-team mb-40" >
                                <div class="team-thumb">
                                    <div class="brd">
                                         <img src="{{asset('public/frontend/img/team/team04.jpg')}}" alt="img">
                                    </div>
                                
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">Danielle Bryant</a></h4>
                                    <p>Designer</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a></li>   
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>   
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="col-xl-4">
                            <div class="single-team mb-40" >
                                <div class="team-thumb">
                                    <div class="brd">
                                        <img src="{{asset('public/frontend/img/team/team05.jpg')}}" alt="img">
                                    </div>
                                    
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">Vincent Cooper</a></h4>
                                    <p>Designer</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a></li>   
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>   
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            
        </main>
        <!-- main-area-end -->
        @include('frontend.layouts.footer')
</body>
</html>     
