<?php 
   session_start(); 
   include '../header.php';
   include '../sidebar.php';
   include '../config/db.php';
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
                  <h3 class="card-title">Add New Gallery</h3>
               </div>
               <div class="card-body">
                  <form action="submit-gallery" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="custom-select" name="category_id" required>
                           <option value="" disabled selected>Select Category</option>
                           <?php
                              //Get categories 
                              $sql_query = "SELECT * FROM categories ORDER BY id DESC;";
                              $result = mysqli_query($conn, $sql_query);
                              while ($row = mysqli_fetch_assoc($result)) {
                                 echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                              }
                           ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="images">Choose files</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="choosefile[]" id="images" multiple onchange="previewImages(event)" required>
                              <label class="custom-file-label" for="images">Choose files</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     <div id="imagePreviewContainer" style="margin-top: 20px;">
                        <img id="imagePreview" src="" alt="Selected Image" style="display: none; max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;"/>
                     </div>
                     <br>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                           <option value="" disabled selected>Select Status</option>
                           <option value="Active">Active</option>
                           <option value="Pending">Pending</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit" name="submit">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include '../footer.php'; ?>