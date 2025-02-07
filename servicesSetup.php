<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include ("dbconnect.php");
$email = $_SESSION['user']['email'];
if (isset($_POST['btnSubmit'])) {
  $title = $_POST['title'];
  $des = $_POST['des'];
  $info = $_POST['info'];
  $display = $_POST['sub'];
  if (isset($_FILES["nimg"]) && $_FILES["nimg"]["error"] == 0) {
    //Read file name
    $Filename = $_FILES["nimg"]["name"];
    //Read file path
    $Filepath = $_FILES["nimg"]["tmp_name"];
  }
  $sql = "INSERT INTO services (img, title,description,info,display) VALUES ('$Filename','$title','$des','$info','$display') ";
  if ($conn->query($sql)) {
    echo " Insert Service setup successfully ";
    move_uploaded_file($Filepath, "images/" . $Filename);
    header("location:servicesSetup.php");
  }

}
if (isset($_POST['btnUpdate'])) {
  $id = $conn->real_escape_string($_POST['id']);
  $title = $conn->real_escape_string($_POST['title']);
  $des = $conn->real_escape_string($_POST['des']);
  $info = $conn->real_escape_string($_POST['info']);
  $display = $conn->real_escape_string($_POST['sub']);
  $sql = "";

  if (isset($_FILES["nimg"]) && $_FILES["nimg"]["error"] == 0) {
    $Filename = $_FILES["nimg"]["name"];
    $Filepath = $_FILES["nimg"]["tmp_name"];
    move_uploaded_file($Filepath, "images/" . $Filename);
    $sql = "UPDATE services SET title='$title', description='$des',info='$info',display='$display', img='$Filename' WHERE id='$id'";
  } else {
    $sql = "UPDATE services SET title='$title', description='$des',info='$info',display='$display' WHERE id='$id'";
  }

  if ($conn->query($sql) === TRUE) {
    header("location:servicesSetup.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "DELETE from services where id='$did'";
  if ($conn->query($sql) == True) {
    echo "<div> Delete One Record Successfully</div>";
    header("location:servicesSetup.php");
  }
  if ($conn->query($sql) === TRUE) {
    header("location:servicesSetup.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
if (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "SELECT * FROM services WHERE id='$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql = "SELECT * FROM services";
  $result = $conn->query($sql);
}
$sql1 = "SELECT * from services";
$result = $conn->query($sql1);

?>

<body>
  <?php
  include ('adminNav.php');
  ?>
  <header>
    <h1>Services Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">

      <!-- Contact Form -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <label for="image">Image:</label>
        <input type="file" name="nimg" id="nimg" <?php echo isset($row['img']) ? '' : 'required'; ?>>
        <?php
        if (isset($_GET['editid'])) {
          ?>
          <img src="<?php echo "images\\" . $row['img']; ?>" width="200px" height="200px" alt="">
          <?php
        } else {
          ?>
          <img src="<?php echo "images\\" . $row['img']; ?>" alt="" hidden>
          <?php
        }
        ?>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>"
          required />

        <label for="des">Description:</label>
        <textarea id="des" name="des" rows="4"
          required><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>

        <label for="info">Info:</label>
        <textarea id="info" name="info" rows="4"
          required><?php echo isset($row['info']) ? $row['info'] : ''; ?></textarea>
        <label for="sub">Display on before login home page:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault1" value="1">
          <label class="form-check-label" for="flexRadioDefault1">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sub" id="flexRadioDefault2" value="0">
          <label class="form-check-label" for="flexRadioDefault2">No</label>
        </div>
        <?php
        if (isset($_GET['editid'])) {
          ?>
          <input type="submit" value="Update" name="btnUpdate" class="buttom">
          <?php
        } else {
          ?>
          <input type="submit" value="Submit" name="btnSubmit" class="buttom">
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
      <h2> Services List </h2>
      <table class="table table-striped-columns table-primary">
        <tr>
          <th>Id</th>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Information</th>
          <th>Created At</th>
          <th>Display</th>
          <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="<?php echo "images/" . $row['img']; ?>" width="100px" height="100px" alt=""></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['info']; ?></td>
            <td><?php echo $row['createdat']; ?></td>
            <td><?php echo $row['display']; ?></td>
            <td>
              <a class="btn btn-primary" href="servicesSetup.php?editid=<?php echo $row['id']; ?>"
                role="button">Edit</a><br>
              <a class="btn btn-danger" href="servicesSetup.php?deleteid=<?php echo $row['id']; ?>" role="button">Delete</a>
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
</body>

</html>