<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include 'database.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mitCss.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <?php
        if(isset($_SESSION['username'])) {
            $stmt = $con->prepare("SELECT * FROM users WHERE userId = $_SESSION[uid]");
            $stmt->execute();
            while($row = $stmt->fetch()){

                ?>
        <h2>Velkommen <?= $row['username'] ?></h2>
        <?php
            }
        }
        ?>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>
                <?php
                // Her tjekker vi om session variablen username er sat eller ikke er sat
                if (!isset($_SESSION['username'])) {
                ?>
                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                    <li><a href='register.php' class='loginBtn'>Opret bruger</a></li>
                <?php
                } else{
                    ?>
                    <li><a href='includes/logout.php'>Log ud</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
    } else{
        ?>
        <div class="login container">
            <form action="includes/login.php" method="post">
                <label for="formUsername">Bruger:</label>
                <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
                <label for="formPassword">Password:</label>
                <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
                <input type="submit" value="Log ind">
            </form>
            <a id="newUser" href="register.php">Ny bruger?</a>
        </div>
    <?php
    }
    ?>
    <hr>