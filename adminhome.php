<!DOCTYPE html>
<html lang="en">
<?php
session_start(); // Start the session
include ("dbconnect.php");
$email = $_SESSION['user']['email'];


$sql = "SELECT COUNT(id) AS total FROM member";
$resMember = $conn->query($sql);
$row = $resMember->fetch_assoc();
$totalMembers = $row['total'];

$sql1 = "SELECT COUNT(id) AS total FROM services";
$resServices = $conn->query($sql1);
$row = $resServices->fetch_assoc();
$totalServices = $row['total'];

$sql2 = "SELECT COUNT(id) AS total FROM newsletter";
$resNews = $conn->query($sql2);
$row = $resNews->fetch_assoc();
$totalNews = $row['total'];

$sql3 = "SELECT COUNT(id) AS total FROM contactus";
$res = $conn->query($sql3);
$row = $res->fetch_assoc();
$totalFeedback = $row['total'];
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
  <?php
  include ('adminNav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="home" class="con">
      <h2>Welcome to Our Campaign</h2>
      <div class="row w-100">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
          <div class="widget-stat count bg-primary">
            <div class="card-body">
              <div class="media">
                <span class="me-3">
                  <i class="la la-users"></i>
                </span>
                <div class="media-body text-white">
                  <p class="mb-1">Total Member</p>
                  <h3 class="text-white"><?php echo $totalMembers; ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
          <div class="widget-stat count bg-warning">
            <div class="card-body">
              <div class="media">
                <span class="me-3">
                  <i class="la la-user"></i>
                </span>
                <div class="media-body text-white">
                  <p class="mb-1">Total Services</p>
                  <h3 class="text-white"><?php echo $totalServices; ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
          <div class="widget-stat count bg-secondary">
            <div class="card-body">
              <div class="media">
                <span class="me-3">
                  <i class="la la-graduation-cap"></i>
                </span>
                <div class="media-body text-white">
                  <p class="mb-1">Total News</p>
                  <h3 class="text-white"><?php echo $totalNews; ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
          <div class="widget-stat count bg-danger">
            <div class="card-body">
              <div class="media">
                <span class="me-3">
                  <i class="la la-dollar"></i>
                </span>
                <div class="media-body text-white">
                  <p class="mb-1">Total Feedback</p>
                  <h3 class="text-white"><?php echo $totalFeedback; ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row w-100">
        <div class="col tag border border-dark m-3 ">
          <div class="icon "><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="bi bi-person-fill-gear m-3" viewBox="0 0 16 16">
              <path
                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
            </svg></div>
          <div class="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur itaque quas inventore
              iste maxime aliquid ipsam nostrum laboriosam, deserunt culpa ducimus reiciendis, officia minima at nobis.
              Error, quam molestias!</p>
          </div>
        </div>
        <div class="col tag border border-dark m-3 ">
          <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-newspaper m-3"
              viewBox="0 0 16 16">
              <path
                d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
              <path
                d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
            </svg></div>
          <div class="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur itaque quas inventore
              iste maxime aliquid ipsam nostrum laboriosam, deserunt culpa ducimus reiciendis, officia minima at nobis.
              Error, quam molestias!</p>
          </div>
        </div>
        <div class="col tag border border-dark m-3">
          <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="bi bi-person-raised-hand m-3" viewBox="0 0 16 16">
              <path
                d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a1 1 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207" />
              <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
            </svg></div>
          <div class="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur itaque quas inventore
              iste maxime aliquid ipsam nostrum laboriosam, deserunt culpa ducimus reiciendis, officia minima at nobis.
              Error, quam molestias!</p>
          </div>
        </div>
      </div>
      <div class="row w-100">
        <div class="col tag border border-dark m-3">
          <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-window-plus m-3"
              viewBox="0 0 16 16">
              <path
                d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
              <path
                d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
              <path
                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
            </svg></div>
          <div class="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur itaque quas inventore
              iste maxime aliquid ipsam nostrum laboriosam, deserunt culpa ducimus reiciendis, officia minima at nobis.
              Error, quam molestias!</p>
          </div>
        </div>
        <div class="col tag border border-dark m-3">
          <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-dots m-3"
              viewBox="0 0 16 16">
              <path
                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
              <path
                d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
            </svg></div>
          <div class="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur itaque quas inventore
              iste maxime aliquid ipsam nostrum laboriosam, deserunt culpa ducimus reiciendis, officia minima at nobis.
              Error, quam molestias!</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php
  include ("footer.php");
  ?>
</body>

</html>