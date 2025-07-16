<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

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
  <!-- End of Topbar -->

<div class="page-wrapper">
      <div class="content container-fluid">
       <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
              <h3 class="page-title">
                  <a href="{{route('product.index')}}" style="margin-right: 10px;"><i class="fa fa-arrow-left" data-bs-toggle="tooltip" title="" data-bs-original-title="Back" aria-label="fa fa-arrow-left"></i></a>
                  Add Product
               </h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="estimates.html">Estimate</a></li>
                  <li class="breadcrumb-item active">Add Estimate</li>
               </ul>
            </div>
         </div>
      </div>
    <div class="row">
      <div class="col-md-12">
         <div class="card" data-select2-id="9">
            <div class="card-body" data-select2-id="8">
              <form name="add_product" id="add_product" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row" data-select2-id="6">
                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label>Product Name <span class="error"> *</span></label>
                      <input type="text" name="product_name" id="product_name" value="" class="form-control">
                      <span id = "error_product_name" class="text-danger"></span>

                    </div>

                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label for="category_name">Category Name <span class="text-danger">*</span></label>
                      <select name="category_name" id="category_name" class="form-select">
                          <option value="">--Select Category--</option>
                          @foreach($category as $key=>$category_data)
                              <option value='{{$category_data->id}}'>{{$category_data->category_name}}</option>
                          @endforeach
                      </select>
                      <span id = "error_category_name" class="text-danger"></span>
                    </div>

                    
                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label for="sub_category">Sub Category Name <span class="text-danger">*</span></label>
                      <select name="sub_category_name" id="sub_category_name" class="form-select">
                      </select>
                      <span id = "error_sub_category_name" class="text-danger"></span>
                    </div>

                    
                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label for="child_category_name">Child Category Name <span class="text-danger">*</span></label>
                      <select name="child_category_name" id="child_category_name" class="form-select">
                      </select>
                      <span id = "error_child_category_name" class="text-danger"></span>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 form-group">
                      <label>Price <span class="error"> *</span></label>
                      <input type="text" name="price" id="price" value="" class="form-control">
                      <span id = "error_price" class="text-danger"></span>
                    </div>
                
 
                    <div class="col-sm-4 col-md-4 col-lg-4 form-group">
                      <label>Discount </label>
                      <input type="text" name="discount" id="discount" value="" class="form-control">
                      <span id = "error_discount" class="text-danger"></span>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 form-group">
                      <label>Weight </label>
                      <input type="text" name="weight" id="weight" value="" class="form-control">
                      <span id = "error_weight" class="text-danger"></span>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 form-group">
                      <label>Stock</label>
                        <input type="text" name="stock" id="stock" value="" class="form-control">
                        <span id = "error_stock" class="text-danger"></span>
                    </div> 
                  </div>

                  <div class="row">
                   
                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                           <label>Product Image Gallery</label>
                           <div>
                              <input type="file" name="gallery[]" accept=".png, .jpg, .jpeg" multiple="multiple" id="gallery" value="" class="form-control">
                              <span id = "error_gallery" class="text-danger"></span>

                           </div>
                        </div>
                     </div>

                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                           <label>Product PDF</label>
                           <div>
                              <input type="file" name="product_pdf" accept=".pdf" id="product_pdf" value="" class="form-control">
                              <span id = "error_product_pdf" class="text-danger"></span>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Introduction</label>
                        <div>
                           <textarea class="form-control" name="introduction" id="introduction" rows="3"></textarea>
                           <span id = "error_introduction" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Applications</label>
                        <div>
                           <textarea class="form-control" name="applications" id="applications" rows="3"></textarea>
                           <span id = "error_applications" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Features</label>
                        <div>
                           <textarea class="form-control" name="features" id="features" rows="3"></textarea>
                           <span id = "error_features" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Specifications</label>
                        <div>
                           <textarea class="form-control" name="specifications" id="specifications" rows="3"></textarea>
                           <span id = "error_specifications" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Accessories</label>
                        <div>
                           <textarea class="form-control" name="accessories" id="accessories" rows="3"></textarea>
                           <span id = "error_accessories" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Related Products</label>
                        <div>
                           <textarea class="form-control" name="related_products" id="related_products" rows="3"></textarea>
                           <span id = "error_related_products" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <label>Description</label>
                        <div>
                           <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                           <span id = "error_description" class="text-danger"></span>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="box-body">
                    <div class="col-md-6 col-sm-12">

                        <button type="submit" id="btn_add_product" name="btn_add_product" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                  </div>
                </form>
           
                <div id="successMessage" class="alert alert-success" style="display:none;">Record Successfully Insert</div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;">Something Went Wrong !!</div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>

    
<script src="{{asset('public/backend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.validate.min.js')}}"></script>

<script>
$(document).ready(function() {

  $('#add_product').validate({
    rules : {
      product_name: {
        required : true
      },
      category_name : {
        required : true      
      },
      price : {
        required : true
      }
    },
    messages: {

      product_name: {
        required : "Enter Product Name"
      },
      category_name : {
        required : "Select Category Name"
      },
      price : {
        email : "Enter Price"
      }
      
    },
    submitHandler: function(form) {
  
      $.ajax({

        url: '<?php echo ADMIN_SITE_URL . 'create-product'; ?>',
        type: "POST",
        data:  new FormData(form),
        contentType:false,
        cache: false,
        processData:false,
        dataType:'json',
        beforeSend:function(){
          $('#btn_add_product').attr('disabled','disabled');
          $('#btn_add_product').html('Please Wait...');
        },
        complete:function(){
          $('#btn_add_product').attr('disabled',false);
          $('#btn_add_product').html('Submit');
        },
        success: function(jdata) {
          var message = jdata.message || '';
            if (jdata.status == '<?php echo SUCCESS_CODE; ?>') {
              $("#successMessage").show();
              $("#successMessage").html(message);
              $('#add_product')[0].reset();  
                setTimeout(function () {
                  window.location.href= jdata.redirect;
                }, 2000);
                return;
              }
              if (jdata.status == <?php echo ERROR_CODE; ?>) {
                $("#errorMessage").show();
                $("#error_category_name").html(message.category_name);
                
              }
        } 
        
      });
    }
    })
})  

$(document).on('change', '#category_name', function(){
  
  var category_name = $(this).val();
  var token = $("input[name=_token]").val();
  if(category_name != 0)
  {
      $.ajax({
          type:'POST',
          url:'<?php echo ADMIN_SITE_URL . 'get_sub_category'; ?>',
          data:'category_name='+category_name+'&_token='+token,
          beforeSend :function(){
            jQuery('#sub_category_name').find("option:eq(0)").html("Please wait..");
          },
          success:function(html)
          {
            jQuery('#sub_category_name').html(html);
          }
      });
  }
});

$(document).on('change', '#sub_category_name', function(){
  var category_name = $('#category_name').val();
  var sub_category_name = $(this).val();
  var token = $("input[name=_token]").val();
  if(sub_category_name != 0)
  {
      $.ajax({
          type:'POST',
          url:'<?php echo ADMIN_SITE_URL . 'get_child_category'; ?>',
          data:'category_name='+category_name+'&sub_category_name='+sub_category_name+'&_token='+token,
          beforeSend :function(){
            jQuery('#child_category_name').find("option:eq(0)").html("Please wait..");
          },
          success:function(html)
          {
            jQuery('#child_category_name').html(html);
          }
      });
  }
});
</script>


<script src="https://cdn.tiny.cloud/1/7q7qpn3zyhh9yzkp8goq3bhvqc75tgfwmf45pjoefiv54bxl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector:'#introduction',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>


<script>
    tinymce.init({
        selector:'#applications',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>
<script>
    tinymce.init({
        selector:'#features',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>

<script>
    tinymce.init({
        selector:'#specifications',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>


<script>
    tinymce.init({
        selector:'#accessories',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>


<script>
    tinymce.init({
        selector:'#related_products',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>


<script>
    tinymce.init({
        selector:'#description',
        height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],
        
        convert_urls: false, // <---- here it's added.
        image_title : true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo ADMIN_SITE_URL . 'upload/post-image'; ?>');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },

        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | code | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        
    });
    
</script>
</body>
</html>


 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/js/feather.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/backend/js/script.js')}}"></script>


  @stack('scripts')

  <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>


