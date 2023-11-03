<?php
include 'header.php';
if (isset($_SESSION['user_data'])) {
  $auth_id = $_SESSION['user_data']['0'];
};

$post_publis_alert = '';
if(isset($_POST['add_category'])){
  $title = mysqli_real_escape_string($con, $_POST['post_title']);
  $des = mysqli_real_escape_string($con, $_POST['post_des']);
  $img_name = $_FILES['post_img']['name'];
  $temp_name = $_FILES['post_img']['tmp_name'];
  $upload = 'upload/' . $img_name;
  $category = mysqli_real_escape_string($con, $_POST['selec_cat']);

  $post_insert = "INSERT INTO post (post_title,post_body,post_img,category,auth_id) VALUE ('$title','$des','$img_name','$category','$auth_id')";

  $post_query = mysqli_query($con, $post_insert);
  if($post_query){
    move_uploaded_file($temp_name, $upload);
    $post_publis_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
  <strong>Post</strong> Publish succesfully !
  <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }else{
    echo mysqli_connect_error();
  }

}

?>
<!-- Begin Page Content -->
<div class="col-lg-10 col-md-10">
  <!-- Page Heading -->
  <!-- DataTales Example -->
  <?= $post_publis_alert ?>
  <div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between">
      <div>
        <h6 class="mt-2">Publish Your Airticle</h6>
      </div>
      <div>
        <a href="index.php" class="btn btn-primary text-white">Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        Post Title
        <input type="text" name="post_title" class="form-control" required> <br>
        Post Description
        <textarea name="post_des" id="post_description" cols="30" rows="6" class="form-control"></textarea> <br>
        Select Post Image
        <input type="file" name="post_img" class="form-control"> <br>
        Select Category
        <select name="selec_cat" class="form-control">
          <option value="">Category</option>
          <?php
          $select_cat = "SELECT * FROM category";
          $query = mysqli_query($con, $select_cat);
          while ($data_cat = mysqli_fetch_assoc($query)) {
            $cat_id = $data_cat['cat_id'];
            $catName = $data_cat['cat_name'];
          ?>
            <option value="<?= $catName ?>"><?php echo $catName ?></option>
          <?php } ?>
        </select> <br>
        <button class="btn btn-primary" name="add_category" type="submit">Publish</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>

<?php include 'footer.php' ?>