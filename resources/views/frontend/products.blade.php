<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
@include('frontend.layouts.header')
@section('title','NUMBUS || HOME PAGE')
@section('main-content')
        <!-- main-area -->
        <main>
            
      <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center p-relative fix" style="background-image:url(img/bg/bdrc-bg.jpg)">
                 <div class="slider-circal"></div>
                  <div class="slider-circal-2"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Product</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product </li>
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

			<!-- service-details-area -->
            <div class="about-area5 about-p p-relative">
                <div class="container pt-120 pb-90">
                    <div class="row">
                         <!-- #right side -->
                    <div class="col-sm-12 col-md-12 col-lg-4 order-1">
                        <aside class="sidebar services-sidebar">
                        
                        <!-- Category Widget -->
                        <div class="sidebar-widget categories">
                            <div class="widget-content">
                                <h2 class="widget-title"> Our Product </h2>
                                <!-- Services Category -->
                                <nav class="nav" role="navigation">
                                    <ul class="nav__list">
                                    
                                    @php 
                                      $category_lists=DB::table('nimbus_categories')->where('status',1)->get()->toArray();;
                                    @endphp
                                    @if($category_lists)
                                        @foreach($category_lists as $cat)
                                            @php 
                                                $sub_category_lists=DB::table('nimbus_sub_categories')->where('category_id',$cat->id)->where('status',1)->get()->toArray();;
                                            @endphp
                                            @if($sub_category_lists)
                                            
                                                <li>
                                                    <input id="group-{{$cat->id}}" type="checkbox" hidden />
                                                    <label for="group-{{$cat->id}}"><span class="fa fa-angle-right"></span>{{$cat->category_name}}</label>
                                                
                                                    <ul class="group-list">
                                                    
                                                        @foreach($sub_category_lists as $sub_cat)
                                                    
                                                        <li>
                                                            @php 
                                                                $child_category_lists=DB::table('nimbus_child_categories')->where('category_id',$cat->id)->where('sub_category_id',$sub_cat->id)->where('status',1)->get()->toArray();
                                        
                                                            @endphp
                                                            @if($child_category_lists)

                                                            <input id="sub-group-{{$sub_cat->id}}" type="checkbox" hidden />
                                                            <label for="sub-group-{{$sub_cat->id}}"><span class="fa fa-angle-right"></span> {{$sub_cat->sub_category_name}}</label>
                                                                <ul class="sub-group-list">
                                                                    @foreach($child_category_lists as $child_cat)
                                                                    
                                                                        <li><a href="{{route('product-category',[$cat->slug,$sub_cat->slug,$child_cat->slug])}}">{{$child_cat->child_category_name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <li><a href="{{route('product-category',[$cat->slug,$sub_cat->slug])}}">{{$sub_cat->sub_category_name}}</a></li> 
                                                            @endif    
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else

                                                <li><a href="{{route('product-category',[$cat->slug])}}">{{$cat->category_name}}</a></li>
                                            @endif
                                            <!-- /End Single Banner  -->
                                        @endforeach
                                    @endif
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--Service Contact-->
                        <div class="service-detail-contact wow fadeup-animation" data-wow-delay="1.1s">
                            <h3 class="h3-title">If You Need Any Help Contact With Us</h3>
                            <a href="javascript:void(0);" title="Call now">+91 98193 91323</a>
                        </div>
                        
                          
                    </aside>
                </div>
                        <!-- #right side end -->
                       
					<div class="col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="row align-items-center">
                            @foreach($products as $product)        
                                <div class="col-lg-4 col-md-6">
                                    <div class="product mb-40">
                                        <div class="product__img">
                                            @php 
                                                $nimbus_product_images=DB::table('nimbus_product_images')->where('status',1)->where('product_id',$product->id)->orderBy('id','ASC')->limit(1)->get()->first();            
                                            @endphp
                                            <a href="{{route('product-details',$product->slug)}}"><img src="{{asset('public/products/'.$nimbus_product_images->gallery)}}" alt=""></a>
                                            <div class="product-action text-center">
                                                <a href="{{route('product-details',$product->slug)}}">Product Details</a>
                                            </div>
                                        </div>
                                        <div class="product__content text-center pt-30">
                                            
                                            <h4 class="pro-title"><a href="{{route('product-details',$product->slug)}}">{{$product->product_name}}</a></h4>
                                                
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach    
                        </div>
                    </div>
            </div>
            <!-- service-details-area-end -->
            
			
					
    
        </main>
        <!-- main-area-end -->
        <!-- main-area-end -->
        @include('frontend.layouts.footer')
</body>
</html>     
