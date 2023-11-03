<?php
include 'header.php';

?>

<!-- -------------- html code start -------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-lg-8">
        <h4 style="background: #6351ce;padding: 5px 0 7px 15px;color: #fff;border-radius:3px;">
          About Us
        </h4>
        <div class="card shadow p-4">
          <h1>Contact Us</h1>

          <p>If you have any questions, feedback, or suggestions, please feel free to contact us. We value your input and will respond as soon as possible.</p>

          <h2>Contact Information</h2>
          <p>If you prefer to reach out directly, you can contact us through the following methods:</p>
          <ul>
            <li>Email: <a href="mailto:abdullahsheak8636@.com">abdullahsheak8636@.com</a></li>
            <li>Phone: [Insert Phone Number]</li>
            <li>Facebook : <a href="https://www.facebook.com/abdullahshakeabir">Abdullahshake</a></li>
            <li>Address: [Insert Address]</li>
          </ul>

          <h2>Contact Form</h2>
          <p>Alternatively, you can use the contact form below:</p>
          <div class="container">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Your Email" required>
              </div>

              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</body>

</html>
<?php
include 'footer.php';
