 <?php
  include 'header.php';
  include 'delete_post.php';

  // =====================================
  // Delte comment 
  if (isset($_POST['delete_cmt'])) {
    $d_id = $_POST['delete_id'];
    $queryD = "DELETE FROM comments WHERE id = '$d_id'";
    $resultD = mysqli_query($con, $queryD);
    if ($resultD) {
      echo "<script>window.location.href='comments.php'</script>";
      $cmt_alert =  "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
      <strong>Post</strong> Edit succesfully !
      <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
     $_SESSION['cmt_alert'] = $cmt_alert;
    }
  }
  // =====================================
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
   <!-- DataTales Example -->
   <?php
   if (isset($_SESSION['cmt_alert'])) {
    echo $_SESSION['cmt_alert'];
     unset($_SESSION['cmt_alert']);
   }
    ?>
   <div class="card shadow">
     <div class="card-header py-3 d-flex justify-content-between">
       <div>
         <h4 class="mt-2">Total Comments</h4>
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
               <th>User Name</th>
               <th>User Email</th>
               <th>Comments</th>
               <th>Post Name</th>
               <th>Date</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
              $sql = "SELECT c.name ,c.id ,c.email,c.comment,c.created_at ,p.post_title,p.post_id FROM comments c LEFT JOIN post p ON c.post_id = p.post_id ORDER BY c.created_at DESC limit $offset,$limit";

              $query = mysqli_query($con, $sql);
              $rows = mysqli_num_rows($query);

              if ($rows) {
                while ($all_data = mysqli_fetch_assoc($query)) {
              ?>
                 <tr>
                   <td><?= ++$offset ?></td>
                   <td><?= $all_data['name'] ?></td>
                   <td><?= $all_data['email'] ?></td>
                   <td><?= substr($all_data['comment'], 0, 20) . "..." ?></td>
                   <td><?= substr($all_data['post_title'], 0, 10) . "..." ?></td>
                   <td><?= date('d-m-Y', strtotime($all_data['created_at'])) ?></td>
                   <td>
                     <!-- ------- edit button -------  -->
                        <div class="btn-group" role="group"> 
                       <!-- <a href="edit_post.php?post_edit=<?php echo $id ?>" class="btn btn-primary btn-sm" id="edit_btn" style="margin: 8px 5px 0 0 !important;
                                    border-radius: 3px 5px 5px 5px !important;">Edit</a> -->

                     <!-- ------------------------------------------------------------------  
                                  delete button  ----------------  -->

                     <form action="" class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete ?')">
                       <input type="hidden" name="delete_id" value="<?= $all_data['id'] ?> ">
                       <button type="submit" name="delete_cmt" value="Delete" class="btn btn-danger btn-sm">Delete</button>
                     </form>

                     <!-- // view button /////  / -->
                     <div class="view_btn">
                       <a href="http://localhost/blog/single.php?id=<?= $all_data['post_id'] ?>" class="btn btn-secondary btn-sm" style="margin: 8px 5px 0 5px !important;
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
    $pagination = "SELECT * FROM comments ";
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
           <a href="comments.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
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