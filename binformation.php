<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>

  <link rel="stylesheet" href="style.css">
</head>
<?php
include ('dbconnect.php');
session_start();
$sql = "SELECT * FROM member";
$row = $conn->query($sql);
?>

<body>
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand  " href="#">
      <img src="images/logo.png" width="80px" height="70px" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <li class="nav-item  ">
          <a class="link " href="index.php">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="link " href="binformation.php">Information</a>
        </li>
        <li class="nav-item">
          <a class="link " href="blegislation.php">Legislation</a>
        </li>
        <li class="nav-item">
          <a class="link " href="login.php">Login</a>
        </li>
      </ul>
      <div class="pf">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle wh" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
          <path fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
        </svg>
      </div>

    </div>
  </nav>
  <header>
    <div class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61115.990966572885!2d96.18105778166502!3d16.789137185788462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1721754084674!5m2!1sen!2smm"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <br>
    <div class="location">
      <div class="companyInfor">
        <p><strong>Location :</strong> Yangon, Myanmar.</p>
      </div>
      <div class="adminInfo">
        <p>If you want to work as admin, contact to currently admins' email.</p>
      </div>
    </div>
    <h1>Online Safety Campaign</h1>
    <form action="/search" method="get" class="search-input">
      <input type="text" id="search" name="search" placeholder="Search..." class="sec" />
      <button type="submit" class="sub"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
          fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path
            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg></button>
    </form>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="information">

      <?php
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
      <hr>
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
    </section>
  </main>

  <?php
  include ("footer.php");
  ?>
</body>

</html>