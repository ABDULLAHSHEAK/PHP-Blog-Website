 <?php
  include 'header.php';

  $cat_add_alert = '';
  $name_exist_alert = '';
  if (isset($_POST['add_category'])) {
    $cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);
    $find_cat_name = "SELECT * FROM category WHERE cat_name = '{$cat_name}'";
    $find_query = mysqli_query($con, $find_cat_name);
    $row = mysqli_num_rows($find_query);

    if ($row) {
      $name_exist_alert =
        "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Category Name</strong> already exist !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    } else {
      $cat_insert = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
      $cat_query = mysqli_query($con, $cat_insert);
      if ($cat_query) {
        $cat_add_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Category</strong> has been added !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
      }
    }
  }
  ?>
 <!-- Begin Page Content -->
 <div class="col-lg-6 col-md-6 col-sm-8">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800"></h5>
   <?= $cat_add_alert . $name_exist_alert ?>
   <!-- DataTales Example -->
   <div class="card shadow">
     <div class="card-header py-3 d-flex justify-content-between">
       <div>
         <a href="#">
           <h6 class="text-primary mt-2">Add Categories</h6>
         </a>
       </div>
     </div>
     <div class="card-body">
       <form action="" method="POST">
         Category name
         <input type="text" class="form-control" name="cat_name" required> <br>
         <button class="btn btn-primary" name="add_category" type="submit">Save</button>
         <a href="categories.php" class="btn btn-warning" name="add_category" type="submit">Back</a>
       </form>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <?php include 'footer.php' ?>