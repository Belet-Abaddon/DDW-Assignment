<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include ("dbconnect.php");

$email = $_SESSION['user']['email'];
$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
  $row1 = $resSub->fetch_assoc();
  $sub = $row1['subscription'];
}
?>

<body>
  <?php
  include ('userNav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section class="legislation-content">
      <div class="section">
        <h2>Key Legislation and Policies</h2>
        <h3>1. Data Protection and Privacy</h3>
        <p><strong>General Data Protection Regulation (GDPR):</strong> We comply with GDPR to protect user data and
          privacy.</p>
        <p><strong>Children's Online Privacy Protection Act (COPPA):</strong> Ensuring the safety and privacy of
          children under 13.</p>

        <h3>2. User Content and Conduct</h3>
        <p><strong>Acceptable Use Policy:</strong> Guidelines for what is and isn't allowed on our platform.</p>
        <p><strong>Content Moderation Policy:</strong> How we monitor and manage user content to prevent abuse.</p>

        <h3>3. Intellectual Property</h3>
        <p><strong>Copyright Infringement:</strong> Respecting intellectual property rights and handling infringement
          claims.</p>
        <p><strong>User-Generated Content:</strong> Licensing and rights of content created by users.</p>

        <h3>4. Advertising and Marketing</h3>
        <p><strong>Truth in Advertising:</strong> Ensuring that all advertisements are truthful and non-deceptive.</p>
        <p><strong>User Consent:</strong> Obtaining consent for targeted advertisements and data usage.</p>
      </div>

      <div class="section">
        <h2>Compliance and Reporting</h2>
        <p><strong>Compliance:</strong> We regularly review and update our policies to comply with new legislation and
          industry standards.</p>
        <p><strong>Reporting Violations:</strong> Users can report violations of these policies by contacting our
          support team at <a href="mailto:support@example.com">support@example.com</a>.</p>
      </div>

      <div class="section contact-info">
        <h2>Contact Information</h2>
        <p>For any questions or concerns about our policies, please contact us at:</p>
        <p><strong>Email:</strong> <a href="mailto:saw.smc@example.com">saw.smc@example.com</a></p>
        <p><strong>Address:</strong>Yangon, Myanmar.</p>
      </div>
    </section>
  </main>
  <?php
  include ('footer.php');
  ?>
</body>

</html>