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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bcbbe0b4e9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Match Us</title>
</head>
<body>
    
<header>

    <?php include('./components/navbar.php'); ?>

    <div class="slider">
        <div class="overslide">
            <h2>Match me</h2>
            <p>Find your best teammate</p>
        </div>

        <div class="slider-arrow">
            <a href="#about-us"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>

</header>

<div class="about-us container" id="about-us">
    <h3>About us</h3>
    <p>
    Our website is for gamers,
    who's looking game partner on the Steam platform.<br>
    Surely here you find your best game partner to playing together.<br><br>
    The gamers are find by algorithm which checking their statistics. 
    </p>
</div>

<div class="registred-counter container">
    <?php 
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
    ?>


    <div class="registered-left">
        <i class="fas fa-users"></i>
        <p><?php echo $result->num_rows; ?></p>
    </div>
    <div class="registered-right">
        <p>Registered users</p>
    </div>
</div>

    <?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>