<!DOCTYPE html>
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
  include ('userNav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="livestreaming">
      <div class="LS">
        <div class="Video">
          <h2>How to use social media safety?</h2>
          <br>
          <div class="YT">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/vPlWDFtP0T0?si=5YpK1ubIqEDKuZPY"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
          <br>
          <h2>How to stay safe on social media?</h2>
          <br>
          <div class="YT">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/wBptll2iSkw?si=fuIUMd0ZAt2URvYX"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <div class="webSource">
          <br>
          <h2>Social Media Safety Tips</h2>
          <ol>
            <li>
              <h4>Privacy Settings</h4>
              <ul>
                <li>Check and update privacy settings regularly to control who can see your posts and personal
                  information.</li>
                <li>Limit the audience for your posts to friends or specific groups rather than the public.</li>
              </ul>
            </li>
            <li>
              <h4>Strong Passwords</h4>
              <ul>
                <li>Use strong, unique passwords for each of your social media accounts.</li>
                <li>Consider using a password manager to keep track of them.</li>
              </ul>
            </li>
            <li>
              <h4>Be Cautious with Personal Information</h4>
              <ul>
                <li>Avoid sharing sensitive information such as your home address, phone number, or financial details.
                </li>
                <li>Be mindful of what you post, as even seemingly harmless information can be misused.</li>
              </ul>
            </li>
            <li>
              <h4>Recognize and Avoid Scams</h4>
              <ul>
                <li>Be wary of messages or friend requests from people you don't know.</li>
                <li>Avoid clicking on suspicious links or downloading attachments from unknown sources.</li>
              </ul>
            </li>
            <li>
              <h4>Secure Your Accounts</h4>
              <ul>
                <li>Enable two-factor authentication (2FA) for an extra layer of security.</li>
                <li>Regularly review your account activity and log out of devices you no longer use.</li>
              </ul>
            </li>
            <li>
              <h4>Think Before You Post</h4>
              <ul>
                <li>Remember that once something is posted online, it can be difficult to remove.</li>
                <li>Consider how your posts might be perceived by others and the potential long-term consequences.</li>
              </ul>
            </li>
            <li>
              <h4>Report and Block Abusive Users</h4>
              <ul>
                <li>Use the platform's tools to report and block users who harass or threaten you.</li>
                <li>Keep a record of any abusive messages or interactions.</li>
              </ul>
            </li>
            <li>
              <h4>Educate Yourself</h4>
              <ul>
                <li>Stay informed about the latest social media trends and safety tips.</li>
                <li>Follow reputable sources that provide advice on online safety.</li>
              </ul>
            </li>
          </ol>

        </div>
      </div>
    </section>
  </main>
  <?php
  include ('footer.php');
  ?>
</body>

</html>