<?php 
   session_start(); 
   //Call db
   include '../config/db.php'; 
   include '../header.php';
   include '../sidebar.php';
   //Get id rquest for category
   $id = $_REQUEST['id'];
   //Get category detail
   $query = "SELECT * FROM categories WHERE id='$id'";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $row = mysqli_fetch_assoc($result);
?>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <?php if (isset($_SESSION['SUCCESS_MSG'])): ?>
            <div class="alert alert-success alert-dismissible fade show" id="successMessage" role="alert">
               <?= $_SESSION['SUCCESS_MSG']; ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <?php unset($_SESSION['SUCCESS_MSG']); ?>
            <?php elseif (isset($_SESSION['ERROR_MSG'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <?= $_SESSION['ERROR_MSG']; ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <?php unset($_SESSION['ERROR_MSG']); ?>
            <?php endif; ?>
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Edit Category</h3>
               </div>
               <div class="card-body">
                  <form action="update-category" method="POST" enctype="multipart/form-data">
                     <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Name">
                     </div>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status">
                           <option value="" disabled>Select Status</option>
                           <option value="Active" <?php echo ($row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                           <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit" name="submit">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div
<?php include '../footer.php'; ?>