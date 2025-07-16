@extends('admin.layouts.master')

@section('main-content')

<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Sub Category List</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a> </li>
                                <li class="breadcrumb-item active">Category List</li>
                            </ul>
                        </div>
                        <div class="col-auto">
                          <a href="{{route('sub-category.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Category"><i class="fas fa-plus"></i> Add Sub Category</a>
                        </div>
                    </div>
                </div>

               <!-- <div class="row">
                    <div class="col-sm-4 col-xs-4 col-lg-4 form-group">
                    
                      <select name="filter_by_status" id = "filter_by_status" class="form-control">
                          <option value="">--Select Status--</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                      </select>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table id="tbl_datatable_sub_category" class="table table-stripped table-hover"  style="width: 100%;">
                                  
                                        <thead class="thead-light">
                                            <tr>
                                            <th>#</th>
                                            <th>Created On</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Status</th>
                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!-- DataTales Example -->
 
@endsection

@push('styles')
  <link href="{{asset('public/backend/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  
@endpush

@push('scripts')

  <!-- Page level plugins -->
  
  <script src="{{asset('public/backend/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/backend/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/backend/datatables/datatables.pipeline.js')}}"></script>


  <!-- Page level custom scripts -->
  <script src="{{asset('public/backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
    var oTable =   $('#tbl_datatable_sub_category').DataTable( {
        "serverSide": true,
        "processing": true,
        "ordering": true,
        bSortable: true,
        bRetrieve: true,
        scrollX: true,
        scrollCollapse: true,
        fixedColumns:   {
        leftColumns: 1,
        rightColumns: 1
        },
        "iDisplayLength": 25,
        "language": {
          "emptyTable": "No Record Found",
          "processing": "<img src='<?php echo SITE_URL.SITE_FOLDER.'public/backend/images/'; ?>ajax-loader.gif' style='width: 100px;'>"
        },
        "ajax": $.fn.dataTable.pipeline( {
            url: '<?php echo SITE_URL.SITE_FOLDER.'admin/sub-category-list-view'; ?>',
            pages: 1, // number of pages to cache
            async: true,
            method: 'GET',
            data: { '_token':function(){return  $("input[name=_token]").val() }, 'filter_by_status':function(){return $("#filter_by_status").val(); } }
        } ),
        order: [[ 1, 'asc' ]],
      
        "columns":[{'data' :'id'},{'data' :'created_on'},{"data":"category_name"},{"data":"sub_category_name"},{"data":"status"}]

        } );


      $('#tbl_datatable_sub_category tbody').on('dblclick', 'tr', function () { 
        var data = oTable.row( this ).data(); 
      
          window.location = data['encry_id'];
       
      });

    /*$('#filter_by_status').on('change', function(){

      var filter_by_status = $('#filter_by_status').val();
     

      var new_url = "<?php echo SITE_URL.'admin/project-list-view'; ?>?filter_by_status="+filter_by_status;
      oTable.ajax.url(new_url).load();
    });  

  
    $('#searchrecords').on('click', function() {
      var filter_by_status = $('#filter_by_status').val();
     
      var new_url = "<?php echo SITE_URL.'admin/project-list-view'; ?>?filter_by_status="+filter_by_status;
      oTable.ajax.url(new_url).load();
    
    });*/
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush