<!DOCTYPE html>
<html lang="en">



<?php 
require_once('dbconnect.php');

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
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bcbbe0b4e9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>IPZ - 2021</title>
</head>
<body>
    <header>
        <div class="container usersZone singleUsersZone" id="<?php  echo $_GET['username']?>">
            
                
                    <?php
                        $steamid = $_GET['username'];
                        $sql = "SELECT * FROM user WHERE steamid=$steamid";
                        $response = $conn->query($sql);
                        $num_rows = $response->num_rows;

                        if ($num_rows > 0) {
                            $user = $response->fetch_assoc();
                            ?>
                            <div class="singleZone">
                            <img class="userImage" src="<?php echo $user['avatar']?>" alt="avatar"/>
                            <p class="userNaame"><?php echo $user['name']?></p>
                            </div>
                            <div id="daneGracza">
                            
                            </div>

                            <?php
                          }
                    ?>
                
            
        </div>
    </header>
        <div class="belt-up">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 left">
                        <h1><a href="/index.php" class="menu-link1">LOGO - IPZ</a></h1>
                        <a href="/gracze.php" class="menu-link">Gracze</a>
                    </div>
                    <div class="col-6 right">                           
                        
                    <?php
                        if(isset($_SESSION['steamid'])) {
                            ?>
                            <div class="log">
                                <p><img src="<?php echo $steamprofile['avatar'];?>" alt="">     <?php echo $steamprofile['personaname'];?></p>
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
                </div>
            </div>
        </div>

        <div class="belt-down">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 right-down">

                    </div>
                    <div class="col-6 left-down">
                        <span>
                            <i class="fab fa-facebook-square"></i>                            
                            <i class="fab fa-instagram"></i>
                        </span>                        
                    </div>
                </div>
            </div>           
        </div>
        <script src="js/script.js"></script>
</body>
</html>

<!-- <?php CloseCon($conn); ?> -->