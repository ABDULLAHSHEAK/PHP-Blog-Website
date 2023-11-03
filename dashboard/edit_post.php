<?php
include("header.php");
$id = $_GET['post_edit'];
if (empty($id)) {
  echo "<script>window.location.href='http://localhost/blog/dashboard/index.php'</script>";
};

if (isset($_GET['post_edit'])) {
  $edit_id = $_GET['post_edit'];
  $select_post = "SELECT * FROM post WHERE post_id = $edit_id";
  $query_post = mysqli_query($con, $select_post);
  $post_data = mysqli_fetch_assoc($query_post);
  $post_id = $post_data["post_id"];
  $post_title = $post_data["post_title"];
  $post_body = $post_data["post_body"];
  $post_img = $post_data["post_img"];
  $post_cat = $post_data["category"];
}
?>

<div class="col-lg-10 col-md-10">
  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between">
      <div>
        <h6 class="mt-2">Edit Your Airticle</h6>
      </div>
      <div>
        <a href="post.php" class="btn btn-primary text-white">Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        Post Title
        <input type="text" name="post_title" class="form-control" value="<?= $post_title ?>" required> <br>
        Post Description
        <textarea name="post_des" id="post_description" cols="30" rows="6" class="form-control"><?= $post_body ?></textarea> <br>
        Select Post Image
        <input type="file" name="post_img" class="form-control"> <br>
        <img src="upload/<?= $post_img ?>" alt="post img" width="200px" height="200px" class="upload_img"> <br/>
        Select Category
        <select name="selec_cat" class="form-control">
          <?php
          $select_cat = "SELECT * FROM category";
          $query = mysqli_query($con, $select_cat);
          while ($data_cat = mysqli_fetch_assoc($query)) {
            $cat_id = $data_cat['cat_id'];
            $catName = $data_cat['cat_name'];
          ?>
            <option value="<?= $catName ?>"
             <?= $post_cat == $catName ? "selected":""?>
             >
             <?php echo $catName ?>
            </option>
          <?php } ?>
        </select> <br>
        <button class="btn btn-primary" name="update_post" type="submit">Publish</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>

<?php include 'footer.php';

$post_edit_alert = '';
if (isset($_POST['update_post'])) {
  $title = mysqli_real_escape_string($con, $_POST['post_title']);
  $des = mysqli_real_escape_string($con, $_POST['post_des']);
  $img_name = $_FILES['post_img']['name'];
  $temp_name = $_FILES['post_img']['tmp_name'];
  $upload = 'upload/' . $img_name;
  $category = mysqli_real_escape_string($con, $_POST['selec_cat']);

  if(!empty($img_name)){
    echo "update with img";
    $post_update = "UPDATE post SET post_title = '$title' , post_body = '$des',post_img = '$img_name',category = '$category' WHERE post_id = $edit_id ";
    $update_query = mysqli_query($con, $post_update);
    if ($update_query) {
      $unlink_img = "upload/" . $post_img;
      unlink($unlink_img);
      move_uploaded_file($temp_name, $upload);
      $post_edit_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
      <strong>Post</strong> Edit succesfully !
      <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      $_SESSION["update_alert"] = $post_edit_alert;
      echo "<script>window.location.href = 'http://localhost/blog/dashboard/post.php';</script>";

    } else {
      echo mysqli_connect_error();
    }
  }else{
    echo "update without img";
    $post_update = "UPDATE post SET post_title = '$title' , post_body = '$des',category = '$category' WHERE post_id = $edit_id ";
    $update_query = mysqli_query($con, $post_update);
    if ($update_query) {
      move_uploaded_file($temp_name, $upload);
      $post_edit_alert = "<div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
      <strong>Post</strong> Edit succesfully !
      <button type='button' class='btn-close text-white' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      $_SESSION["update_alert"] = $post_edit_alert;
      echo "<script>window.location.href = 'http://localhost/blog/dashboard/post.php';</script>";
    }
  }
}
?>