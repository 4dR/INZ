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

            <li><a href="./userProfile.php">My profile</a></li>
        </ul>
    </div>

    <div class="logowanie">
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