<?php

// edit user php code start 

$user_update_alert = '';
if (isset($_POST['user_edit'])) {
  $edit_id = mysqli_real_escape_string($con, $_POST['user_id']);
  $full_name= mysqli_real_escape_string($con, $_POST['full_name']);
  $edit_name = mysqli_real_escape_string($con, $_POST['edit_name']);
  $edit_email = mysqli_real_escape_string($con, $_POST['edit_mail']);
  $edit_role = mysqli_real_escape_string($con, $_POST['edit_role']);

  $update_users = "UPDATE users SET fullname = '$full_name', username = '$edit_name', email = '$edit_email',role = 'edit_role' WHERE user_id = '$edit_id' ";
  $user_query = mysqli_query($con, $update_users);

    if ($user_query) {
    $user_update_alert =
        "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
    <strong>User </strong> Updated !
    <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    echo "<script>window.location.href='http://localhost/blog/dashboard/users.php'</script>";
    } else {
      echo mysqli_error($con);
  }
}


// users delete php code start here
$delete_alert = '';
if(isset($_POST['user_delete'])){
  $delete_id = $_POST['delet_id'];
  $delete = "DELETE FROM users WHERE user_id = $delete_id";
  $delete_query = mysqli_query($con, $delete);
  if ($delete_query) {

    echo "<script>window.location.href = 'http://localhost/blog/dashboard/users.php'</script>";
    $delete_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>User </strong> Deleted !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  } else {
    echo mysqli_connect_error();
  }
}
