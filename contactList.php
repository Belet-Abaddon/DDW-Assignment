<!DOCTYPE html>
<?php
include ('dbconnect.php');
session_start();
$email=$_SESSION['user']['email'];
$sql1 = "SELECT * from contactus";
$result = $conn->query($sql1);

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
  include('adminNav.php');
  ?>
  <header>

  </header>

  <main>
    <section id="home">
      <?php
      if ($result->num_rows > 0) {
        ?>
        <h2>Help/Support List</h2>
        <table class="table table-striped-columns table-primary">
          <tr>
            <th>Id</th>
            <th>Message</th>
            <th>Email</th>
            <th>Date</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['message']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['sentdate']; ?></td>

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

    </section>
  </main>

  <?php
  include ("footer.php");
  ?>
</body>

</html>