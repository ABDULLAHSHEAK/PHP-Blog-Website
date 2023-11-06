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


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="background: #e5e5e5;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8  mx-auto">
        <div class="card-body p-5 bg-white card-shadow mt-5 col-10 mx-auto">
          <?= $login_error ?>
          <div class="log-in-box">
            <div class="log-in-title">
              <h3>Welcome To MAS Blog</h3>
              <h4>Log In Your Account</h4>
            </div>

            <div class="input-box">
              <form class="row g-4" method="POST">
                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                    <label for="email">Email Address</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>
                </div>

                <div class="col-12 ms-3">
                  <div class="forgot-box">
                    <div class="row">
                      <div class="form-check ps-0 m-0 remember-box col-6">
                        <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                      </div>
                      <div class="col-6"> <a href="forgot.html" class="forgot-password">Forgot Password?</a></div>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary btn-animation w-100 justify-content-center" type="submit" name="login">
                    Log In
                  </button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>