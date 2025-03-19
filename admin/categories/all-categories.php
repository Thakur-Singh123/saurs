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
               <h2 class="mb-3">All Categories</h2>
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
                     <table id="categories" class="display">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $count = 1;
                              //Get categories details
                              $sql_query = "SELECT * FROM categories ORDER BY id DESC;";
                              $result = mysqli_query($conn, $sql_query);
                              $categories = mysqli_fetch_all($result, MYSQLI_ASSOC); 
                              //Get category row data
                              foreach ($categories as $row) { ?>
                           <tr>
                              <td><?php echo $count++; ?>.</td>
                              <td><?php echo $row["name"]; ?></td>
                              <td class="
                                 <?php 
                                    if ($row["status"] == 'Active') echo 'lights-green-color';
                                    elseif ($row["status"] == 'Pending') echo 'lights-red-color';
                                    elseif ($row["status"] == 'Suspend') echo 'lights-yellow-color';
                                 ?>">
                                 <span><?php echo $row["status"]; ?></span>
                              </td>
                              <td class="project-actions text-left">
                                 <a class="btn btn-info btn-sm" href="edit-category.php?id=<?php echo $row['id']; ?>">
                                 <i class="fas fa-pencil-alt"></i>
                                 </a>
                                 <button class="btn btn-danger btn-sm delete-category" data-id="<?php echo $row['id']; ?>">
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