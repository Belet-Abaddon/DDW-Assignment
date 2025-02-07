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
$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
  $row1 = $resSub->fetch_assoc();
  $sub = $row1['subscription'];
}
$sql = "SELECT * FROM howparenthelp";
$resHelp = $conn->query($sql);
?>

<body>
  <?php
  include ('userNav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="parents-help">
      <div class="HparentWall">
        <?php
        if ($resHelp->num_rows > 0) {
          while ($rowH = $resHelp->fetch_assoc()) {
            ?>
            <div class="card">
              <input type="checkbox" class="ch">
              <h2><strong><?php echo $rowH['title']; ?></strong></h2>
                <div class="content">
                  <p><?php echo $rowH['description']; ?></p>
                  <label class="lab"><strong>Show less</strong></label>
                </div>
                <label class="lab"><strong>Read More</strong></label>
                <div class="card-img">
                  <div class="Cimg">
                    <img src="<?php echo "images/" . $rowH['image1']; ?>" alt="">
                  </div>
                  <div class="Cimg">
                    <img src="<?php echo "images/" . $rowH['image2']; ?>" alt="">
                  </div>
                </div>
                <div class="Like">
                  <button><p>Like</p></button>
                </div>
            </div>
            <hr>
            <?php
          }
        }
        ?>
      </div>
      <h2>How Parents Can Help</h2>
      <p>
        Discover top tips for parents to support healthy teen use of social
        media.
      </p>
      <!-- Add content with tips for parents -->
      <ul>
        <li>Stay involved and communicate openly with your teenager.</li>
        <li>
          Set boundaries and establish clear rules for social media use.
        </li>
        <li>
          Teach the importance of privacy settings and online etiquette.
        </li>
        <li>
          Monitor your teen's online activities without invading their
          privacy.
        </li>
        <li>
          Encourage a healthy balance between online and offline activities.
        </li>
      </ul>
      <!-- Add more tips or content as needed -->
    </section>
  </main>
  <?php
  include ('footer.php');
  ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      let checkboxes = document.querySelectorAll('.ch');
      let counter = 0;

      checkboxes.forEach(function (checkbox) {
        counter++;
        let uniqueId = 'ch' + counter;
        checkbox.id = uniqueId;

        let labels = checkbox.parentElement.querySelectorAll('.lab');
        labels.forEach(function (label) {
          label.setAttribute('for', uniqueId);
        });
      });
    });

  </script>
</body>

</html>