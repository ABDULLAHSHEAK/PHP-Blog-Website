 <?php
  include 'header.php';
  include 'edit_category.php';
  if ($admin != 1) {
    echo "<script>window.location.href='http://localhost/blog/dashboard/index.php'</script>";
  }

  ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
   <div class="row">
     <div class="">

       <div class="col-6">
<?php
         if (isset($_SESSION["alert"])) {
         echo $_SESSION["alert"];
         unset($_SESSION["alert"]); // This will unset the specific session variable "alert"
         }

         ?>
         <?= $delete_allert; ?>
       </div>
       <!-- Page Heading -->
       <h5 class="mb-2 text-gray-800">All Pages</h5>
       <!-- DataTales Example -->
       <div class="card shadow">
         <div class="card-header py-3 d-flex justify-content-between">
           <div>
             <a href="add_categories.php">
               <h6 class="mt-2 btn btn-primary text-white">Add New Page</h6>
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
           <div class="row">
             <div class="col-8">

               <div class="table-responsive">
                 <table class="table table-bordered p-0" id="dataTable">
                   <thead>
                     <tr>
                       <th>Sr.No</th>
                       <th>Page Name</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>1</td>
                       <td>About Us</td>
                       <td>
                         <!-- ************** Edit Button Modal Start ************ -->
                         <div class="btn-group p-1" role="group">
                           <a href="edit-about-page.php" class="btn btn-primary btn-sm">
                             Edit
                           </a>
                           <!-- ---------- view button -----------  -->
                           <a href="../about.php" class="btn btn-warning btn-sm" target="__blank">
                             View
                           </a>
                         </div>
                         <!-- ***************** button end ************   -->
                       </td>
                     </tr>
                     <tr>
                       <td>2</td>
                       <td>Contact Us</td>
                       <td>
                         <!-- ************** Edit Button Modal Start ************ -->
                         <div class="btn-group p-1" role="group">
                           <a href="edit-contact.php" class="btn btn-primary btn-sm">
                             Edit
                           </a>
                           <!-- ---------- view button -----------  -->
                           <a href="../contact.php" class="btn btn-warning btn-sm" target="__blank">
                             View
                           </a>
                         </div>
                         <!-- ***************** button end ************   -->
                       </td>
                     </tr>
                     <tr>
                       <td>3</td>
                       <td>Privacy Policy</td>
                       <td>
                         <!-- ************** Edit Button Modal Start ************ -->
                         <!-- ************** Edit Button Modal Start ************ -->
                         <div class="btn-group p-1" role="group">
                           <a href="edit-policy.php" class="btn btn-primary btn-sm">
                             Edit
                           </a>
                           <!-- ---------- view button -----------  -->
                           <a href="../privacy_policy.php" class="btn btn-warning btn-sm" target="__blank">
                             View
                           </a>
                         </div>
                         <!-- ***************** button end ************   -->
                       </td>
                     </tr>
                     <tr>
                       <td>4</td>
                       <td>Terms & conditions</td>
                       <td>
                         <!-- ************** Edit Button Modal Start ************ -->
                         <!-- ************** Edit Button Modal Start ************ -->
                         <div class="btn-group p-1" role="group">
                           <a href="edit-terms.php" class="btn btn-primary btn-sm">
                             Edit
                           </a>
                           <!-- ---------- view button -----------  -->
                           <a href="../terms-condition.php" class="btn btn-warning btn-sm" target="__blank">
                             View
                           </a>
                         </div>
                         <!-- ***************** button end ************   -->
                       </td>
                     </tr>
                     <!-- <?php  ?> -->
                   </tbody>
                 </table>
                 <!-- -------------------------------  -->
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- /.container-fluid -->
   </div>
 </div>
 </div>
 <?php include 'footer.php' ?>