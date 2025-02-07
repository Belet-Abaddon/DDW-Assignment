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
session_start(); // Start the session
$email = $_SESSION['user']['email'];
if (isset($_POST['btnSubmit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  if (isset($_FILES["nimg"]) && $_FILES["nimg"]["error"] == 0) {
    //Read file name
    $Filename = $_FILES["nimg"]["name"];
    //Read file path
    $Filepath = $_FILES["nimg"]["tmp_name"];
  }
  $sql = "INSERT INTO newsletter (title, content, img) VALUES ('$title', '$content', '$Filename')";
  if ($conn->query($sql) == TRUE) {
    echo " Insert News letter setup successfully ";
    move_uploaded_file($Filepath, "images/" . $Filename);
    header("location:newsletterSetup.php");
  }
}
if (isset($_POST['btnUpdate'])) {
  $id = $conn->real_escape_string($_POST['id']);
  $title = $conn->real_escape_string($_POST['title']);
  $content = $conn->real_escape_string($_POST['content']);
  $sql = "";

  if (isset($_FILES["nimg"]) && $_FILES["nimg"]["error"] == 0) {
    $Filename = $_FILES["nimg"]["name"];
    $Filepath = $_FILES["nimg"]["tmp_name"];
    move_uploaded_file($Filepath, "images/" . $Filename);
    $sql = "UPDATE newsletter SET title='$title', content='$content', img='$Filename' WHERE id='$id'";
  } else {
    $sql = "UPDATE newsletter SET title='$title', content='$content' WHERE id='$id'";
  }

  if ($conn->query($sql) === TRUE) {
    header("location:newsletterSetup.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "DELETE from newsletter where id='$did'";
  if ($conn->query($sql) == True) {
    echo "<div> Delete One Record Successfully</div>";
    header("location:newsletterSetup.php");
  }
  if ($conn->query($sql) === TRUE) {
    header("location:newsletterSetup.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
if (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "SELECT * FROM newsletter WHERE id='$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql = "SELECT * FROM newsletter";
  $result = $conn->query($sql);
}
$sql1 = "SELECT * from newsletter";
$result = $conn->query($sql1);

?>

<body>
<?php
  include('adminNav.php');
  ?>
  <header>
    <h1>NewsLetter Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <label for="name">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>"
          required>
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="5"
          required><?php echo isset($row['content']) ? $row['content'] : ''; ?></textarea>
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
            <th>Image</th>
            <th>Title</th>
            <th>Content</th>
            <th>Publish Date</th>
            <th>Action</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo "images/" . $row['img']; ?>" width="100px" height="100px" alt=""></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['content']; ?></td>
              <td><?php echo $row['publishdate']; ?></td>
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
</body>

</html>