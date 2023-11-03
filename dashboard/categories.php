 <?php
  include 'header.php';
  include 'edit_category.php';
  if ($admin != 1) {
    echo "<script>window.location.href='http://localhost/blog/dashboard/index.php'</script>";
  }

  // pagination start -------------------
  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }
  $limit = 5;
  $offset = ($page - 1) * $limit;
  // pagination end --------------------

  $cat_select = "SELECT * FROM category limit $offset,$limit";
  $cat_Query = mysqli_query($con, $cat_select);
  ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
   <div class="col-6">
     <?= $update_alert; ?>
     <?= $delete_allert; ?>
   </div>
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Categories</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
     <div class="card-header py-3 d-flex justify-content-between">
       <div>
         <a href="add_categories.php">
           <h6 class="mt-2 btn btn-primary text-white">Add New Categories</h6>
         </a>
       </div>
       <div>
         <form class="navbar-search">
           <div class="input-group">
             <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
             <div class="input-group-append">
               <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
             </div>
           </div>
         </form>
       </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-bordered table-striped table-primary p-0" id="dataTable">
           <thead>
             <tr>
               <th>Sr.No</th>
               <th>Category Name</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
              while ($cat_data = mysqli_fetch_assoc($cat_Query)) {
                $cat_name = $cat_data['cat_name'];
                $cat_id = $cat_data['cat_id'];
              ?>
               <tr>
                 <td><?= ++$offset ?></td>
                 <td><?= $cat_name ?></td>
                 <td>

                   <!-- ************** Edit Button Modal Start ************ -->

                   <!-- Button trigger modal -->
                   <div class="btn-group" role="group">

                     <button style="font-size: 25px;" type="button" class="btn p-0 me-2 " data-bs-toggle="modal" data-bs-target="#exampleModal<?php $cat_id ?>">
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal<?php $cat_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category Name</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                             <div id="" class="">
                               <div class="col-10 mx-auto">
                                 <form action="" method="POST" class="text-left">
                                   Category Name : <br>
                                   <input type="text" name="Up_category" required class="form-control" value="<?php echo $cat_name ?> "> <br>
                                   <input type="text" name="up_date" value="<?php echo $cat_id ?>" hidden>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <a href="categories.php?editId=<?php echo $cat_id ?>">
                               <input type="submit" name="edit" class="btn btn-primary" value="Save Changes">
                               </form>
                           </div>
                         </div>
                       </div>
                     </div>

                     <!-- ************** Delete Button Modal Start ************ -->
                     <form action="" class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete ?')">
                       <input type="hidden" name="id" value="<?php echo $cat_id ?> ">
                       <input type="submit" name="delete_cat" value="Delete" class="btn btn-danger btn-sm">
                     </form>
                   </div>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <!-- // pagination code start  -->
         <?php
          $pagination = "SELECT * FROM category";
          $p_query = mysqli_query($con, $pagination);
          $count_post = mysqli_num_rows($p_query);
          $total_pages = ceil($count_post / $limit);
          if ($count_post > $limit) {
          ?>
           <ul class="pagination pt-5 pb-5">
             <?php
              for ($i = 1; $i <= $total_pages; $i++) {
              ?>
               <li class="page-item <?= ($i == $page) ? $active = 'active' : ''; ?>">
                 <a href="categories.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
               </li>
             <?php } ?>
           </ul>
         <?php } ?>
         <!-- -------------------------------  -->
       </div>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <?php include 'footer.php' ?>