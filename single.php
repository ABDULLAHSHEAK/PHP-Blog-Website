<?php include("header.php");

$id = $_GET['id'];
if (empty($id)) {
  header('location:index.php');
}
$sql = "SELECT * FROM post LEFT JOIN users ON post.auth_id = users.role WHERE post_id = '$id'";
$result = mysqli_query($con, $sql);
$post_data = mysqli_fetch_assoc($result);

?>

<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow">
        <div class="card-body">
          <div class="" id="single_img">
            <a href="#">
              <?php $img = $post_data["post_img"] ?>
              <img src="dashboard/upload/<?= $img ?>" alt="post image">
            </a>
          </div>
          <hr>
          <div class="div">

            <!-- ---------- post date auth cat information -------------  -->

            <div class="flex-part2 single_info">
              <ul>
                <li class="me-2">
                  <a href="author.php?id=<?= $post_data['auth_id'] ?>" id="auth_name" title="Post Auther Name"> <span>
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                    <?php echo $post_data['username'] ?>
                    <?php echo "||" ?>
                  </a>
                </li>
                <li class="me-2">
                  <a href="" id="auth_name" title="Post publish date">
                    <span>
                      <i class="fa fa-calendar-o" aria-hidden="true">
                      </i>
                    </span>
                    <?php $show_date = $post_data['publish_date'] ?>
                    <?= date('d-M-Y', strtotime($show_date)) ?>
                    <?php echo "||" ?>
                  </a>
                </li>
                <li>
                  <a href="category.php?category=<?= $post_data['category'] ?>" class="text-primary" title="Post category">
                    <span><i class="fa fa-tag" aria-hidden="true"></i></span>
                    <?= $post_data['category'] ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- ---------- post date auth cat information -------------  -->

            <h1><?= ucfirst($post_data['post_title']) ?></h1>
            <p><?= $post_data['post_body'] ?></p>
          </div>
        </div>
        <div class="card-footer">
          <!-- ----------------------------------------- comment box -------------  -->
          <?php
          $query = "SELECT * FROM comments WHERE post_id = '$id'";
          $run = mysqli_query($con, $query);

          ?>
          <!-- ----------------------------------------- comment box -------------  -->
          <section>
            <div class="container mb-4">
              <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-12">
                  <div class="card text-dark">
                    <div class="card-body p-4">
                      <h4 class="mb-0">Recent comments</h4>
                      <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                      <?php while ($cmt = mysqli_fetch_assoc($run)) {

                      ?>
                        <div class="d-flex flex-start">
                          <img class="rounded-circle shadow-1-strong me-3" src="assete/img/avater.png" alt="avatar" width="60" height="60" />
                          <div>
                            <h6 class="fw-bold mb-1">
                              <?= $cmt['name'] ?>
                            </h6>
                            <div class="d-flex align-items-center mb-3">
                              <p class="mb-0">
                               <?=date('d-m-Y',strtotime($cmt['created_at'])) ?>
                              </p>
                            </div>
                            <p class="mb-0">
                              <?= $cmt['comment'] ?>
                            </p>
                            <button class="btn btn-primary btn-sm mt-2">Reply</button>
                          </div>
                        </div>
                        <hr class="mt-4 mb-4" />
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- ----------------------------------------- comment box -------------  -->
          <!-- ----------------------------------------- comment box -------------  -->
          <h4>Leave a Comment</h4>
          <p>Our email address will not be published. Required fields are marked *</p>
          <div class="container">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <form action="" method="POST">
                  Comment *
                  <textarea name="comment_text" id="" cols="5" rows="10" class="form-control" required placeholder="Your Comment"></textarea> <br />
                  Name *
                  <input type="text" name="name" class="form-control" placeholder="Your Name"> <br />
                  Email *
                  <input type="email" name="email" class="form-control" placeholder="Your Email"> <br />
                  <button type="submit" name='comment' class="btn btn-primary">Comment</button> <br /> <br />

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php') ?>
  </div>
</div>

<!-- ================================= comment insert code ============   -->
<!-- ================================= comment insert code ============   -->
<?php
if (isset($_POST['comment'])) {
  $post_id = $id;
  $user_name = mysqli_real_escape_string($con, $_POST['name']);
  $user_mail = mysqli_real_escape_string($con, $_POST['email']);
  $comment = mysqli_real_escape_string($con, $_POST['comment_text']);
  $status = 0;

  $cmt_query = "INSERT INTO comments(post_id,name,email,comment,status) VALUE ('$post_id','$user_name','$user_mail','$comment','$status')";
  $cmt_run = mysqli_query($con, $cmt_query);
  if ($cmt_run) {
    echo "comment save";
    echo "<script>window.location.href='single.php?id=$id'</script>";
  }
}
?>
<?php include("footer.php"); ?>