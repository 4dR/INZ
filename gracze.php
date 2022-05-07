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
    <title>IPZ - 2021</title>
</head>
<body>
    <header>
        <div class="container usersZone">
            <?php 
            if(isset($_SESSION['steamid'])) {
            ?>
                    <?php
                        $sql = "SELECT * FROM user";
                        $response = $conn->query($sql);
                        
                        $num_rows = $response->num_rows;

                        if ($num_rows > 0) {
                            while($row = $response->fetch_assoc()) {
                                ?>
                                <form action="/singleUser.php" method="GET" name="singleForm-<?php echo $row['steamid'];?>">
                                <div onClick="document.forms['singleForm-<?php echo $row['steamid'];?>'].submit();" class="singleUser">
                                    <input type="text" value="<?php echo $row['steamid']; ?>" name="username" hidden/>
                                    <img src="<?php echo $row['avatar'];?>" alt="avatar"/>
                                    <p class="nameOfUser"><?php echo $row['name'];?></p>
                                </div>
                                </form>     
                                <?php
                                

                            }
                          }
                        } else {
                            header('Location: http://localhost/index.php?login');
                            exit;
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
    
</body>
</html>

<!-- <?php CloseCon($conn); ?> -->