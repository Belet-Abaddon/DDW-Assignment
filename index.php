<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

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
    <div id="carouselExampleCaptions" class="carousel Slide">
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

    <!-- Custom Cursors and 3D Illustrations can be added here -->
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
      <!-- <div class="container "> -->
      <div class="container">
        <?php
        // session_start();
        // $email = $_SESSION['user']['email'];
        include ('dbconnect.php');
        $sql = "SELECT * FROM services";
        $resService = $conn->query($sql);
        if ($resService->num_rows > 0) {
          $counter = 0; // Initialize counter
          while ($rowSer = $resService->fetch_assoc()) {
            if ($rowSer['display'] == 1) {
              if ($counter % 2 == 0) { // Start a new row every 2 columns
                if ($counter != 0) { // Close previous row if not the first
                  echo '</div>';
                }
                echo '<div class="row w-100">';
              }
              ?>
              <div class="col-6 pb-5">
                <div class="web-service">
                  <div class="asawlay p-3">
                    <h3><b><?php echo $rowSer['title']; ?></b></h3>
                    <p><?php echo $rowSer['description']; ?></p>
                    <p><strong><?php echo $rowSer['info']; ?></strong></p>
                    <a class="btn btn-light border-primary" href="#" role="button">Register Now</a>
                  </div>
                  <img src="<?php echo "images/" . $rowSer['img']; ?>" alt="">
                </div>
              </div>
              <?php
              $counter++; // Increment counter
            }
          }
          echo '</div>'; // Close the last row
        }
        ?>
      </div>
      <hr>
      <div class="container text-center">
        <h1>Social Media Apps</h1>
        <br>
        <?php
        $sql = "SELECT * FROM socialmediaapps";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
          $counter = 0; // Initialize counter
          while ($row = $res->fetch_assoc()) {
            if ($counter % 7 == 0) { // Start a new row every 5 columns
              if ($counter != 0) { // Close previous row if not the first
                echo '</div>';
              }
              echo '<div class="row w-100">';
            }
            ?>
            <div class="col">
              <img src="<?php echo "images\\" . $row['logo']; ?>" class="media-logo rounded-4">
              <p class="name"><strong><?php echo $row['name']; ?></strong></p>
            </div>
            <?php
            $counter++; // Increment counter
          }
          echo '</div>'; // Close the last row
        }
        ?>
      </div>
    </section>
  </main>
  <script>
    const containerTags = document.getElementsByClassName("web-service");
    const containerUpFunction = (event) => {
      const asawlayTag = event.currentTarget.querySelector(".asawlay");
      asawlayTag.classList.add("asawlayup");
    };
    const containerDownFunction = (event) => {
      const asawlayTag = event.currentTarget.querySelector(".asawlay");
      asawlayTag.classList.toggle("asawlayup");
    };
    Array.from(containerTags).forEach(container => {
      container.addEventListener("mouseenter", containerUpFunction);
      container.addEventListener("mouseleave", containerDownFunction);
    });
  </script>
  <?php include ('footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>