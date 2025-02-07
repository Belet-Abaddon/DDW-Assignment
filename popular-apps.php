<!DOCTYPE html>

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

$sql1 = "SELECT * from socialmediaapps";
$result = $conn->query($sql1);

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
    <section id="popular-apps">
      <h2>Most Popular Social Media Apps</h2>
      <br>
      <?php
      if ($result->num_rows > 0) {
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
          if ($counter % 4 == 0) {
            if ($counter != 0) {
              echo '</div> <br>';
            }
            echo '<div class="admin">';
          }
          ?>

          <div class="aboutAdmin">
            <div class="adminImg">
              <img src="<?php echo "images\\" . $row['logo']; ?>" alt="profile">
            </div>
            <p><strong>Name :</strong><?php echo $row['name']; ?></p>
            <p>
              <a href="<?php echo $row['link']; ?>"> Facebook Login </a>
            </p>
            <p><strong><a href="<?php echo $row['privacylink']; ?>"> Privacy Settings </a></strong> </p>
          </div>

          <?php
          $counter++;
        }
      }
      if ($counter > 0) {
        echo '</div>';
      }
      ?>
      <hr>
      <div class="Legislation">
      <div class="Lp">
        <h3><strong>How to Stay Safe Online</strong></h3>
        <br>
        <p>Follow these tips to ensure a secure online experience:</p>
          <ul>
            <li>Set strong, unique passwords</li>
            <li>Enable two-factor authentication</li>
            <li>Be cautious about sharing personal information</li>
            <li>Regularly update privacy settings</li>
            <li>Use antivirus software</li>
            <li>Verify the authenticity of online information</li>
          </ul>
      </div>
      <div class="Limg">
        <img src="images/smLaw.jpg" alt="">
      </div>
    </div>

    </section>
  </main>
  <?php
  include ('footer.php');
  ?>
</body>

</html>