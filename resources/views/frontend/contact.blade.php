<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
@include('frontend.layouts.header')
@section('title','NUMBUS || Contact')
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
                                    <h2>Contact</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                
   <div class="row">
   
     <div class="col-md-12 col-sm-12">
        <!--service box starts-->
        <h4 class="comman-heading fade-in one"><span class="contatus">Contact <site>Us</site> </span></h4>
        <div class="seprator"></div>
        <p class="cont-met">Incorporated in the year 2003, Nimbus Technologies is a widely renowned firm engrossed in distributing as well as supplying of automation and data acquisition systems that are procured from reliable companies.We supply data loggers, PLC control systems as well as data acquisition systems and distribute basic elements as well as offer complete solution in Lab Automation, Process Automation & Data Acquisition Systems.</p>
          <div class="contact-box" style="border:0;">
      <div>
      <div class="col-md-12 splpad splpad1 fade-in one wow fadeInUp" data-wow-delay="100ms">    
           <!--address row starts-->
            <div class="col-md-4 col-sm-4 contact">
            	<div class="cont-icon">
                	<i class="fa fa-map-marker"></i><p> Globe Estate, Plot No. C-9, Unit No. 225, 2nd Floor, M.I.D.C. Industrial Area, Phase-1,Near Tata Power House Co. New Kalyan Road, Khambalpada, Dombivali (East) – 421 203 Dist. Thane, Maharashtra, India.</p>
                </div>
            </div>
           <!--address row ends-->
            <!--phn row starts-->
          
           <!--phn row ends-->
            <!--address row starts-->
            <div class="col-md-4  col-sm-4contact">
            	<div class="cont-icon">
                	<i class="fa fa-mobile"></i><p>+91 9819 391 323</p>
					   <p>Sales Department  – 9930379156<br>
					   Technical Department –9819813306<br>
					   Office Landline – 0251- 2973892/93/94</p>

                </div>
            </div>
           <!--address row ends-->
            <!--address row starts-->
            <div class="col-md-4 col-sm-4 contact">
            	<div class="cont-icon">
                	<i class="fa fa-envelope-o"></i><p>sales@nimbus-technologies.com<br />
                                                        sales01@nimbus-technologies.com<br />
                                                        </p>
                </div>
            </div>
			<div class="clear"></div>
			<div class="col-md-4 col-sm-4 contact">
            	<div class="cont-icon">
                	<a href="http://www.nimbus-technologies.net/" rel="nofollow" target="_blank"><img src="{{asset('public/frontend/images/in.png')}}" alt="img"></a>
                </div>
            </div>
           <!--address row ends-->
            <!--phn row starts-->
          
           <!--phn row ends-->
            <!--address row starts-->
            <div class="col-md-4  col-sm-4contact">
            	<div class="cont-icon">
                	<a href="https://www.semikart.com/search/supplier/nimbus-technologies/50433/1" rel="nofollow" target="_blank"><img src="{{asset('public/frontend/images/semi-logo.png')}}" alt="img"></a>
                </div>
            </div>
           <!--address row ends-->
            <!--address row starts-->
            <div class="col-md-4 col-sm-4 contact">
            	<div class="cont-icon">
                	<a href="http://www.remotedas.com/isolated-signal-conditioner.html" rel="nofollow" target="_blank"><img src="{{asset('public/frontend/images/tread.png')}}" alt="img"></a>
                </div>
            </div>
          </div>
        <!--service box ends-->
       </div>
     
   </div>
 </div>
 </div>
 </div>
 </div>
   
<div class="container-fluid bg">
 		<div class="container">
            <div class="row">
                <div class="col-md-6 address">
                   <h1>Contact Form</span></h1>
                  
                   <div class="contact_form">
                        	<form action="mail.php" method="post">
                            	<input type="text" name="name" placeholder="Name*" required />
                                <input type="email" name="email" placeholder="Your Email*" required />
                                <input type="text" name="phone" placeholder="Phone*"/>
								<input type="text" name="sub" placeholder="Subject*"  />
                                <textarea name="comment" placeholder="Comment*" ></textarea>
                                <!--<div class="cont_submit">-->
								<input name="captcha" type="text"  placeholder="Captcha Code" required>
<img src="captcha.php" /><br>
                               	 <input type="submit" name="submit" value="Send Message" class="sub"/>
                                <!--</div>-->
                            </form>
                        </div>	
         	    </div>
                <div class="col-md-6 map_sec">
            
                	<div class="map">
                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.410790511893!2d73.11287341434948!3d19.22092075239721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be795bf12748a9d%3A0xf8e7fd1693f49811!2sNimbus+Technologies%2C+Dombivli!5e0!3m2!1sen!2sin!4v1493183677168" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                    
                    
                    
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.4109066349465!2d73.11287341490348!3d19.220915687004965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be795bf12748a9d%3A0xf8e7fd1693f49811!2sNimbus+Technologies%2C+Dombivli!5e0!3m2!1sen!2sin!4v1496205426471" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
		<!--	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyD1x0rvvpgvONQJsSLQ42DQS-GBkb9hyRc '></script><div style='overflow:hidden;height:410px;width:100%;'><div id='gmap_canvas' style='height:410px;width:100%;color:#000'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://indiatvnow.com/'>https://indiatvnow.com/</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=71b39ecaf9e04bad99a5806e93eeeffe199de170'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(19.219664,73.10766999999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.219664,73.10766999999998)});infowindow = new google.maps.InfoWindow({content:'<strong>Nimbus Technologies</strong><br>Globe Estate, Plot No. C-9, Unit No. 225, 2nd Floor, M.I.D.C. Industrial Area, Phase-1,Near Tata Power House Co. New Kalyan Road, Khambalpada, Dombivali (East) <br> 421 203 Thane, Maharashtra.<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
    				</div>
                    
                </div>
          <div class="clear"></div>
      
 </div>   

<!-------------------------------Form Area Start------------------------------------>


                         
                </div>
            </section>
          
             
            
        </main>
        <!-- main-area-end -->
        @include('frontend.layouts.footer')
</body>
</html>    