 <?php
  include 'header.php';
  include 'edit_users.php';
  if ($admin != 1) {
    echo "<script>window.location.href='http://localhost/blog/dashboard/index.php'</script>";
  }

  // setting code start 
  $query = "SELECT * FROM setting";
  $result = mysqli_query($con, $query);
  $setting = mysqli_fetch_assoc($result);



  ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
   <div class="col-6">
     <?php
      if (isset($_SESSION['save'])) {
        $alerts = $_SESSION['save'];
       echo $alerts;
        unset($_SESSION['save']);
      }
      ?>
   </div>
   <!-- DataTales Example -->
   <div class="card shadow">
     <div class="card-header py-3 d-flex justify-content-between">
       <div>
         <h3>Setting</h3>
       </div>
       <div>
         <form class="navbar-search">
           <div class="input-group">
             <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
             <div class="input-group-append">
               <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
             </div>
           </div>
         </form>
       </div>
     </div>
     <div class="card-body">
       <!-- --- site title -----  -->
       <div class="setting">
         <form action="" method="POST" enctype="multipart/form-data">
           <div class="col-md-8">
             <div class="site_title">
               <h5>Site Title </h5>
               <input type="text" class="form-control" name="site_title" value="<?= $setting["site_title"] ?>">
             </div> <br />

             <div class="nav_icon">
               <h5>Site Icone</h5>
               <input type="file" class="form-control" name="site_icon" value="<?= $setting["site_icon"] ?>"> <br />
               <img src="../assete/img/<?= $setting["site_icon"]?>" alt="Site Icon" width="100" height="100">
             </div><br />

             <div class="nav_text">
               <h5>Site Header Text</h5>
               <input type="text" class="form-control" name="nav_text" value="<?= $setting["nav_text"] ?>">
             </div> <br />

             <!-- ----- footer section ----  -->
             <h5><b>Footer Section</b> </h5>
             <hr />
             <div class="about_title">
               <h5>Footer About Section Title</h5>
               <input type="text" class="form-control" name="about_title" value="<?= $setting["about_title"] ?>">
             </div> <br />

             <div class="about_body">
               <h5>Footer About Section Text</h5>
               <textarea name="about_text" id="" cols="5" rows="5" class="form-control"><?= $setting["about_text"] ?></textarea>
             </div> <br />

             <div class="address">
               <h5>Footer Address</h5>
               <input type="text" class="form-control" name="address" value="<?= $setting["address"] ?>">
             </div> <br />

             <div class="email">
               <h5>Footer Email</h5>
               <input type="email" class="form-control" name="email" value="<?= $setting["email"] ?>">
             </div> <br />

             <div class="facebook">
               <h5>Footer Facebook URL</h5>
               <input type="URL" class="form-control" name="fb_url" value="<?= $setting["fb_url"] ?>">
             </div> <br />

             <div class="mobile">
               <h5>Footer Mobile Number</h5>
               <input type="text" class="form-control" name="mobile" value="<?= $setting["mobile"] ?>">
             </div> <br />


             <div class="address">
               <h5>Copyright Section Text</h5>
               <input type="text" class="form-control" name="copy" value="<?= $setting["copy"] ?>">
             </div> <br />

             <input type="submit" name="save" class="btn btn-primary" value="Save">
         </form>
       </div>
     </div>
   </div>
 </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <?php include 'footer.php';

  if (isset($_POST['save'])) {
    $site_title = mysqli_real_escape_string($con, $_POST['site_title']);
    $site_icon = $_FILES['site_icon']['name'];
    $temp_name = $_FILES['site_icon']['tmp_name'];
    $upload = '../assete/img/' . $site_icon;

    $nav_text = mysqli_real_escape_string($con, $_POST['nav_text']);
    $about_title = mysqli_real_escape_string($con, $_POST['about_title']);
    $about_text = mysqli_real_escape_string($con, $_POST['about_text']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $fb_url = mysqli_real_escape_string($con, $_POST['fb_url']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $copy = mysqli_real_escape_string($con, $_POST['copy']);

    if (!empty($site_icon)) {
      echo "update with img";
      $setting_update = "UPDATE setting SET site_title = '$site_title' , site_icon = '$site_icon',nav_text = '$nav_text',about_title = '$about_title',about_text = '$about_text' , address = '$address' , email = '$email' , fb_url = '$fb_url' , mobile = '$mobile' , copy = '$copy' ";
      $update_query = mysqli_query($con, $setting_update);
      if ($update_query) {
        $unlink_img = "../assete/img/" . $setting["site_icon"];
        unlink($unlink_img);
        move_uploaded_file($temp_name, $upload);
        $save_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
      <strong>Setting Save</strong> Succesful !
      <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        $_SESSION["save"] = $save_alert;
        echo "<script>window.location.href = 'http://localhost/blog/dashboard/setting.php';</script>";
      } else {
        echo mysqli_connect_error();
      }
    } else {
      echo "update without img";
      $setting_update = "UPDATE setting SET site_title = '$site_title' , site_icon = '$site_icon',nav_text = '$nav_text',about_title = '$about_title',about_text = '$about_text' , address = '$address' , email = '$email' , fb_url = '$fb_url', mobile = '$mobile' , copy = '$copy' ";
      $update_query = mysqli_query($con, $setting_update);
      if ($update_query) {
        move_uploaded_file($temp_name, $upload);
        $save_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
      <strong>Setting</strong> Save Succesful !
      <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        $_SESSION["save"] = $save_alert;
        echo "<script>window.location.href = 'http://localhost/blog/dashboard/setting.php';</script>";
      }
    }
  }
 ?>