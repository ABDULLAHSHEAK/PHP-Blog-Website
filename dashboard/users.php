 <?php
  include 'header.php';
  include 'edit_users.php';
  if ($admin != 1) {
    echo "<script>window.location.href='http://localhost/blog/dashboard/index.php'</script>";
  }

  // pagination start --------------
  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }
  $limit = 5;
  $offset = ($page - 1) * $limit;
  // pagination end ----------------

  $users_select = "SELECT * FROM users limit $offset,$limit";
  $users_Query = mysqli_query($con, $users_select);
  ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
   <div class="col-6">
     <!-- <?= $update_alert; ?> -->
     <!-- <?= $delete_allert; ?> -->
     <?= $user_update_alert; ?>
     <?= $delete_alert; ?>
     <?php
      if (isset($_SESSION['user_add'])) {
        echo $_SESSION['user_add'];
      };
      ?>
   </div>
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">All Users</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
     <div class="card-header py-3 d-flex justify-content-between">
       <div>
         <a href="add_users.php">
           <h6 class="mt-2 btn btn-primary text-white">Add New Users</h6>
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
               <th>Full Name</th>
               <th>User Name</th>
               <th>User Email</th>
               <th>User Role</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
              while ($user_data = mysqli_fetch_assoc($users_Query)) {
                $full_name = $user_data['fullname'];
                $username = $user_data['username'];
                $email = $user_data['email'];
                $user_id = $user_data['user_id'];
                $user_role = $user_data['role'];
              ?>
               <tr>
                 <td><?= ++$offset ?></td>
                 <td><?= $full_name ?></td>
                 <td><?= $username ?></td>
                 <td><?= $email ?></td>
                 <td><?= $user_role == 1 ? 'Admin' : 'Editor' ?></td>
                 <td>

                   <!-- ************** Edit Button Modal Start ************ -->

                   <!-- Button trigger modal -->
                   <div class="btn-group" role="group">

                     <button style="font-size: 25px;" type="button" class="btn p-0 me-2 " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $user_id ?>">
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal<?= $user_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Name</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                             <div id="" class="">
                               <div class="col-10 mx-auto">
                                 <form action="" method="POST" class="text-left">
                                   Full Name : <br>
                                   <input type="text" name="full_name" required class="form-control" value="<?= $full_name ?> "> <br>
                                   User Name : <br>
                                   <input type="text" name="edit_name" required class="form-control" value="<?= $username ?> "> <br>
                                   User Email : <br />
                                   <input type="email" name="edit_mail" required class="form-control" value="<?= $email ?> "> <br>
                                   User Role : <br />
                                   <select name="edit_role" class="form-control">
                                     <option value="">Select Role</option>
                                     <option value="1">Admin</option>
                                     <option value="0">Editor</option>
                                   </select>
                                   <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <input type="submit" name="user_edit" class="btn btn-primary" value="Save Changes">
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>

                     <!-- ************** Delete Button Modal Start ************ -->
                     <form action="" class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete ?')">
                       <input type="hidden" name="delet_id" value="<?php echo $user_id ?> ">
                       <input type="submit" name="user_delete" value="Delete" class="btn btn-danger btn-sm">
                     </form>
                   </div>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <!-- // pagination code start  -->
         <?php
          $pagination = "SELECT * FROM users";
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
                 <a href="users.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
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