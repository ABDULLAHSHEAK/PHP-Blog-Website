<?php
include 'header.php';
// pagination start 
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$limit = 5;
$offset = ($page - 1) * $limit;

// pagination end ------------

$category = $_GET['category'];

$sql = "SELECT * FROM post LEFT JOIN users ON post.auth_id = users.role WHERE category = '$category' limit $offset,$limit ";

$run = mysqli_query($con, $sql);
$row = mysqli_num_rows($run);
// $result = mysqli_fetch_assoc($run);
?>
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-8">

      <!-- <div class="add-cat">
        <a href="">
          <img src="assete/adds/cat-adds.jpg" alt="">
        </a>
      </div> -->
      <h4 style="background: #6351ce;
    padding: 5px 0 7px 15px;
    color: #fff;
    border-radius: 3px;">Category : <?= $category ?></h4>

      <?php
      if ($row) {
        while ($result = mysqli_fetch_array($run)) {
      ?>
          <div class="card shadow">
            <div class="card-body d-flex blog_flex">
              <div class="flex-part1" id="post_imag">
                <a href="single.php?id=<?= $result['post_id'] ?>" target="_blank">
                  <!-- // show post img  -->
                  <?php $img = $result["post_img"] ?>
                  <img src="dashboard/upload/<?= $img ?>">
                </a>
              </div>
              <div class="flex-grow-1 flex-part2">
                <!-- ---- post title --  -->
                <h4>
                  <a href="single.php?id=<?= $result['post_id'] ?>" id="title" target="_blank">
                    <?= ucfirst($result['post_title']) ?>
                  </a>
                </h4>
                <p>
                  <a href="single.php?id=<?= $result['post_id'] ?>" id="body" target="_blank">
                    <!-- ---- post body ----  -->
                    <?= strip_tags(substr($result['post_body'], 0, 300)) . "..." ?>
                  </a>
                  <span><br>
                    <a href="single.php?id=<?= $result['post_id'] ?>" class="btn btn-sm btn-primary" target="_blank">Continue Reading
                    </a></span>
                </p>
                <ul>
                  <li class="me-2"><a href="author.php?id=<?= $result['auth_id'] ?>"> <span>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                      <?php
                      echo $result['username'];
                      ?>
                    </a>
                  </li>
                  <li class="me-2">
                    <a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span> <?php $show_date = $result['publish_date'] ?>
                      <?= date('d-M-Y', strtotime($show_date)) ?>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span>
                      <?= $result['category'] ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      <?php }
      } else {
        echo "<h4 style='    text-align: center;
    line-height: 50vh;'>No Post Found</h4>";
      } ?>

      <!-- // pagination code start  -->
      <?php
      $pagination = "SELECT * FROM post WHERE category = '$category'";
      $p_query = mysqli_query($con, $pagination);
      $count_post = mysqli_num_rows($p_query);
      $total_pages = ceil($count_post / $limit);
      if ($count_post > $limit) {
      ?>
        <ul class="pagination pt-5 pb-5">
          <?php
          for ($i = 1; $i <= $total_pages; $i++) {
          ?>
            <li class="page-item <?= ($i == $page) ? $active = 'active' : ''; ?>">
              <a href="category.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
          <?php } ?>
        </ul>
      <?php } ?>
      <!-- -------------------------------  -->
    </div>
    <?php include 'sidebar.php'; ?>
  </div>
</div>
<?php
include 'footer.php';
