<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$email = $_SESSION['user']['email'];
include ("dbconnect.php");

$sql = "SELECT * from services";
$resService = $conn->query($sql);

$sql2 = "SELECT * from newsletter";
$resNews = $conn->query($sql2);

$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
  $row1 = $resSub->fetch_assoc();
  $sub = $row1['subscription'];
}

if (isset($_POST['btnSub'])) {
  $sub = $_POST['sub'];
  $sql3 = "UPDATE member SET subscription = '$sub' WHERE email= '$email' ";
  if ($conn->query($sql3) == TRUE) {
    echo " Newsletter subscribed";
    header("location:home.php");
  }
}
?>

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
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="pics" src="images/bully4.jpg" class="d-block" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>Online Safety Campaign</h1>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="pics" src="images/mental_health.jpg" class="d-block" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>Online Safety Campaign</h1>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="pics" src="images/positive.jpg" class="d-block" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>Online Safety Campaign</h1>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>
  <main>
    <section id="home">
      <div class="title">
        <h2>Welcome to Our Campaign</h2>
        <form action="/search" method="get" class="search-input">
          <input type="text" id="search" name="search" placeholder="Search..." class="sec" />
          <button type="submit" class="sub"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
              fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg></button>
        </form>
        <p>Empowering teenagers to navigate the digital world safely.</p>
      </div>
      <div class="ser-new">
        <div class="service">
          <h2>Service</h2>
          <br>
          <?php
          if ($resService->num_rows > 0) {
            while ($rowSer = $resService->fetch_assoc()) {
              ?>
              <div class="User">
                <div class="User-img">
                  <img src="<?php echo "images/" . $rowSer['img']; ?>" alt="" width="100%" height="100%">
                </div>
                <div class="Uweb-service">
                  <h3><?php echo $rowSer['title']; ?></h3>
                  <p><?php echo $rowSer['description']; ?></p>
                  <p><strong><?php echo $rowSer['info']; ?></strong></p>
                  <a class="btn btn-light border-primary" href="#" role="button">Register Now</a>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
        <div class="Unew">
          <?php
          if ($sub == 1) {
            ?>
            <h2>News</h2>
            <br>
            <?php
            if ($resNews->num_rows > 0) {
              while ($rowNews = $resNews->fetch_assoc()) {
                ?>
                <div class="User-New">
                  <h3><?php echo $rowNews['title']; ?></h3>
                  <p><?php echo $rowNews['content']; ?></p>
                  <p><img src="<?php echo "images\\" . $rowNews['img']; ?>" width="200px"></p>
                  <p><strong><?php echo $rowNews['publishdate']; ?></strong></p>
                  <hr>
                  <div class="row">
                    <div class="col"><button type="button" class="reaction">Like</button></div>
                    <div class="col "><button type="button" class="reaction">Comment</button></div>
                    <div class="col"><button type="button" class="reaction">Share</button></div>
                  </div>
                </div>
                <hr>
                <?php
              }
            }
          } else {
            ?>
            <h2>News</h2>
            <form action="#" method="POST" id="contact">
              <label for="sub">Newsletter Subscription:</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault1" value="1">
                <label class="form-check-label" for="flexRadioDefault1">Yes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault2" value="0">
                <label class="form-check-label" for="flexRadioDefault2">No</label>
              </div>
              <button type="submit" name="btnReg" class="btn btn-primary">Submit</button>
              <!-- <label for="name">Newsletter Subscription:</label>
              <input type="radio" id="name" name="sub" value="1" required />Yes
              <input type="radio" id="name" name="sub" value="0" required />No
              <button type="submit" name="btnSub">Subscribe</button> -->
            </form>
          <?php }
          ?>
        </div>
      </div>


      <!-- <section class="popular-apps">
        <h3>Most Popular Social Media Apps</h3>
        <ul>
          <li>Instagram</li>
          <li>Facebook</li>
          <li>Twitter</li>
          <li>Snapchat</li>
          <li>TikTok</li>
          <li>WhatsApp</li>
        </ul>
      </section>
       -->

    </section>
  </main>
  <?php include ("footer.php"); ?>
</body>

</html>