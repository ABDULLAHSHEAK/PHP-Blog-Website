<?php 
// delete post start

if (isset($_POST['delete_post'])) {
  // var_dump($_POST['delete_img']);
  // var_dump($_POST);
  $post_id = $_POST['delete_id'];
  $post_img = trim($_POST['delete_img']);
  $post_sql = "DELETE FROM post WHERE post_id = '$post_id' ";
  $post_delete = mysqli_query($con, $post_sql);
  if ($post_delete) {
    unlink("upload/" . $post_img);
    echo "post delete";
  } else {
    echo "not delete";
  }
}
?>