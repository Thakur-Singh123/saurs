<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Call config file
include 'config.php'; 
//Check if user exists or not
if (!isset($_SESSION['login_user'])) {
   header('Location: ' . BASE_URL . 'auth/login.php');
   exit(); 
}
?>
<footer class="main-footer">
   <!-- <strong>Copyright &copy; 2014-2025 <a href="https://pixxelu.com/">Pixxelu</a>.</strong>
   All rights reserved. -->
   <div class="float-right d-none d-sm-inline-block">
   </div>
</footer>
<aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url; ?>/assets/dist/js/custom-ajax.js"></script>
<script src="<?php echo base_url; ?>/assets/dist/js/custom-script.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
   $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/sparklines/sparkline.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url; ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url; ?>/assets/dist/js/adminlte.js"></script>
<script src="<?php echo base_url; ?>/assets/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   $(document).ready(function() {
      $('#categories, #galleries').DataTable();
   });
</script>

<script>
   //Auto-hide success message after 3 seconds
   $(document).ready(function(){
      setTimeout(function(){
         $("#successMessage").fadeOut("slow");
      }, 3000);
   });
</script>
</body>
</html>