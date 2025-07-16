<!-- header -->
        <header class="header-area header-three">  
			  <div id="header-sticky" class="menu-area">
                <div class="container">
                    <div class="second-menu">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="#"><img src="{{asset('public/frontend/img/logo/logo.png')}}" alt="logo"></a>
                                </div>
                            </div>
                           <div class="col-xl-6 col-lg-6">
                              
                                <div class="main-menu text-right text-xl-right">
                                    <nav id="mobile-menu">
                                          <ul>
                                            <li class="has-sub">
                                                <a href="#">ABOUT US</a>
                                                <ul>													
													<li><a href="{{route('aboutus')}}">Company Profile</a></li>
													<li><a href="{{route('downloads')}}">Downloads</a></li>													
													<li><a href="{{route('careers')}}">Careers</a></li>													
												</ul>
                                            </li>
                                             
                                            
                                              <li class="has-sub">
                                                <a href="{{route('products')}}">PRODUCTS</a>
                                               <!-- <ul>													
													<li> <a href="#">Industrial Division</a></li>
                                                    <li> <a href="#">GSM & GPRS Modem</a></li>
                                                    <li> <a href="#">Wireless Division</a></li>
                                                    <li> <a href="#">Panel PC & Industrial Chassis</a></li>
                                                    <li> <a href="#">Isolators & Transmitters</a></li>
                                                    <li> <a href="#">Security Division</a></li>
												</ul>-->
                                            </li>  
                                            <li><a href="{{route('ewaste')}}">E-WASTE</a></li>  
                                              <li><a href="{{route('news')}}">NEWS</a></li>  
                                            <li class="has-sub"> 
                                                <a href="#">CLIENTELE</a>
                                                <ul>
                                                    <li><a href="{{route('client')}}">Client</a></li>
                                                    <li><a href="{{route('principle')}}">Principle</a></li>
                                                </ul>
                                            </li>


                                            <li><a href="{{route('contact')}}">CONTACT</a></li>                                               
                                        </ul>
                                    </nav>
                                </div>
                            </div>   
                             <div class="col-xl-4 col-lg-4 text-right d-none d-lg-block mt-25 mb-25 text-right text-xl-right">
                                <div class="right-menu">
                                    <ul>
                                       
                                        <li>
                                            <div class="icon"><img src="{{asset('public/frontend/img/bg/top-m-icon.png')}}" alt="top-m-icon.png"></div>
                                            <div class="text">
                                                <span>Call Now !</span>
                                                <strong>+91 9819 391 323</strong>
                                            </div>
                                        </li>
                                    </ul>
                                 </div>
                               
                            </div>                            
                            </div>
                            
                                <div class="col-12">
                                    <div class="mobile-menu"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- offcanvas -->
            <div class="offcanvas-menu">
                <span class="menu-close"><i class="fas fa-times"></i></span>
              <form role="search" method="get" id="searchform"   class="searchform" action="3">
                                <input type="text" name="s" id="search" value="" placeholder="Search"  />
                                <button><i class="fa fa-search"></i></button>
                            </form>

                    <div id="cssmenu2" class="menu-one-page-menu-container">
                        <ul id="menu-one-page-menu-1" class="menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+8 12 3456897</span></a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@example.com</span></a></li>
                        </ul>
                    </div>                
            </div>
            <div class="offcanvas-overly"></div>
             <!-- offcanvas-end -->
        </header>