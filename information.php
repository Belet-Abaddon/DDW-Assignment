<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
// Include dbconnect.php for session management and user profile picture retrieval
session_start();
include ("dbconnect.php");

$email = $_SESSION['user']['email'];

// Query to get the user's profile picture
$sql = "SELECT profile FROM member WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $profile_picture = $row['profile'];
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
    <section id="information">
      <h2>Information</h2><br>
      <div class="websiteInfo">
        <div class="infoImg">
          <img src="images/welcome.jpg" alt="">
        </div>
        <div class="infoP">
          <p>
            Welcome to the Information page of the Online Safety Campaign. Here,
            we provide details about our social media campaigns and their aims and
            vision to keep teenagers safe online.
          </p>
        </div>
      </div>
      <hr>
      <h3>Social Media Campaigns</h3><br>
      <div class="websiteInfo">

        <div class="infoP">
          <p>
            Our campaigns focus on empowering teenagers to navigate the digital
            world safely. We aim to create awareness about online risks and
            promote responsible use of social media platforms.
          </p>
        </div>
        <div class="infoImg">
          <img src="images/bsm.jpg" alt="">
        </div>
      </div>
      <hr>
      <h3>Aims and Vision</h3><br>
      <div class="websiteInfo">
        <div class="infoP" id="contact">
          <p>
            The primary aim of the Online Safety Campaign is to create a secure online environment where teenagers can
            thrive. We are committed to fostering positive online interactions and preventing harmful behaviors such as
            cyberbullying. By promoting digital literacy and ethical online behavior, we hope to instill a sense of
            responsibility and awareness in young individuals.
          </p>
        </div>
        <div class="infoP" id="contact">
          <p>Our vision is for teenagers to explore the digital landscape safely and confidently. We aim to reduce
            online harassment and exploitation by empowering young people to make informed decisions. By partnering with
            parents, educators, and other stakeholders, we strive to build a community founded on respect, kindness, and
            safety, upholding the highest standards of online safety.</p>
        </div>
      </div>
      <hr>
      <h1>Our Admin</h1>
      <br>
      <?php
      include ('dbconnect.php');
      $sql = "SELECT * FROM member";
      $row = $conn->query($sql);
      if ($row->num_rows > 0) {
        $counter = 0;
        while ($rowAdmin = $row->fetch_assoc()) {
          if ($rowAdmin['usertype'] == 1) {
            if ($counter % 4 == 0) {
              if ($counter != 0) {
                echo '</div>';
              }
              echo '<div class="admin">';
            }
            ?>

            <div class="aboutAdmin">
              <div class="adminImg">
                <img src="<?php echo "images/" . $rowAdmin['profile']; ?>" alt="profile">
              </div>
              <p><strong>Name :</strong><?php echo $rowAdmin['name']; ?></p>
              <p><strong>Email :</strong><?php echo $rowAdmin['email']; ?></p>
              <p><strong>Position :</strong><?php echo $rowAdmin['usertype'] == 1 ? "Admin" : "User"; ?></p>
            </div>

            <?php
            $counter++;
          }
        }
        if ($counter > 0) {
          echo '</div>';
        }
      }
      ?>
    </section>
  </main>

  <?php
  include ('footer.php');
  ?>
</body>

</html>