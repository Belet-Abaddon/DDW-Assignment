<!DOCTYPE html>
<html lang="en">
<?php
require_once ("dbconnect.php");

session_start();
$wrongPassword = isset($_GET['wrongPassword']);
$invalidCredentials = isset($_GET['invalidCredentials']);
$wait = false;
if (isset($_POST['btnLogin'])):
  if (isset($_SESSION['login_attempt_time'])) {
    $loginAttemptTime = $_SESSION['login_attempt_time'];
  } else {
    $loginAttemptTime = 0;
  }
  $email = $_POST['email'];
  $sql = "SELECT * FROM member WHERE email = '$email'";

  try {
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (isset($row) and $row['password'] == $_POST['password']):
      $_SESSION['user'] = $row;
      $_SESSION['usertype'] = $row['usertype'];
      if ($row['usertype'] == 1):
        header("location:adminhome.php");
        exit();
      else:
        $_SESSION['email'] = $email;
        header("location:home.php");
        exit();
      endif;
    else:
      $wrongPassword = true;
      $_SESSION['login_attempt_time'] = $loginAttemptTime + 1;
      $_SESSION['login_attempt_time_expires'] = time() + (60 * 1);
      header("location:login.php?wrongPassword=1&invalidCredentials=1");
      exit();
    endif;
  } catch (Exception $err) {
    $invalidCredentials = true;
    $_SESSION['login_attempt_time'] = $loginAttemptTime + 1;
    $_SESSION['login_attempt_time_expires'] = time() + (60 * 1);
    header("location:login.phpwrongPassword=1&invalidCredentials=1");
    exit();
  }


endif;
if (isset($_SESSION['login_attempt_time']) and isset($_SESSION['login_attempt_time_expires'])):
  if ($_SESSION['login_attempt_time_expires'] < time()) {
    unset($_SESSION['login_attempt_time']);
    unset($_SESSION['login_attempt_time_expires']);
    $wait = false;
  } else {
    if ($_SESSION['login_attempt_time'] >= 3) {
      $wait = true;
    } else {
      $wait = false;
    }
    ;
  }
else:
  $wait = false;
endif;
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
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
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>Login</h2>
      <!-- Contact Form -->
      <form action="#" method="POST" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="message">Password:</label>
        <input type="password" id="email" name="password" required />

        <?= ($wrongPassword or $invalidCredentials) ? '<span class="text-danger">Invalid Credentials</span>' : "" ?>
        <?= $wait ? '<span class="text-danger">You can try agin in 5 minutes.</span>' : "" ?>

        <?php if ($wait): ?>
          <button disabled type="submit" id="btnLogin" class="bg-danger text-light pe-none "
            name="btnLogin">Login</button>
        <?php else: ?>
          <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
        <?php endif; ?>
      </form>
      <br>
      Not a member register <a href="registration.php"> here </a>
      <!-- Privacy Policy Link -->
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>
    </section>
  </main>

  <?php
  include ("footer.php");
  ?>
</body>

</html>