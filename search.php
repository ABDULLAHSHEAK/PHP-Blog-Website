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

// search bar code start here ---------- 

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
}
if (empty($keyword)) {
  header('location:index.php');
}
// pagination end ------------

$sql = "SELECT * FROM post LEFT JOIN category ON post.category = category.cat_id LEFT JOIN users ON post.auth_id = users.user_id WHERE post_title like '&$keyword&' or post_body like '%$keyword%' ORDER BY post.publish_date DESC limit $offset,$limit";

$run = mysqli_query($con, $sql);
$row = mysqli_num_rows($run);

?>

<!-- -------------- html code start -------------- -->

<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-8">
      <h4 style="background: #6351ce;
    padding: 5px 0 7px 15px;
    color: #fff;
    border-radius: 3px;">Showing results for : <span style='color:#ceff0a'> <?= $keyword ?></span></h4>
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
                    <a href="single.php?id=<?= $result['post_id'] ?>" class="btn btn-sm btn-primary mt-2" target="_blank">Continue Reading
                    </a></span>
                </p>
                <ul>
                  <li class="me-2">
                    <a href="author.php?id=<?= $result['auth_id'] ?>" id="auth_name"> <span>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                      <?= $result['username'] ?>
                    </a>
                  </li>
                  <li class="me-2">
                    <a href="" id="auth_name"> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span> <?php $show_date = $result['publish_date'] ?>
                      <?= date('d-M-Y', strtotime($show_date)) ?>
                    </a>
                  </li>
                  <li>
                    <a href="category.php?category=<?= $result['category'] ?>" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span>
                      <?= $result['category'] ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      <?php }
      } else {
        echo "<br>";
        echo "<p>Your search - <span style='font-weight:bold'> $keyword </span> - did not match any documents.</p>
    <p><span style='font-weight:bold'> Suggestions: </span></p>
    <p>* Make sure that all words are spelled correctly.</p>
    <p>* Try more general keywords.</p>
    ";
      } ?>
      <!-- Your search - lsdjfojweojfweflkwfeowejfoijefsdfsdf - did not match any documents.

Suggestions:

Make sure that all words are spelled correctly.
Try different keywords.
Try more general keywords. -->
      <!-- // pagination code start  -->
      <?php
      $pagination = "SELECT * FROM post WHERE post_title like '%$keyword%' or post_body like '%$keyword%'";
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
              <a href="search.php?keyword=<?= $keyword ?>&page=<?= $i ?>" class="page-link"><?= $i ?></a>
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
