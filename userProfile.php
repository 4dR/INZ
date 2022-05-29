
    
    <?php include('./components/navbar.php'); ?>

    <?php 
        if(!isset($_GET['profile']) && !isset($_SESSION['client_id'])) {
            header('Location: /');
        }

        //PROFILE ID
        $profileid = isset($_GET['profile']) ? $_GET['profile'] : $_SESSION['client_id'];
        $query = "SELECT * FROM `user` WHERE `id` = '$profileid'";
        $response = $conn->query($query);
                
        $num_rows = $response->num_rows;

        if ($num_rows > 0) {
            $profileres = $response->fetch_assoc();
        }

        //DISCORD
        $id = $profileres['id'];
        
        $query = "SELECT `discord_tag` FROM `user_info` WHERE `client_id` = '$id'";
        $response = $conn->query($query);
                
        $num_rows = $response->num_rows;

        if ($num_rows > 0) {
            $dc_tag = $response->fetch_assoc();
        }

        //KOMENTARZE

        $query = "SELECT `rate` FROM `comment` WHERE `user_id_receiver` = '$profileid'";
        $commentResponse = $conn->query($query);
        $num_rows = $response->num_rows;
        $commentCount = 0;
        $commentSum = 0;
        

        if ($num_rows > 0) {
            while($row = $commentResponse->fetch_assoc()) {
                $commentSum += $row['rate'];
                $commentCount++;
            }
        }

        if($commentCount != 0) {
            $commentAvarage = round(($commentSum / $commentCount), 1);
        } else {
            $commentAvarage = '';
        }
    ?>

<header class="profile-header"></header>
    <div class="under-header container">
        <h1><?php echo ($profileres['steamid'] !== $_SESSION['steamid']) ? $profileres['name'] . '\'s' . ' profile' : 'My profile'; ?></h1>
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

            <img src="<?php if($profileres['avatar']) { echo $profileres['avatar']; } else { echo 'Avatar'; }?>" alt="">
            <div class="under-avatar">
                <p class="profile-person-name"><?php echo $profileres['name']; ?></p>

                <div class="av-rating">
                    <?php echo $commentAvarage; ?>
                </div>

                <div class="rating">
                    <i class="fas fa-star <?php if ($commentAvarage >= 1) { echo 'golden-star'; } else { echo ''; } ?>"></i>
                    <i class="fas fa-star <?php if ($commentAvarage >= 2) { echo 'golden-star'; } else { echo ''; } ?>"></i>
                    <i class="fas fa-star <?php if ($commentAvarage >= 3) { echo 'golden-star'; } else { echo ''; } ?>"></i>
                    <i class="fas fa-star <?php if ($commentAvarage >= 4) { echo 'golden-star'; } else { echo ''; } ?>"></i>
                    <i class="fas fa-star <?php if ($commentAvarage >= 4.8) { echo 'golden-star'; } else { echo ''; } ?>"></i>
                </div>
            </div>
        </div>

        <div class="user-info-square bordered">
            <i class="fab fa-discord icons"></i>
            <h3>Discord</h3>
            <div class="dc-code">
                <?php if((isset($dc_tag) && $dc_tag['discord_tag'] !== '')) { ?>
                    <div class="dc-name">
                        <?php  if(isset($dc_tag)) {
                            echo $dc_tag['discord_tag'];
                        } else {
                            echo '';
                        }
                        ?>
                    </div>
                    <?php if($profileres['steamid'] === $_SESSION['steamid']) { ?>
                        <div class="dc-remove">
                            <form action="/actions/discordname.php" method="POST">
                                <button type='submit'>
                                    <i class="fas fa-times"></i>
                                </button>
                                <input type="hidden" value="<?php echo $_SESSION['client_id']; ?>" name='clientid'>
                            </form>
                        </div>
                    <?php } ?>
                   
                <?php } else { ?>
                    <?php if($profileres['steamid'] === $_SESSION['steamid']) { ?>
                    <form name="discordname" method="POST" action='/actions/discordname.php' class="dc-input" id="discordname">
                        <input type="text" name="dcname" class="dc-name-input" placeholder="example#0000">
                        <input type="submit" value="Add" class="dc-name-submit">
                    </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

    </div>

    <div class="hr-60"></div>

    <div class="game-choice-profile container">
        <a href="/userProfile.php?profile=<?php echo $profileres['id']; ?>&game=rust">
            <div class="single-game-choice <?php if(isset($_GET['game']) && $_GET['game'] === 'rust') { echo 'active'; } else { echo ''; } ?>">
                Rust
            </div>
        </a>

        <a href="/userProfile.php?profile=<?php echo $profileres['id']; ?>&game=cs">
            <div class="single-game-choice <?php if(isset($_GET['game']) && $_GET['game'] === 'cs' || !isset($_GET['game'])) { echo 'active'; } else { echo ''; } ?>">
                CS:GO
            </div>
        </a>
    </div>

    <div class="user-info container">

    <?php if(isset($_GET['game']) && $_GET['game'] === 'rust') { ?>
        
        <div class="user-info-square">
            <i class="fal fa-bow-arrow icons icon-light"></i>
            <h3>Bow accuracy</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-skull icons icon-light"></i>
            <h3>Headshots</h3>
            <p class="hs-count">1</p>
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
            <p class="deaths-count">1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-swords icons icon-light"></i>
            <h3>KDR</h3>
            <p>1</p>
        </div>

    <?php } elseif(isset($_GET['game']) && $_GET['game'] === 'cs' || !isset($_GET['game'])) { ?>

        <div class="user-info-square">
            <i class="fal fa-bow-arrow icons icon-light"></i>
            <h3>do csa</h3>
            <p>1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-skull icons icon-light"></i>
            <h3>Headshots</h3>
            <p class="hs-count">1</p>
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
            <p class="deaths-count">1</p>
        </div>
        <div class="user-info-square">
            <i class="fal fa-swords icons icon-light"></i>
            <h3>KDR</h3>
            <p>1</p>
        </div>

    <?php } ?>

    </div>

    <div class="hr-60"></div>
    
   

    <div class="comment-zone container">
 <?php
        $query = "SELECT * FROM `comment` WHERE `user_id_receiver` = '$profileid'";
        $commentResponse = $conn->query($query);
        $num_rows = $commentResponse->num_rows;

        if ($num_rows > 0) {
            while($row = $commentResponse->fetch_assoc()) {
                $user_sender = $row['user_id_sender'];
                $sql = "SELECT `name` FROM `user` WHERE `id` = '$user_sender'";
                $res = $conn->query($sql);
               
                ?>
                <div class="single-comment">
                    <div class="single-comment-left"><?php echo $res->fetch_assoc()['name']; ?></div>
                    <div class="single-comment-right"><?php echo $row['comment']; ?></div>
                    <div class="single-comment-date"><?php echo $row['date']; ?></div>
                    <div class="single-comment-rate"><i class="fas fa-star golden-star"></i><?php echo $row['rate']; ?></div>
                </div> 
                <?php
            }
        }
    ?>
       

        <form method="POST" action="/actions/commentandrating.php" class="comment-form" id="newcomment">
            <textarea name="comment-textarea" id="comment-textarea" class="add-comment-area" placeholder="Comment gamers profile" ></textarea>
            <input type="hidden" name='stars' value="0" id="hiddenbtn-star">
            <input type="hidden" name='profileid' value="<?php echo $profileid; ?>" id="hiddenbtn-star">
            <div class="rating-bottom">
                <div class="bottom-stars">
                    <i class="fas fa-star single-star" id="star-1"></i>
                    <i class="fas fa-star single-star" id="star-2"></i>
                    <i class="fas fa-star single-star" id="star-3"></i>
                    <i class="fas fa-star single-star" id="star-4"></i>
                    <i class="fas fa-star single-star" id="star-5"></i>
                </div>
                <p>Rate player</p>
            </div>
            <input type="submit" value="Comment" class="comment-submit">
        </form>
    </div>    

    <input type="text" name="" id="">

    <script>
        getPersonalStats(<?php echo '"' . $profileres['steamid'] . '"'; ?>, [252490, 730]);
    </script>
    

    <?php include('./components/footer.php'); ?>