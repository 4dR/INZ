<!DOCTYPE html>
<html lang="en">

<?php 
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
    <script src="js/script.js"></script>
    <title>Match Us</title>
</head>
<body>

<header class="header-not-main">

    <?php include('./components/navbar.php'); ?>

    <div class="mini-header" style="background-image: url('./img/bg2.jpg')">
        <div class="container">
            <h1>RUST</h1>
        </div>
    </div>

</header>

<?php 
    $query = "SELECT * FROM user";
    $response = $conn->query($query);
    $num_rows = $response->num_rows;
?>

<div class="partner-list container">
    <h2>Gamers list</h2>
    <?php
    $counter = 0;
        if ($num_rows > 0) {
            while($row = $response->fetch_assoc()) {
    ?>

        <div class="single-gamer">
            <div class="single-gamer-name">
                <?php
                    $avatar = $row['avatar'] ? $row['avatar'] : '';
                ?>
                <img src="<?php echo $avatar; ?>" alt="avatar">
                <p><?php echo $row['name'] ? $row['name'] : ''; ?></p>
            </div>

            <div class="single-gamer-info">
                <div class="single-info single-gamer-kda" id="kda-<?php echo $counter; ?>">3.0 KDR</div>
                <div class="single-info single-gamer-kills" id="kills-<?php echo $counter; ?>">1400 Kills</div>
            </div>

        </div>

        <script>
            getProfileStats(<?php echo $counter; ?>, <?php echo '"' . $row['steamid'] . '"'; ?>, 252490);
        </script>
        <?php $counter++; ?>
    <?php
            }
        }
    ?>
</div>

<?php include('./components/footer.php'); ?>

</body>
</html>