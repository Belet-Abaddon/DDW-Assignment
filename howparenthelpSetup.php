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
include ('dbconnect.php');
session_start();
$email = $_SESSION['user']['email'];
if (isset($_POST['btnSubmit'])) {
  $title=$_POST['title'];
  $des = $_POST['des'];
  if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] == 0) {
    //Read file name
    $Filename1 = $_FILES["img1"]["name"];
    //Read file path
    $Filepath1 = $_FILES["img1"]["tmp_name"];
  }
  if (isset($_FILES["img2"]) && $_FILES["img2"]["error"] == 0) {
    //Read file name
    $Filename2 = $_FILES["img2"]["name"];
    //Read file path
    $Filepath2 = $_FILES["img2"]["tmp_name"];
  }
  $sql = "INSERT INTO howparenthelp (title,description, image1, image2) VALUES ('$title','$des', '$Filename1', '$Filename2')";
  if ($conn->query($sql) == TRUE) {
    echo " Insert News letter setup successfully ";
    move_uploaded_file($Filepath1, "images/" . $Filename1);
    move_uploaded_file($Filepath2, "images/" . $Filename2);
    header("location:howparenthelpSetup.php");

    exit();
  }
}
if (isset($_POST['btnUpdate'])) {
  $id = $conn->real_escape_string($_POST['id']);
  $title=$conn->real_escape_string($_POST['title']);
  $des = $conn->real_escape_string($_POST['des']);
  $sql = "UPDATE howparenthelp SET description='$des'";

  if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] == 0) {
    $Filename1 = $_FILES["img1"]["name"];
    $Filepath1 = $_FILES["img1"]["tmp_name"];
    move_uploaded_file($Filepath1, "images/" . $Filename1);
    $sql .= ", image1='$Filename1'";
  }
  if (isset($_FILES["img2"]) && $_FILES["img2"]["error"] == 0) {
    $Filename2 = $_FILES["img2"]["name"];
    $Filepath2 = $_FILES["img2"]["tmp_name"];
    move_uploaded_file($Filepath2, "images/" . $Filename2);
    $sql .= ", image2='$Filename2'";
  }

  $sql .= " WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    header("location:howparenthelpSetup.php");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "DELETE from howparenthelp where id='$did'";
  if ($conn->query($sql) == True) {
    echo "<div> Delete One Record Successfully</div>";
    header("location:howparenthelpSetup.php");
  }
  if ($conn->query($sql) === TRUE) {
    header("location:howparenthelpSetup.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
if (isset($_GET['editid'])) {
  $eid = $conn->real_escape_string($_GET['editid']);
  $sql = "SELECT * FROM howparenthelp WHERE id='$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql = "SELECT * FROM howparenthelp";
  $result = $conn->query($sql);
}
$sql1 = "SELECT * from howparenthelp";
$result = $conn->query($sql1);

?>

<body>
<?php
  include('adminNav.php');
  ?>
  <header>
    <h1>HowParentHelp Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>"
          required>
        <label for="des">Description:</label>
        <textarea name="des" id="des" rows="5"
          required><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>
        <label for="img1">Image1:</label>
        <input type="file" name="img1" id="img1" <?php echo isset($row['image1']) ? '' : 'required'; ?>>

        <label for="img2">Image2:</label>
        <input type="file" name="img2" id="img2" <?php echo isset($row['image2']) ? '' : 'required'; ?>>

        <?php
        if (isset($_GET['editid'])) {
          ?>
          <input type="submit" value="Update" name="btnUpdate" class="buttom">
          <?php
        } else {
          ?>
          <input type="submit" value="Save" name="btnSubmit" class="buttom">
          <?php
        }
        ?>
      </form>
    </section>
    <?php
    if ($result->num_rows > 0) {
      ?>
      <section>
        <table class="table table-striped-columns table-primary">
          <tr>
            <th>ID</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo "images/" . $row['image1']; ?>" width="100px" height="100px" alt=""></td>
              <td><img src="<?php echo "images/" . $row['image2']; ?>" width="100px" height="100px" alt=""></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td>
                <a class="btn btn-primary" href="howparenthelpSetup.php?editid=<?php echo $row['id']; ?>"
                  role="button">Edit</a><br>
                <a class="btn btn-danger" href="howparenthelpSetup.php?deleteid=<?php echo $row['id']; ?>"
                  role="button">Delete</a>
              </td>
            </tr>
            <?php
          }
          ?>
        </table>
      </section>
      <?php
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