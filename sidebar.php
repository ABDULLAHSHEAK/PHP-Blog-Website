<?php
// show category on side bar 
$sql = "SELECT * FROM category";
$run = mysqli_query($con, $sql);

// show recent post os side bar

$sql2 = "SELECT * FROM post ORDER BY post.publish_date DESC LIMIT 8";
$run2 = mysqli_query($con, $sql2);
?>
<div class="col-lg-4">
  <div class="card">
    <div class="card-body d-flex right-section">
      <!-- --- search bar ---  -->
      <div>
        <h5 id="src_text" title="Search Anything">Search here</h5>
        <?php
        if (isset($_GET['keyword'])) {
          $keyword = $_GET['keyword'];
        } else {
          $keyword = "";
        };
        ?>
        <form class="navbar-search mb-3" action="search.php" method="GET">
          <div class="input-group">
            <input type="text" class="form-control bg-white border-1 small" placeholder="Search for..." autocomplete="off" name="keyword" maxlength="70" required value="<?= $keyword ?>">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>
      <!-- ---- side bar adds -----  -->
      <!-- <div class="side-sm-add">
        <a href="#">
          <img src="assete/adds/side-sm.jpg" alt="">
        </a>
      </div> <br />  -->

      <!-- -------- adds -----  -->
      <div id="categories">
        <h6 title="Showing Populer categorys">Categories</h6>
        <ul>
          <?php
          while ($cat_data = mysqli_fetch_assoc($run)) {
          ?>
            <li>
              <a href="category.php?category=<?= $cat_data['cat_name'] ?>" id="cat_item" title="Click To Visit This Categorys Post">
                <i class="fa fa-folder" aria-hidden="true"></i>
                <?= $cat_data['cat_name'] ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div id="posts">
        <h6 title="Showing Recent Posts">Recent Posts</h6>
        <ul>
          <?php
          while ($recent_post = mysqli_fetch_assoc($run2)) {
          ?>
            <li>
              <a href="single.php?id=<?= $recent_post['post_id'] ?>" id="cat_item" title="Click To Visit This Post">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <?= $recent_post['post_title']; ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <!-- ============Recent Comments ==========  -->
      <div id="posts">
        <h6 title="Showing Recent Posts">Recent Comments</h6>
        <ul>
          <?php
          $sql3 = "SELECT c.comment ,c.post_id,c.created_at FROM comments c ORDER BY c.created_at DESC limit 5";
          $run3 = mysqli_query($con, $sql3);

          while ($recent_cmt = mysqli_fetch_assoc($run3)) {
          ?>
            <li>
              <a href="single.php?id=<?= $recent_cmt['post_id'] ?>" id="cat_item" title="Click To Visit This Post">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <?= substr($recent_cmt['comment'],0,30) . "..."?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="adds">
        <h6 title="Click For Sponsors">Advertising</h6>
        <a href="contact.php">
          <img src="assete/adds/adds.jpg" alt="adds image" title="Click For Sponsors" target='__blank'>
        </a>
      </div>
    </div>
  </div>
</div>