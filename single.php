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
          <h4>Leave a Comment</h4>
          <p>Our email address will not be published. Required fields are marked *</p>
          <div class="container">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <form action="">
                  Comment *
                  <textarea name="comment" id="" cols="5" rows="10" class="form-control" required placeholder="Your Comment"></textarea> <br />
                  Name *
                  <input type="text" name="name" class="form-control" placeholder="Your Name"> <br />
                  Email *
                  <input type="email" name="email" class="form-control" placeholder="Your Email"> <br />
                  <button type="submit" class="btn btn-primary">Comment</button> <br /> <br />

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








<?php include("footer.php"); ?>