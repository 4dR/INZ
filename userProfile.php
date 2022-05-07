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
    
<header class="profile-header">

    <?php include('./components/navbar.php'); ?>

</header>
    <div class="under-header">
        <h1>My profile</h1>
    </div>
    
    <div class="user-info container">
        <div class="user-info-square">
            <h3>Languages</h3>
            <div class="languages">
                <form action="" method="GET">
                    <select name="languages">

                    </select>
                    <input type="submit" value="Add">
                </form>
            </div>
        </div>
        <div class="user-info-square">
            avatar
        </div>
        <div class="user-info-square">
            <!-- <i class="fa-brands fa-discord"></i> -->
            <h3>Discord</h3>
            <form action="" class="discord-form">
                <input type="text">
                <input type="submit" value="Add">
            </form>
        </div>
    </div>

    <hr style="width: 60%; background: gray;">

   

    <div class="user-info container">
        
        <div class="user-info-square">
            <h3>Bow accuracy</h3>
            
        </div>
        <div class="user-info-square">
            <h3>Headshots</h3>
        </div>
        <div class="user-info-square">
            <h3>Rifle Accuracy</h3>
        </div>
        <div class="user-info-square">
            <h3>Total Kills</h3>

        </div>
        <div class="user-info-square">
            <h3>Deaths</h3>
        </div>
        <div class="user-info-square">
            <h3>KDR</h3>
        </div>
    </div>

    
    


    <div class="comment-zone">
        <form action="" class="comment-form">
            <input type="text-area" class="add-comment-area">
            <input type="submit" value="Add">
        </form>
    </div>    
    

    <?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>