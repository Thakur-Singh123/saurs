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
<?php 
   //Get only the page name without query parameters
   $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
   ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="#" class="brand-link">
   <img src="<?php echo base_url; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Saurs Admin</span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--Categories-->
            <li class="nav-item <?php echo in_array($current_page, ['add-new-category', 'all-categories', 'edit-category']) ? 'menu-open' : ''; ?>">
               <a href="#" class="nav-link <?php echo in_array($current_page, ['add-new-category', 'all-categories', 'edit-category']) ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>
                     Categories
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url; ?>/categories/add-new-category" class="nav-link <?php echo ($current_page == 'add-new-category') ? 'active' : ''; ?>">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Category</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo base_url; ?>/categories/all-categories" class="nav-link <?php echo in_array($current_page, ['all-categories', 'edit-category']) ? 'active' : ''; ?>">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Categories</p>
                     </a>
                  </li>
               </ul>
            </li>
            <!-- Galleries -->
            <li class="nav-item <?php echo in_array($current_page, ['add-new-gallery', 'all-galleries']) ? 'menu-open' : ''; ?>">
               <a href="#" class="nav-link <?php echo in_array($current_page, ['add-new-gallery', 'all-galleries']) ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-photo-video"></i>
                  <p>
                     Galleries
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url; ?>/galleries/add-new-gallery" class="nav-link <?php echo ($current_page == 'add-new-gallery.php') ? 'active' : ''; ?>">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Gallery</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo base_url; ?>/galleries/all-galleries" class="nav-link <?php echo ($current_page == 'all-galleries') ? 'active' : ''; ?>">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Galleries</p>
                     </a>
                  </li>
               </ul>
            </li>
            <!-- Logout -->
            <li class="nav-item">
               <a href="<?= BASE_URL ?>auth/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>

         </ul>
      </nav>
   </div>
</aside>