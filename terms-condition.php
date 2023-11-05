<?php
include 'header.php';
$query = "SELECT terms FROM pages";
$run = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($run);
$body = $result["terms"];
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
          <?=$body?>
          <!-- <div class="text">
            <h1>Terms & Conditions for Mas Blog</h1>

            <p>By accessing and using the Mas Blog website, you agree to comply with and be bound by the following terms and conditions. If you do not agree with these terms, please do not use our website.</p>

            <h2>1. Intellectual Property Rights</h2>
            <p>The content on Mas Blog, including but not limited to articles, images, and logos, is protected by intellectual property laws. You may not use, reproduce, or distribute our content without our written permission.</p>

            <h2>2. User Conduct</h2>
            <p>When using our website, you agree not to:
            <ul>
              <li>Violate any applicable laws or regulations.</li>
              <li>Post harmful, offensive, or illegal content.</li>
              <li>Attempt to gain unauthorized access to our website or user accounts.</li>
              <li>Engage in any form of harassment or cyberbullying.</li>
            </ul>
            </p>

            <h2>3. Privacy Policy</h2>
            <p>Your use of our website is also governed by our Privacy Policy. Please review the Privacy Policy to understand how we collect, use, and protect your data.</p>

            <h2>4. Links to Third-Party Websites</h2>
            <p>Mas Blog may contain links to third-party websites. We do not endorse or have control over the content or policies of these websites. Your use of third-party websites is at your own risk, and we recommend reviewing their terms and policies.

            <h2>5. Changes to Terms & Conditions</h2>
            <p>Mas Blog reserves the right to modify these terms and conditions at any time. It is your responsibility to regularly review this page for updates. Continued use of our website after changes are made constitutes your acceptance of the new terms.

            <h2>6. Disclaimer</h2>
            <p>While we strive to provide accurate and up-to-date information, Mas Blog does not guarantee the accuracy, completeness, or suitability of the content on our website. Any reliance on our content is at your own risk.

            <h2>7. Limitation of Liability</h2>
            <p>Mas Blog and its contributors are not liable for any direct, indirect, incidental, or consequential damages arising from your use of our website.

            <h2>8. Governing Law</h2>
            <p>These terms and conditions are governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising from the use of our website are subject to the exclusive jurisdiction of the courts in [Your Jurisdiction].

            <h2>9. Contact Information</h2>
            <p>If you have any questions or concerns regarding these terms and conditions, please contact us at [Insert Contact Information].

            <p>Thank you for using Mas Blog. We hope you find our content valuable and informative.</p>
          </div> -->
        </div>
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</body>

</html>
<?php
include 'footer.php';
