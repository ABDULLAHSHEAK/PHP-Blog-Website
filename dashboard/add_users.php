<?php
include 'header.php';
if (isset($_POST['add_user'])) {
  $full_name = mysqli_real_escape_string($con, $_POST['fullname']);
  $name = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, sha1($_POST['password']));
  $role = mysqli_real_escape_string($con, $_POST['user_role']);

  // user add form validation
  if (strlen($name) < 4 || strlen($name) > 100) {
    $error = 'Username must be getter than 4 & less than 100 charecter';
  } else if (strlen($password) < 4) {
    $error = 'Password must be gretter than 4 charecter';
  } else {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    if ($row >= 1) {
      $error = 'Email already Exist';
    } else {
      $user_add = "INSERT INTO users (fullname,username,email,password,role) VALUE ('$full_name','$name','$email','$password','$role')";
      $add_query = mysqli_query($con, $user_add);
      if($add_query){
        $user_add_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
          <strong>User</strong> has been added !
          <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $_SESSION["user_add"] = $user_add_alert;
        echo "<script>window.location.href='http://localhost/blog/dashboard/users.php'</script>";
      }else{
        $error = 'Someting was wrong';
      }

    }
  }

}
?>


<!-- Begin Page Content -->
<div class="col-lg-8 col-md-6 col-sm-8">
  <!-- Page Heading -->
  <h5 class="mb-2 text-gray-800"></h5>
  <!-- <?= $cat_add_alert . $name_exist_alert ?> -->
  <?php
  if (!empty($error)) {
    echo "<div class='alert alert-warning alert-dismissible fade show bg-danger text-white' role='alert'>
  $error
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  };
  ?>
  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between bg-dark text-white">
      <div>
        <h2>Add New Users</h2>
      </div>
    </div>
    <div class="card-body">
      <form action="" method="POST">
        Full Name :
        <input type="text" class="form-control" name="fullname" required value="<?= (!empty($error)) ? $full_name : '' ?>"> <br>
        Username : *
        <input type="text" class="form-control" name="username" required value="<?= (!empty($error)) ? $name : '' ?>"> <br>
        User Email : *
        <input type="email" class="form-control" name="email" required value="<?= (!empty($error)) ? $email : '' ?>"> <br>
        User Password : *
        <input type="password" class="form-control" name="password" required> <br>
        User Role : *
        <select name="user_role" class="form-control">
          <option value="">Select Role</option>
          <option value="1">Admin</option>
          <option value="0">Editor</option>
        </select> <br />
        <button class="btn btn-primary" name="add_user" type="submit">Add User</button>
        <a href="users.php" class="btn btn-warning" name="add_category" type="submit">Back</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>









<?php include 'footer.php'; ?>