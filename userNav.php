<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg " id="nav">
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
                    <a class="link " href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="link " href="information.php">Information</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="link data-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Campaigns</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="popular-apps.php">Popular-app</a></li>
                        <li><a class="dropdown-item" href="parents-help.php">Parents Help</a></li>
                        <li><a class="dropdown-item" href="livestreaming.php">Livestreaming</a></li>
                    </ul>
                </li>
                <!-- updateing-->
                <li class="nav-item">
                    <a class="link " href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="link " href="legislation.php">Legislation</a>
                </li>
                <li class="nav-item">
                    <a class="link " href="logout.php">Logout</a>
                </li>
            </ul>
            <div class="pf">
                <?php if (isset($row1['profile']) && !empty($row1['profile'])): ?>
                    <img src="<?php echo "images/" . $_SESSION['user']['profile'] ?>" alt="Profile Picture" class="wh" />
                <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle wh"
                        viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                <?php endif; ?>
            </div>

        </div>
    </nav>

</body>

</html>