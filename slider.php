<div class="demo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 id="top_header">Letest Post</h2>
        <div id="news-slider" class="owl-carousel">
          <?php
          $sql2 = "SELECT * FROM post LEFT JOIN category ON post.category = category.cat_id LEFT JOIN users ON post.auth_id = users.user_id ORDER BY post.publish_date DESC limit 5";

          $run2 = mysqli_query($con, $sql2);
          while ($result2 = mysqli_fetch_assoc($run2)) {

          ?>
            <div class="post-slide card shadow mb-3">
              <div class="post-img">
                <a href="single.php?id=<?= $result2['post_id'] ?>" target="_blank">
                  <?php $img = $result2["post_img"] ?>
                  <img src="dashboard/upload/<?= $img ?>">
                </a>
              </div>
              <div class="post-content">
                <h3 class="post-title">
                  <a href="single.php?id=<?= $result2['post_id'] ?>" target="_blank">
                  <?= substr($result2['post_title'] , 0 , 30) . "..." ?>
                  </a>
                </h3>
                <p class="post-description">
                  <a href="single.php?id=<?= $result2['post_id'] ?>" target="_blank">
                    <?= strip_tags(substr($result2['post_body'], 0, 135)) . "..." ?>
                  </a>
                </p>
                <ul class="post-bar">
                  <a href="">
                    <li><i class="fa fa-calendar"></i>
                      <?php $show_date = $result2['publish_date'] ?>
                      <?= date('d-M-Y', strtotime($show_date)) ?>
                    </li>
                  </a>
                  <li>
                    <a href="category.php?category=<?= $result2['category'] ?>">
                      <i class="fa fa-tag" aria-hidden="true"></i>
                      <?= $result2['category'] ?>
                    </a>
                  </li>
                </ul>
                <a href="single.php?id=<?= $result2['post_id'] ?>" target="_blank" class="read-more">read more</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>