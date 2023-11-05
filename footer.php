<?php
// show category on side bar 
$sql = "SELECT * FROM category limit 4";
$run = mysqli_query($con, $sql);

// setting data code start


$title_query = "SELECT * FROM `setting`";
$title_result = mysqli_query($con, $title_query);
$data = mysqli_fetch_assoc($title_result);

$about_title = $data["about_title"];
$about_text = $data["about_text"];
$address = $data["address"];
$email = $data["email"];
$fb_url = $data["fb_url"];
$mobile = $data["mobile"];
$copy = $data["copy"];


?>
<div class="">
  <div class="">

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
      <!-- Section: Social media -->
      <div class="">
        <div class="">
          <section class="d-flex justify-content-between p-4 col-lg-12" style="background-color: #6351ce">
            <!-- Left -->
            <div class="">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="" class="text-white me-4">
                <i class="fa fa-facebook-official" aria-hidden="true"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fa fa-google-plus-square" aria-hidden="true"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fa fa-github-square" aria-hidden="true"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
        </div>
      </div>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold" title="Short Description About This Website"><?= $about_title ?></h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <?= $about_text ?>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Category</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <?php
              while ($cat_data = mysqli_fetch_assoc($run)) {
              ?>
                <p>
                  <a href="category.php?category=<?= $cat_data['cat_name'] ?>" class="text-white" title="Click To Visit This Category Post"><?= $cat_data['cat_name'] ?></a>
                </p>
              <?php } ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold" title="Go Useful Link">Useful links</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <a href="about.php" class="text-white">About Us</a>
              </p>
              <p>
                <a href="contact.php" class="text-white">Contact Us</a>
              </p>
              <p>
                <a href="terms-condition.php" class="text-white">Terms & Condition</a>
              </p>
              <p>
                <a href="privacy_policy.php" class="text-white">Privacy Policy</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold" title="Contact Information">Contact</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p><i class="fa fa-address-card" aria-hidden="true"></i>
                <?= $address ?>
              </p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
              <p><i class="fa fa-facebook-square" aria-hidden="true"></i><a href="<?= $fb_url ?>"> Facebook</a></p>
              <p><i class="fa fa-phone-square" aria-hidden="true"></i> + <?= $mobile ?></p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © <?= $current_year ?> Copyright: <?= $copy ?>
        <a class="text-white" href="https://www.facebook.com/abdullahshakeabir">Desgin & Develop by Md Abdullah Shake</a>
      </div>
      <!-- Copyright -->
      <a class="scroll-to-top rounded" href="#page-top"> <i class="fa fa-angle-up"></i> </a>
    </footer>
    <!-- Footer -->

  </div>
  <!-- End of .container -->

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- ------ slider -----  -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- ------ slider -----  -->
<script src="js/app.js"></script>
</body>

</html>