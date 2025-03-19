<?php 
   session_start(); 
   include '../header.php';
   include '../sidebar.php';
   include '../config/db.php';
   //Get category id 
   $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
   //Get gallery details if category id exists
   $gallery = null;
   if (!empty($category_id)) {
      $query = "SELECT c.id AS category_id, c.name AS category_name, 
               GROUP_CONCAT(ia.images) AS images, 
               ia.status 
         FROM images_attachments ia
         INNER JOIN categories c ON ia.category_id = c.id 
         WHERE c.id = $category_id
         GROUP BY c.id";
      //Call connection
      $result = mysqli_query($conn, $query);
      $gallery = mysqli_fetch_assoc($result);
   }
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
         <?php
            if (isset($_SESSION['SUCCESS_MSG'])) {
               echo '<div class="success-msg">' . $_SESSION['SUCCESS_MSG'] . '</div>';
               unset($_SESSION['SUCCESS_MSG']);
               echo '<script>setTimeout(function(){ location.reload(); }, 1000);</script>';
            } elseif (isset($_SESSION['ERROR_MSG'])) {
               echo '<div class="error-msg">' . $_SESSION['ERROR_MSG'] . '</div>';
               unset($_SESSION['ERROR_MSG']);
               echo '<script>setTimeout(function(){ location.reload(); }, 1000);</script>';
            }
            ?>
         <div class="col-md-12">
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Edit Gallery</h3>
               </div>
               <div class="card-body">
                  <form action="update-gallery.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                     <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="custom-select" name="category_id" required>
                           <option value="" disabled>Select Category</option>
                           <?php
                              $sql_query = "SELECT * FROM categories ORDER BY id DESC;";
                              $result = mysqli_query($conn, $sql_query);
                              while ($row = mysqli_fetch_assoc($result)) {
                                 $selected = ($row['id'] == $category_id) ? "selected" : "";
                                 echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                              }
                              ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="images">Choose Multiple Images</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="choosefile[]" id="images" multiple onchange="previewImages(event)">
                              <label class="custom-file-label" for="images">Choose files</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     <?php if (!empty($gallery["images"])): ?>
                     <div id="imagePreviewContainer" style="margin-top: 20px;">
                        <?php 
                           $images = explode(",", $gallery["images"]);
                           foreach ($images as $image) { ?>
                        <img src="../uploads/galleries/<?php echo $image; ?>" width="100" height="100" style="margin: 5px; border: 1px solid #ddd; padding: 5px;">
                        <?php } 
                           ?>
                     </div>
                     <?php endif; ?>
                     <br>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status">
                           <option value="" disabled>Select Status</option>
                           <option value="Active" <?php echo ($gallery["status"] == "Active") ? "selected" : ""; ?>>Active</option>
                           <option value="Pending" <?php echo ($gallery["status"] == "Pending") ? "selected" : ""; ?>>Pending</option>
                           <option value="Suspend" <?php echo ($gallery["status"] == "Suspend") ? "selected" : ""; ?>>Suspend</option>
                           <option value="Approved" <?php echo ($gallery["status"] == "Approved") ? "selected" : ""; ?>>Approved</option>
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
</div>
<?php include '../footer.php'; ?>