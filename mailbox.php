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
        <h1>Mailbox</h1>
    </div>
    
     <div class="mailbox container">
        <div class="mailbox-main">
            <div class="mailbox-left">
                <div class="mailbox-menu-item mailbox-left-selected">
                    <i class="fal fa-plus"></i>
                    <p>New message</p>
                </div>

                <div class="mailbox-menu-item">
                    <i class="fal fa-inbox-in"></i>
                    Received
                </div>

                <div class="mailbox-menu-item">
                    <i class="fal fa-paper-plane"></i>
                    Sent
                </div>

            </div>
            <div class="mailbox-right">
                <div class="mailbox-right-bottom mailbox-right-new">
                    <form action="">
                        <input type="text" name="send-to" class="send-to" placeholder="send to:">
                        <textarea name="mailbox-message" id="mailbox-message" placeholder="Message"></textarea>
                        <input class="priv-message-send" type="submit" value="Send message">
                    </form>
                </div>
            
                <div class="mailbox-right mailbox-right-received">
                    
                </div>

                <div class="mailbox-right mailbox-right-sent">
                    
                </div>

            </div>

        </div>
     </div>
    

    <?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>