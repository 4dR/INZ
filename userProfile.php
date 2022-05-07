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
    <title>Match Us</title>
</head>
<body>
    
<header class="profile-header">

    <?php include('./components/navbar.php'); ?>

</header>
    <div class="under-header container">
        <h1>My profile</h1>
        <div class="private-message-icon">
            <i class="fas fa-envelope"></i>
            <p class="send-pm">Send PM</p>
        </div>
    </div>
    
    <div class="user-info container">

        <div class="user-info-square">
            <i class="fas fa-volume-up icons"></i>
            <h3>Languages</h3>
            <div class="profile-lang">
                <p>Polish</p>
                <p>English</p>
                <p>German</p>
            </div>
        </div>

        <div class="user-info-square transparent" >

        

            <?php 
                $steamid = $steamprofile['steamid'];
                $query = "SELECT `avatar` FROM `user` WHERE `steamid` = '$steamid'";
                $response = $conn->query($query);
                        
                $num_rows = $response->num_rows;

                if ($num_rows > 0) {
                    $avatar = $row = $response->fetch_assoc();
                }
            ?>

            <img src="<?php if($avatar['avatar']) { echo $avatar['avatar']; } else { echo 'Avatar'; }?>" alt="">
            <div class="under-avatar">
                <p class="profile-person-name"><?php if($steamprofile['personaname']) { echo $steamprofile['personaname']; } else { echo 'Nickname'; } ?></p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>

        <div class="user-info-square bordered">
            <i class="fab fa-discord icons"></i>
            <h3>Discord</h3>
            <p class="dc-code">Raxi#1234</p>
        </div>

    </div>

    <div class="hr-60"></div>

    <div class="user-info container">
        
        <div class="user-info-square">
            <i class="fal fa-bow-arrow icons icon-light"></i>
            <h3>Bow accuracy</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-skull icons icon-light"></i>
            <h3>Headshots</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-crosshairs icons icon-light"></i>
            <h3>Rifle Accuracy</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-axe icons icon-light"></i>
            <h3>Total Kills</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-skull-crossbones icons icon-light"></i>
            <h3>Deaths</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-swords icons icon-light"></i>
            <h3>KDR</h3>
            <p>1</p>
        </div>
    </div>

    <div class="hr-60"></div>  

    <div class="comment-zone container">

        <div class="single-comment">
                <div class="single-comment-left">Raxi</div>
                <div class="single-comment-right">Najlepszy gracz na świecie</div>
                <div class="single-comment-date">16:23 12.06.2022</div>
        </div>

        <form action="" class="comment-form">
            <textarea name="comment-textarea" class="add-comment-area" placeholder="Comment gamers profile"></textarea>
            <input type="hidden" name='stars' value="0">
            <div class="rating-bottom">
                <div class="bottom-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Rate player</p>
            </div>
            <input type="submit" value="Comment">
        </form>
    </div>    
    

    <?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>