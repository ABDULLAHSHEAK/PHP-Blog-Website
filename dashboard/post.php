 <?php
   include 'header.php';
   include 'delete_post.php';

   // pagination start 
   if (!isset($_GET['page'])) {
      $page = 1;
   } else {
      $page = $_GET['page'];
   }
   $limit = 8;
   $offset = ($page - 1) * $limit;

   // pagination end ------------

   if (isset($_SESSION['user_data'])) {
      $user_id = $_SESSION['user_data']['0'];
   }
   ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <?php
      if (isset($_SESSION['update_alert'])) {
         // echo $_SESSION["update_alert"];
      }
      ?>
    <!-- Page Heading -->
    <h5 class="mb-2 text-gray-800">Blog Posts</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
       <div class="card-header py-3 d-flex justify-content-between">
          <div>
             <a href="add_new_post.php">
                <h6 class="btn btn-primary text-white mt-2">Add New</h6>
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
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                      <th>Sr.No</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Author</th>
                      <th>Date</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                   <?php
                     $sql = "SELECT * FROM post LEFT JOIN category ON post.category = category.cat_id LEFT JOIN users ON post.auth_id = users.user_id WHERE user_id = '$user_id' ORDER BY post.publish_date DESC limit $offset,$limit";
                     $query = mysqli_query($con, $sql);
                     $rows = mysqli_num_rows($query);

                     if ($rows) {
                        while ($all_data = mysqli_fetch_assoc($query)) {
                           $id = $all_data["post_id"];
                     ?>
                         <tr>
                            <td><?= ++$offset ?></td>
                            <td><?= $all_data['post_title'] ?></td>
                            <td><?= $all_data['category'] ?></td>
                            <td><?= $all_data['username'] ?></td>
                            <td><?= date('d-m-Y', strtotime($all_data['publish_date'])) ?></td>
                            <td>
                               <!-- ------- edit button -------  -->
                               <div class="btn-group" role="group">
                                  <a href="edit_post.php?post_edit=<?php echo $id ?>" class="btn btn-primary btn-sm" id="edit_btn" style="margin: 8px 5px 0 0 !important;
                                    border-radius: 3px 5px 5px 5px !important;">Edit</a>

                                  <!-- ------------------------------------------------------------------  
                                  delete button  ----------------  -->

                                  <form action="" class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete ?')" enctype="multipart/form-data">
                                     <input type="hidden" name="delete_id" value="<?= $all_data['post_id'] ?> ">
                                     <input type="hidden" name="delete_img" value="<?= $all_data['post_img'] ?> ">
                                     <button type="submit" name="delete_post" value="Delete" class="btn btn-danger btn-sm">Delete</button>
                                  </form>

                                  <!-- // view button /////  / -->
                                  <div class="view_btn">
                                     <a href="http://localhost/blog/single.php?id=<?= $id ?>" class="btn btn-secondary btn-sm" style="margin: 8px 5px 0 5px !important;
                                    border-radius: 3px 5px 5px 5px !important;" target='black'>View</a>
                                  </div>
                               </div>
                            </td>
                         </tr>
                   <?php
                        }
                     } else {
                        echo "No Data Found";
                     }
                     ?>
                </tbody>
             </table>

             <!-- // pagination code start  -->
             <?php
               $pagination = "SELECT * FROM post WHERE auth_id = '$user_id' ";
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
                         <a href="post.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
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