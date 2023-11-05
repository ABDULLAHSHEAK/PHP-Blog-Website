<?php
include("config.php");
$sql = "SELECT * FROM category";
$run = mysqli_query($con, $sql);

$title_query = "SELECT * FROM `setting`";
$title_result = mysqli_query($con, $title_query);
$data = mysqli_fetch_assoc($title_result);
$title = $data["site_title"];
$icone = $data['site_icon'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assete/img/<?= $icone ?>">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  
</head>

<body class="bg-light">
  <div class="superNav border-bottom py-2" style="background: #6351ce;color:#fff">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
          <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block">
            <?php
            $current_date = date('d');
            $current_year = date('Y');
            $current_month = date('F');
            $current_day = date('l');
            $current_time = date('h:i A');

            echo $current_day . " , " . $current_date . " " . $current_month . " , " . $current_year . " || " . " <span id='clock'></span>";
            ?>
          </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end" id="page-top">
          <span class="me-3">
            <a class="text-white" href="terms-condition.php" title="Click To Visit Terms & Condition Page">
              Terms & Condition <?= $icone ?>
            </a>
          </span>
          <span class="me-3">
            <a class="text-white" href="about.php" title="Click To Visit About Page">
              About
            </a>
          </span>
          <span class="me-3">
            <a class="text-white" href="contact.php" title="Click To Visit Contact Page">
              Contact
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
    <div class="container" id="page-top">
      <a class="navbar-brand" href="http://localhost/blog/"><i class="fa-solid fa-shop me-2" title="Visit Example Website"></i> <strong> <?php
                                                                                                                                          $title_query = "SELECT nav_text FROM `setting`";
                                                                                                                                          $title_result = mysqli_query($con, $title_query);
                                                                                                                                          $data = mysqli_fetch_assoc($title_result);
                                                                                                                                          $title = $data["nav_text"];
                                                                                                                                          echo "$title";
                                                                                                                                          ?></strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="http://localhost/blog/" title="Click To Return Home Page">Home</a>
          </li>
          <?php
          while ($cat_data = mysqli_fetch_assoc($run)) {
          ?>

            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="category.php?category=<?= $cat_data['cat_name'] ?>"><?= $cat_data['cat_name'] ?></a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase btn btn-primary text-white" href="https://www.facebook.com/abdullahshakeabir" title="Click here for buy this php script">Buy This Template</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>