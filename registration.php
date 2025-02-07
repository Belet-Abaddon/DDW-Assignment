<!DOCTYPE html>
<?php
session_start();
include ("dbconnect.php");
if (isset($_POST['btnReg'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $sub = $_POST['sub'];


  if (isset($_FILES["nimg"]) && $_FILES["nimg"]["error"] == 0) {
    //Read file name
    $Filename = $_FILES["nimg"]["name"];
    //Read file path
    $Filepath = $_FILES["nimg"]["tmp_name"];
  }

  $sql = "INSERT INTO member (profile,name,email,password,city,subscription,usertype) VALUES ('$Filename','$name','$email','$password','$city','$sub',0) ";
  if ($conn->query($sql) == TRUE) {
    echo " Registration successfully ";
    move_uploaded_file($Filepath, "images/" . $Filename);
    $_SESSION['user'] = ["profile"=>$Filename,"name" => $name, "email" => $email, "password" => $password, "city" => $city, "sub" => $sub];
    header("location:home.php");
    exit();
  }

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
  </header>
  <main>
    <section id="contact">
      <h2>Registration</h2>
      <form action="#" method="POST" enctype="multipart/form-data">
        <label for="profile-pic">Profile Picture:</label>
        <input type="file" id="profile-pic" name="nimg" <?php echo isset($row['profile']) ? '' : 'required'; ?> />
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required />
        <label for="sub">Newsletter Subscription:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault1" value="1">
          <label class="form-check-label" for="flexRadioDefault1">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault2" value="0">
          <label class="form-check-label" for="flexRadioDefault2">No</label>
        </div>
        <button type="submit" name="btnReg" class="btn btn-primary">Register</button>
      </form>
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>
    </section>
  </main>
  <?php
  include('footer.php');
  ?>
</body>

</html>