@extends('admin.layouts.master')

@section('main-content')

<div class="page-wrapper">
      <div class="content container-fluid">
       <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
              <h3 class="page-title">
                  <a href="{{route('child-category.index')}}" style="margin-right: 10px;"><i class="fa fa-arrow-left" data-bs-toggle="tooltip" title="" data-bs-original-title="Back" aria-label="fa fa-arrow-left"></i></a>
                  Add Child Category
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
              <form name="add_child_category" id="add_child_category" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row" data-select2-id="6">
                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label for="client_id">Category Name <span class="text-danger">*</span></label>
                      <select name="category_name" id="category_name" class="form-select">
                          <option value="">--Select Category--</option>
                          @foreach($category as $key=>$category_data)
                              <option value='{{$category_data->id}}'>{{$category_data->category_name}}</option>
                          @endforeach
                      </select>
                      <span id = "error_category_name" class="text-danger"></span>
                    </div>
                    <div class="col-sm-4 col-xs-4 col-lg-4  form-group">
                      <label for="client_id">Sub Category Name <span class="text-danger">*</span></label>
                      <select name="sub_category_name" id="sub_category_name" class="form-select">
                          
                      </select>
                      <span id = "error_sub_category_name" class="text-danger"></span>
                    </div>
                    <div class="col-sm-4 col-xs-4 col-lg-4 form-group">
                      <label>Child Category Name <span class="error"> *</span></label>
                      <input type="text" name="child_category_name" id="child_category_name" value="" class="form-control">
                      <span id = "error_child_category_name" class="text-danger"></span>
                    </div>
                  </div>
                  <br>
                  <div class="box-body">
                    <div class="col-md-6 col-sm-12">

                        <button type="submit" id="btn_add_child_category" name="btn_add_child_category" class="btn btn-primary">Submit</button>

                    <!-- <button type="submit" id="send_form" class="btn btn-success">Submit</button>-->
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



@endsection

<script src="{{asset('public/backend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.validate.min.js')}}"></script>

<script>
$(document).ready(function() {

$("#add_child_category").validate({
    rules: {
      category_name: {
        required: true
      },
      sub_category_name: {
        required: true
      },
      child_category_name: {
        required: true
      }
    },
    messages: {
      category_name: {
         required: "Please Enter Category Name"
      },
      sub_category_name: {
         required: "Please Enter Sub Category Name"
      },
      child_category_name: {
        required: "Please Enter Child Category Name"
      }

    },
    submitHandler: function(form) {
    
      $.ajax({

        url: '<?php echo ADMIN_SITE_URL . 'create-child-category'; ?>',
        type: "POST",
        data:  new FormData(form),
        contentType:false,
        cache: false,
        processData:false,
        dataType:'json',
        beforeSend:function(){
          $('#btn_add_child_category').attr('disabled','disabled');
          $('#btn_add_child_category').html('Please Wait...');
        },
        complete:function(){
          $('#btn_add_child_category').attr('disabled',false);
          $('#btn_add_child_category').html('Submit');
        },
        success: function(jdata) {
          var message = jdata.message || '';
            if (jdata.status == '<?php echo SUCCESS_CODE; ?>') {
              $("#successMessage").show();
              $("#successMessage").html(message);
              $('#add_child_category')[0].reset();  
                setTimeout(function () {
                  window.location.href= jdata.redirect;
                }, 2000);
                return;
              }
              if (jdata.status == <?php echo ERROR_CODE; ?>) {
                $("#errorMessage").show();
                $("#error_category_name").html(message.category_name);
                $("#error_sub_category_name").html(message.sub_category_name);
                $("#error_child_category_name").html(message.child_category_name);

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
</script>