<?php include('./components/navbar.php'); ?>

<header class="header-not-main">

    <div class="mini-header" style="background-image: url('./img/cs.jpg')">
        <div class="container">
            <h1>CS:GO</h1>
        </div>
    </div>

</header>

<?php 
    $query = "SELECT * FROM user";
    $response = $conn->query($query);
    $num_rows = $response->num_rows;
?>

<div class="partner-list container">
    <div class="gamersbtn">
        <h2>Gamers list</h2>
        <input type="button" value="Find gamers" class="submit-gamers-button" onclick='compareToOthers("<?php echo $_SESSION["steamid"]?>", [730]);'>
    </div>

    <div class="single-gamers-list">

        <?php
        $counter = 0;
            if ($num_rows > 0) {
                while($row = $response->fetch_assoc()) {
        ?>

            <div class="single-gamer">
                <a href="/userProfile.php?profile=<?php echo $row['id']; ?>&game=cs" class="single-gamer-link"></a>
                <div class="single-gamer-name">
                    <?php
                        $avatar = $row['avatar'] ? $row['avatar'] : '';
                    ?>
                    <img src="<?php echo $avatar; ?>" alt="avatar">
                    <p><?php echo $row['name'] ? $row['name'] : ''; ?></p>
                </div>

                <div class="single-gamer-info">
                    <div class="single-info single-gamer-kda" id="kda-<?php echo $counter; ?>">3.0 KDR</div>
                    <div onClick="" class="single-info single-gamer-kills" id="kills-<?php echo $counter; ?>">1400 Kills</div>
                </div>

            </div>

            <script>
                getProfileStats(<?php echo $counter; ?>, <?php echo '"' . $row['steamid'] . '"'; ?>, 730);
            </script>
            <?php $counter++; ?>
        <?php
                }
            }
        ?>

    </div>
    
</div>

<?php include('./components/footer.php'); ?>
