<?php
include '../config.php';
session_start();
if (!isset($_SESSION['user_data'])) {
  header('location:http://localhost/blog/login.php');
}

$title_query = "SELECT * FROM `setting`";
$title_result = mysqli_query($con, $title_query);
$data = mysqli_fetch_assoc($title_result);
$title = $data["site_title"];
$icone = $data['site_icon'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/x-icon" href="../assete/img/<?=$icone?>">
  <title>Blog Admin - Dashboard</title>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/css/custom.css" rel="stylesheet">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/blog/" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15"> <i class="fa fa-smile-o"></i> </div>
        <div class="sidebar-brand-text mx-3">
          <?php
          $title_query = "SELECT nav_text FROM `setting`";
          $title_result = mysqli_query($con, $title_query);
          $data = mysqli_fetch_assoc($title_result);
          $title = $data["nav_text"];
          echo "$title";
          ?>
        </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <h4>Dashboard</h4></span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="post.php"> <span>All Post</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <?php
      if (isset($_SESSION['user_data'])) {
        $admin = $_SESSION['user_data']['2'];
      }
      if ($admin == 1) {
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="categories.php"> <span>Categories</span> </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="users.php"> <span>Users</span> </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
          <a class="nav-link collapsed" href="setting.php"> <span>Setting</span> </a>
        </li>
        <!-- Divider pages -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
          <a class="nav-link collapsed" href="all-pages.php"> <span>Pages</span> </a>
        </li>
        <!-- Divider comment -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
          <a class="nav-link collapsed" href="comments.php"> <span>Comments</span> </a>
        </li>

      <?php } ?>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 text-white" id="sidebarToggle">
          <i class="fa fa-chevron-left"></i>
        </button>
      </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i></button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-search"></i> </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow +animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php if (isset($_SESSION['user_data'])) {
                    echo $_SESSION['user_data'][1];
                    unset($_SESSION['error']);
                  } ?>
                </span> <img class="img-profile rounded-circle" src="vendor/img/undraw_profile.svg"> </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile </a>
                <a class="dropdown-item" href="setting.php"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End header -->