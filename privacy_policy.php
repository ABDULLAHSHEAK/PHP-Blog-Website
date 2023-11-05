<?php
include 'header.php';
$query = "SELECT privacy FROM pages";
$run = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($run);
$body = $result["privacy"];
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
          <?= $body?>
          <!-- <div class="text">
            <h1>Privacy Policy for Mas Blog</h1>
            <p><strong>Effective Date:</strong> [Insert Date]</p>

            <p>At Mas Blog, we are committed to protecting your privacy and ensuring the security of your personal information. This privacy policy outlines how we collect, use, disclose, and safeguard your data when you visit our website.</p>

            <h2>1. Information We Collect</h2>
            <p><strong>1.1 Log Data:</strong> Like many websites, we collect data sent by your browser whenever you visit our site. This data may include your IP address, browser type, operating system, and other technical information.</p>

            <p><strong>1.2 Cookies:</strong> We use cookies to improve your browsing experience and for analytical purposes. You can control cookie settings through your browser.</p>

            <p><strong>1.3 User-Provided Information:</strong> If you choose to subscribe to our newsletter, leave comments, or contact us, we may collect your name, email address, and other information you provide voluntarily.</p>

            <h2>2. How We Use Your Information</h2>
            <p><strong>2.1 Personalization:</strong> We may use collected data to personalize your experience, such as recommending articles tailored to your interests.</p>

            <p><strong>2.2 Communication:</strong> We may use your email address to send you updates, newsletters, or respond to your inquiries.</p>

            <h2>3. Information Sharing</h2>
            <p>We do not sell, trade, or share your personal information with third parties, except in the following circumstances:</p>

            <p><strong>3.1 Service Providers:</strong> We may share your data with trusted service providers who help us operate our website and improve our services.</p>

            <p><strong>3.2 Legal Requirements:</strong> We may disclose your information in response to legal obligations or when necessary to protect our rights, privacy, safety, or property.</p>

            <h2>4. Data Security</h2>
            <p>We take appropriate measures to safeguard your personal information from unauthorized access, disclosure, alteration, and destruction. However, no method of data transmission over the Internet can be guaranteed as completely secure.</p>

            <h2>5. Third-Party Links</h2>
            <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites. We encourage you to review their privacy policies before providing any personal information.</p>

            <h2>6. Children's Privacy</h2>
            <p>Mas Blog is not intended for individuals under the age of 13. We do not knowingly collect or maintain information from anyone under this age.</p>

            <h2>7. Changes to this Privacy Policy</h2>
            <p>We may update our privacy policy from time to time. Any changes will be posted on this page with an updated effective date. By continuing to use our website, you consent to the revised privacy policy.</p>

            <h2>8. Contact Us</h2>
            <p>If you have any questions, concerns, or requests related to this privacy policy, please contact us at [Insert Contact Information].</p>

            <p>Thank you for visiting Mas Blog. Your privacy is important to us, and we are dedicated to ensuring the protection and responsible use of your personal information.</p>
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
