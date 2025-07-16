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
              <section class="breadcrumb-area d-flex align-items-center p-relative fix" style="background-image:url({{asset('public/frontend/img/bg/bdrc-bg.jpg')}})">
                  <div class="slider-circal"></div>
                   <div class="slider-circal-2"></div>
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-xl-12 col-lg-12">
                             <div class="breadcrumb-wrap text-left">
                                 <div class="breadcrumb-title">
                                     <h2>{{$products_details->product_name}} </h2>    
                                     <div class="breadcrumb-wrap">
                               
                                 <nav aria-label="breadcrumb">
                                     <ol class="breadcrumb">
                                         <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                         
                                         <li class="breadcrumb-item active" aria-current="page">{{$products_details->product_name}} </li>
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
             
             <!-- shop-banner-area start -->
         <section class="shop-banner-area pt-40 pb-90 " data-animation="fadeInUp animated" data-delay=".2s">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-6">
                         <div class="shop-thumb-tab mb-30">
                             <ul class="nav" id="myTab2" role="tablist">
                                @php 
                                    $nimbus_product_images=DB::table('nimbus_product_images')->where('status',1)->where('product_id',$products_details->id)->orderBy('id','ASC')->limit(3)->get();            
                                 
                                @endphp
                                
                                @foreach($nimbus_product_images as $nimbus_product_image_key => $nimbus_product_image_value)
                                 
                                <?php  $nimbus_product_image_key = $nimbus_product_image_key + 1; ?> 
                                
                                 <li class="nav-item">
                                     <a class="nav-link" id="image-tab" data-bs-toggle="tab" href="#tab{{ $nimbus_product_image_key}}" role="tab"
                                         aria-selected="true"><img src="{{asset('public/products/thumbnail/'.$nimbus_product_image_value->thumbnail_image)}}" alt=""> </a>
                                </li>

                                @endforeach
                             </ul>
                         </div>
                         <div class="product-details-img mb-30">
                             <div class="tab-content" id="myTabContent2">

                                @php 
                                    $nimbus_product_images=DB::table('nimbus_product_images')->where('status',1)->where('product_id',$products_details->id)->orderBy('id','ASC')->limit(3)->get();            
                                @endphp

                                @foreach($nimbus_product_images as $nimbus_product_image_key => $nimbus_product_image_value)


                                <?php   $nimbus_product_image_key = $nimbus_product_image_key + 1; ?> 
                                 
                                 <div class="tab-pane fade <?php if($nimbus_product_image_key == 1){ echo 'show active';}else{ echo '';} ?>" id="tab{{ $nimbus_product_image_key}}" role="tabpanel">
                                     <div class="product-large-img">
                                         <img src="{{asset('public/products/'.$nimbus_product_image_value->gallery)}}" alt="">
                                     </div>
                                 </div>
                            
                                 @endforeach

                             </div>
                         </div>
                     </div>
                     <div class="col-xl-6" style="padding-left:25px;">
                         <div class="product-details mb-30">
                             <div class="product-details-title">
                                
                                 <p>{{$products_details->category_name}}</p>
                                 <h1>{{$products_details->product_name}} </h1>
                                 
                             </div>
                             
                             <p>
                              
                              <?php echo $products_details->features ?>
 
                             </p>
                                                     
                             <div class="product-details-action">
                                 
                                     
                                <button class="btn btn-black" onclick="window.open('{{asset('public/product_pdf/'.$products_details->product_pdf)}}', '_blank');" type="submit">DOWNLOAD PRODUCT SPECIFICATION</button>                                   
                                
                             </div>
                           
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->introduction != ''){

                            echo '<h1 class="productheading"> Introduction </h1>';
                            echo $products_details->introduction; 
                        }
                    ?>
                </div>

                <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->application != ''){

                            echo '<h1 class="productheading"> Application </h1>';
                            echo $products_details->application; 
                        }
                    ?>
                </div>

               <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->specifications != ''){

                            echo '<h1 class="productheading"> Specifications </h1>';
                            echo $products_details->specifications; 
                        }
                    ?>
                </div>
               <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->accessories != ''){

                            echo '<h1 class="productheading"> Accessories </h1>';
                            echo $products_details->accessories; 
                        }
                    ?>
                </div>

                <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->related_products != ''){

                            echo '<h1 class="productheading"> Related Products </h1>';
                            echo strip_tags($products_details->related_products,"<img>"); 
                        }
                    ?>
                </div>

                <div class="col-xl-12 roundbox">
                    <?php 
                        if($products_details->description != ''){

                            echo '<h1 class="productheading"> Description </h1>';
                            echo strip_tags($products_details->description,"<img>"); 
                        }
                    ?>
                </div>
             </div>
         </section>
         <!-- shop-banner-area end -->
        
         
         </main>
         <!-- main-area-end -->       
        @include('frontend.layouts.footer')
</body>
</html>   

