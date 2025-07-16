
</div>
 <!-- <div class="content container-fluid">
    <footer class="footer">
        © <?php echo date('Y');?>  <a href="#">{{ config('app.name') }}.</a>.</strong> All rights
      reserved.
    </footer>
  </div>-->

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