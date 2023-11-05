<?php
include 'header.php';
$query = "SELECT about FROM pages";
$run = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($run);
$body = $result["about"];
?>

<!-- -------------- html code start -------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-lg-8">
        <h4 style="background: #6351ce;padding: 5px 0 7px 15px;color: #fff;border-radius:3px;">
          About Us
        </h4>
        <div class="card shadow p-4">
          <?= $body ?>

        </div>
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</body>

</html>
<?php
include 'footer.php';
?>

<!--  -->