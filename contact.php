<!DOCTYPE html>

<?php
session_start();
$email = $_SESSION['user']['email'];
include ("dbconnect.php");
if (isset($_POST['btnMsg'])) {
  $msg = $_POST['msg'];
  $sql = " INSERT INTO contactus (message,email) VALUES ('$msg','$email') ";
  if ($conn->query($sql)) {
    echo " Send Message successfully";
    header("location:contact.php");
  }
}

$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
  $row1 = $resSub->fetch_assoc();
  $sub = $row1['subscription'];
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include ('userNav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>Contact Us</h2>
      <p>
        Feel free to reach out to us using the contact form below. We
        appreciate your feedback and inquiries.
      </p>

      <!-- Contact Form -->
      <form action="#" method="post">

        <label for="message">Message:</label>
        <textarea id="message" rows="4" name="msg" required></textarea>

        <button type="submit" name="btnMsg" class="btn btn-primary">Send Message</button>
      </form>

      <!-- Privacy Policy Link -->
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>
    </section>
  </main>
  <?php
  include ('footer.php');
  ?>
</body>

</html>