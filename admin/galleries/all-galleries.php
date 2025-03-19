<?php 
   session_start(); 
   include '../config/db.php';
   include '../header.php';
   include '../sidebar.php';
   ?>
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Galleries</h2>
            </div>
         </div>
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
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <table id="galleries" class="display">
                        <thead>
                           <tr>
                              <th>Sr. No</th>
                              <th>Category Name</th>
                              <th>Galleries</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $count = 1;
                              //Get categories and images
                              $query = "SELECT c.id AS category_id, c.name AS category_name, 
                              GROUP_CONCAT(ia.images ORDER BY ia.id DESC SEPARATOR ',') AS images, 
                              ia.status 
                              FROM images_attachments ia
                              INNER JOIN categories c ON ia.category_id = c.id 
                              GROUP BY c.id 
                              ORDER BY c.id DESC";
                              //Call conn
                              $result = mysqli_query($conn, $query);
                              $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                              //Get categories
                              foreach ($categories as $row) { ?>
                           <tr>
                              <td><?php echo $count++; ?>.</td>
                              <td><?php echo $row["category_name"]; ?></td>
                              <td>
                                 <?php 
                                    if (!empty($row["images"])) { 
                                       $images = explode(",", $row["images"]); 
                                       foreach ($images as $image) { 
                                          //Get image attachments
                                          $image_query = "SELECT id FROM images_attachments WHERE images = '$image' LIMIT 1";
                                          $image_result = mysqli_query($conn, $image_query);
                                          $image_row = mysqli_fetch_assoc($image_result);
                                          $image_id = $image_row['id']; 
                                    ?>
                                 <div class="image-container">
                                    <img src="../uploads/galleries/<?php echo ($image); ?>">
                                    <span class="delete-image" data-image_id="<?php echo $image_id; ?>">
                                    ✖
                                    </span>
                                 </div>
                                 <?php } 
                                    } ?>
                              </td>
                              <td class="
                                 <?php 
                                    if ($row["status"] == 'Active') echo 'lights-green-color';
                                    elseif ($row["status"] == 'Pending') echo 'lights-red-color';
                                    elseif ($row["status"] == 'Suspend') echo 'lights-yellow-color';
                                    elseif ($row["status"] == 'Approved') echo 'lights-pink-color';
                                    ?>">
                                 <span><?php echo $row["status"] ?? 'N/A'; ?></span>
                              </td>
                              <td class="project-actions text-left">
                                 <button class="btn btn-danger btn-sm delete-gallery" data-id="<?php echo $row["category_id"]; ?>">
                                 <i class="fas fa-trash"></i>
                                 </button>
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include '../footer.php'; ?>