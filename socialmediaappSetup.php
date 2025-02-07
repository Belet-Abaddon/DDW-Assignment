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
<?php
session_start();
include ("dbconnect.php");
$email = $_SESSION['user']['email'];
if (isset($_POST['btnSave'])) {
  $name = $_POST['name'];
  $link = $_POST['llink'];
  $plink = $_POST['plink'];

  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    // Real file name
    $filename = $_FILES["logo"]["name"];
    // file path
    $filepath = $_FILES["logo"]["tmp_name"];
    move_uploaded_file($filepath, "images/" . $filename);
  }

  $sql = "INSERT INTO socialmediaapps (name,logo,link,privacylink) VALUES ('$name','$filename','$link','$plink') ";
  if ($conn->query($sql)) {
    header("location:socialmediaappSetup.php");
  }

}
if (isset($_POST['btnUpdate'])) {
  $id = $conn->real_escape_string($_POST['id']);
  $name = $conn->real_escape_string($_POST['name']);
  $link = $conn->real_escape_string($_POST['llink']);
  $plink = $conn->real_escape_string($_POST['plink']);
  $sql = "";

  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    $filename = $_FILES["logo"]["name"];
    $filepath = $_FILES["logo"]["tmp_name"];
    move_uploaded_file($filepath, "images/" . $filename);
    $sql = "UPDATE socialmediaapps SET name='$name',  logo='$filename', link='$link', privacylink='$plink' WHERE id='$id'";
  } else {
    $sql = "UPDATE socialmediaapps SET name='$name', link='$link', privacylink='$plink' WHERE id='$id'";
  }

  if ($conn->query($sql) === TRUE) {
    header("location:socialmediaappSetup.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "DELETE from socialmediaapps where id='$did'";
  if ($conn->query($sql) == True) {
    echo "<div> Delete One Record Successfully</div>";
    header("location:socialmediaappSetup.php");
  }
  if ($conn->query($sql) === TRUE) {
    header("location:socialmediaappSetup.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
if (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "SELECT * FROM socialmediaapps WHERE id='$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql = "SELECT * FROM socialmediaapps";
  $result = $conn->query($sql);
}
$sql1 = "SELECT * from socialmediaapps";
$result = $conn->query($sql1);

?>

<body>
  <?php
  include ('adminNav.php');
  ?>
  <header>
    <h1>Social Media Apps Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>Social Media Apps Set up</h2>

      <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>"
          required />

        <label for="name">Logo:</label>
        <input type="file" id="name" name="logo" value="<?php echo isset($row['logo']) ? $row['logo'] : ''; ?>"
          required />

        <label for="name">Login Link:</label>
        <input type="text" id="name" name="llink" value="<?php echo isset($row['link']) ? $row['link'] : ''; ?>"
          required />

        <label for="name">Privacy Setting Link:</label>
        <input type="text" id="name" name="plink"
          value="<?php echo isset($row['privacylink']) ? $row['privacylink'] : ''; ?>" required />

        <?php
        if (isset($_GET['editid'])) {
          ?>
          <input type="submit" value="Update" name="btnUpdate" class="buttom">
          <?php
        } else {
          ?>
          <input type="submit" value="Save" name="btnSave" class="buttom">
          <?php
        }
        ?>
      </form>
    </section>
    <br><br>
    <hr>
    <?php
    if ($result->num_rows > 0) {
      ?>
      <h2> Popular social media apps </h2>
      <table class="table table-striped-columns table-primary">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Logo</th>
          <th>Login Link</th>
          <th>Privacy Setting Link</th>
          <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px"></td>
            <td><?php echo $row['link']; ?></td>
            <td><?php echo $row['privacylink']; ?></td>
            <td>
              <a class="btn btn-primary" href="socialmediaappSetup.php?editid=<?php echo $row['id']; ?>"
                role="button">Edit</a><br>
              <a class="btn btn-danger" href="socialmediaappSetup.php?deleteid=<?php echo $row['id']; ?>"
                role="button">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </table>
      <?php
    } else {
      echo " There is no data";
    }
    ?>

  </main>

  <?php
  include ('footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>