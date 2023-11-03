<?php
include 'config.php';
session_start();
if (isset($_SESSION['user_data'])) {
  header('location:http://localhost/blog/dashboard/index.php');
};
//--------------------
$login_error = "";
if (isset($_POST['login'])) {
  $input_mail = mysqli_real_escape_string($con, $_POST['email']);
  $input_pass = mysqli_real_escape_string($con, sha1($_POST['password']));

  $sql = "SELECT * FROM users WHERE email = '{$input_mail}' AND password ='{$input_pass}'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_num_rows($query);
  if ($data) {
    $result = mysqli_fetch_assoc($query);
    $user_date = array($result['user_id'], $result['username'], $result['role'],);
    $_SESSION['user_data'] = $user_date;
    header('location:dashboard/index.php');
  } else {
    $login_error = "<div class='alert alert-primary bg-danger text-white p-2' role='alert'>
    Invalid login Username/Password !
    </div>";
    header('location:login.php');
  }
} 
  // $sql2 = "SELECT * FROM users";
  // $query2 = mysqli_query($con, $sql);
  // $user_data = mysqli_fetch_assoc($query2);
  // $id = $user_data['user_id'];
  // $db_email = $user_data['email'];
  // $db_pass = $user_data['password']; 

  //   $user_date = array($id, $db_username, $db_pass);
  //   session_start();
  //   $_SESSION['user_data'] = $user_date;

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8  mx-auto">
        <div class="card-body p-5 bg-primary mt-5">
          <h2 class="text-uppercase text-center mb-5 text-white">Login To Dashboard</h2>
          <?= $login_error ?>
          <form action="" method="POST">

            <div class="form-outline mb-4">
              <input type="email" class="form-control form-control-lg" placeholder="username" name="email" required />
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" name="password" required />
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" name="login" value="Submit" class="btn btn-light btn-block btn-lg gradient-custom-4 text-body">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>