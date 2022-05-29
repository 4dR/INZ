<!DOCTYPE html>
<html lang="en">

<?php 
    include "dbconnect.php";

    $conn = OpenCon();

    require './steamauth/steamauth.php'; 

    if(isset($_SESSION['steamid'])) {
        include('steamauth/userInfo.php');
    }   
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/light.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bcbbe0b4e9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Match Us</title>
</head>
<body>

<nav>
    <div class="logo">
        <a href="./index.php" style="text-decoration:none"><h1>MatchUs</h1></a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="./index.php#about-us">About us</a></li>

            <?php 
                if(isset($_SESSION['steamid']) && $_SESSION['steamid'] !== '') {
            ?>
            <li><a href="/game.php">Find your teammate</a></li>
            
            <?php 
                } else {
                     ?>
                        <li><a href="?login">Find your teammate</a></li>
                    <?php
                } 
            ?>

            <?php 
                if(isset($_SESSION['steamid']) && $_SESSION['steamid'] !== '') {
            ?>
            <li><a href="./userProfile.php">My profile</a></li>
            <?php 
                }
            ?>
        </ul>
    </div>

    <div class="logowanie">
        <?php 
            if(isset($_SESSION['steamid']) && $_SESSION['steamid'] !== '') {
        ?>

            <div class="nav-pm">
                <a href="./mailbox.php">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>

        <?php 
                }
            ?>
        <?php
            if(isset($_SESSION['steamid'])) { ?>
                <div class="log">
                    <p>
                        <img src="<?php echo $steamprofile['avatar'];?>" alt="">
                        <?php echo $steamprofile['personaname'];?>
                    </p>
                    <?php 
                        logoutbutton(); 
                    ?> 
                </div>
            <?php
            }  else {
                loginbutton();
            }   
        ?>
    </div>
</nav>