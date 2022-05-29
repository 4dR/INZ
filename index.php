<?php include('./components/navbar.php'); ?>

<header>

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
