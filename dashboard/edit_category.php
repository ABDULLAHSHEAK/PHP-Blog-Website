<?php

// delete category php code start 

$delete_allert = '';
if(isset($_POST['delete_cat'])){
  $delete_id = $_POST['id'];
  $delete = "DELETE FROM category WHERE cat_id = $delete_id";
  $delete_query = mysqli_query($con, $delete);
  if ($delete_query) {

    echo "<script>window.location.href = 'http://localhost/blog/dashboard/categories.php'</script>";
    echo "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Category </strong> Updated !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  } else {
    echo mysqli_connect_error();
  }
}



// category update code start 

$update_alert = '';
if (isset($_POST['edit'])) {
  $edit_id = $_POST['up_date'];
  $up_cat_name = $_POST['Up_category'];
  $update_cat = "UPDATE category SET cat_name = '$up_cat_name' WHERE cat_id = '$edit_id' ";

  $update_query = mysqli_query($con, $update_cat);
  if ($update_query) {
    $update_alert =
    "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Category </strong> Updated !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  } else {
    echo mysqli_error($con);
  }
}
