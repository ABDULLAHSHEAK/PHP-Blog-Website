<?php
include("header.php");
$query = "SELECT privacy FROM pages";
$run = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($run);
$body = $result["privacy"];

// ---------------- page update code ---------------- 
$alert = '';
if (isset($_POST["save"])) {
  $policy_des = mysqli_real_escape_string($con, $_POST["policy"]);
  $query = "UPDATE pages SET privacy = '$policy_des'";
  $run = mysqli_query($con, $query);
  if ($run) {
    $alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Page</strong> Update succesfully !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    $_SESSION["alert"] = $alert;
    echo "<script>window.location.href='http://localhost/blog/dashboard/all-pages.php'</script>";
  } else {
    echo "not update";
  }
}
// ------------------ 
?>

<div class="col-lg-10 col-md-10">
  <?php echo $alert ?>
  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between">

      <div>
        <h6 class="mt-2">Edit Privacy Policy Page</h6>
      </div>
      <div>
        <a href="all-pages.php" class="btn btn-primary text-white">Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        Post Description
        <textarea name="policy" id="post_description" cols="40" rows="10" class="form-control"><?= $body ?></textarea> <br>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>

<?php include 'footer.php';


?>