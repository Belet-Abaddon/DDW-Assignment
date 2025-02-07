<!DOCTYPE html>
<?php
include ('dbconnect.php');
session_start();
$email = $_SESSION['user']['email'];

$sql1 = "SELECT * from member";
$result = $conn->query($sql1);
if (isset($_GET['changeRole'])):
  $roleToUpdate = $_GET['roleToChange'];
  $userId = $_GET['userId'];
  $sql = "UPDATE member SET usertype = $roleToUpdate WHERE id = $userId";
  $conn->query($sql);
  header("location:MemberList.php");
  exit();
endif;

if (isset($_GET['deleteUser']) and isset($_GET['userId'])):
  $userId = $_GET['userId'];
  $conn->query("
    DELETE FROM member WHERE id = $userId
  ");
  header("location:MemberList.php");
endif;
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
    <h1>MemberList</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section>
      <?php
      if ($result->num_rows > 0) {
        ?>
        <h2>Member List</h2>
        <table class="table table-striped-columns table-primary">
          <tr>
            <th>Id</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>City</th>
            <th>Newsletter Subscription</th>
            <th>User Type</th>
            <th>Change Role</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
            // Define the path to the profile picture
            ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo "images/" . $row['profile']; ?>" width="100px" height="100px" alt=""></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['subscription'] == 1 ? "Yes" : "No"; ?></td>
              <td><?php echo $row['usertype'] == 1 ? "Admin" : "User"; ?></td>
              <td class="promote h-100">
                <?php if($row['usertype'] == 1) : ?>
                <a href="MemberList.php?changeRole=1&userId=<?= $row['id'] ?>&roleToChange=0 " class="btn btn-primary btn-sm mt-1 mb-2  w-100">Demote to User</a>
                <?php else : ?>
                <a href="MemberList.php?changeRole=1&userId=<?= $row['id'] ?>&roleToChange=1" class="btn btn-primary btn-sm mt-1 mb-2  w-100">Promote to Admin</a>
                <?php endif; ?>
                <a href="MemberList.php?deleteUser=1&userId=<?= $row['id'] ?>" class="btn btn-danger btn-sm w-100">Ban User</a>
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

    </section>
  </main>

  <?php
  include ("footer.php");
  ?>
</body>

</html>