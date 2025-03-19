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
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Saurs Dashboard</title>
      <?php define('base_url', 'https://pixxeluclients.com/php-dev/saurs/admin'); ?>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/jqvmap/jqvmap.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/dist/css/adminlte.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/summernote/summernote-bs4.min.css">
      <link rel="stylesheet" href="<?php echo base_url; ?>/assets/dist/css/style.css">
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="<?php echo base_url; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
      </nav>