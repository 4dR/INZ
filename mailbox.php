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
                <a href="/mailbox.php?type=new">
                    <div class="mailbox-menu-item <?php if((isset($_GET['type']) && $_GET['type'] == 'new') || !isset($_GET['type'])) { echo 'mailbox-left-selected'; } else { echo ''; } ?>">
                        <i class="fal fa-plus"></i>
                        <p>New message</p>
                    </div>
                </a>

                <a href="/mailbox.php?type=received">
                    <div class="mailbox-menu-item <?php if(isset($_GET['type']) && $_GET['type'] == 'received') { echo 'mailbox-left-selected'; } else { echo ''; }?>">
                        <i class="fal fa-inbox-in"></i>
                        Received
                    </div>
                </a>

                <a href="/mailbox.php?type=sent">
                    <div class="mailbox-menu-item <?php if(isset($_GET['type']) && $_GET['type'] == 'sent') { echo 'mailbox-left-selected'; } else { echo ''; }?>">
                        <i class="fal fa-paper-plane"></i>
                        Sent
                    </div>
                </a>

            </div>
            <div class="mailbox-right">
                <?php if(!isset($_GET['messageid']) && (isset($_GET['type']) && $_GET['type'] == 'new') || !isset($_GET['type'])) { ?>

                    <div class="mailbox-right-bottom mailbox-right-new">
                        <form action="actions/message.php" method="POST">
                            <input type="text" name="send-to" class="send-to" placeholder="send to:">
                            <textarea name="mailbox-message" id="mailbox-message" placeholder="Message"></textarea>
                            <input class="priv-message-send" type="submit" value="Send message">
                        </form>
                    </div>

                <?php } elseif(!isset($_GET['messageid']) && isset($_GET['type']) && $_GET['type'] == 'received') {?>
                
                    <div class="mailbox-right mailbox-right-received">
                        <?php 
                            $client_id = $_SESSION['client_id'];
                            $sql = "SELECT * FROM `private_message` WHERE `user_id_receiver` = '$client_id'";
                            $response = $conn->query($sql);

                            if ($response->num_rows > 0) {
                                while($row = $response->fetch_assoc()) { ?>
                                    <a href="/mailbox.php?type=received&messageid=<?php echo $row['id']; ?>">
                                        <div class="single-message-block">

                                            <?php 
                                                $senderId = $row['user_id_sender'];
                                                $receiverName = '';
                                                $sql2 = "SELECT `name` FROM `user` WHERE `id` = '$senderId'";
                                                $response2 = $conn->query($sql2);
                                                if($response2->num_rows > 0) {
                                                    $receiverName = $response2->fetch_assoc()['name'];
                                                }   
                                            ?>
                                        
                                            <div class="single-message-block-left">
                                                Received from: <?php echo $receiverName; ?>
                                            </div>
                                            <div class="single-message-block-right">
                                                <?php 
                                                    if(strlen($row['message']) > 30) {
                                                        echo substr($row['message'], 0, 30) . ' ...';
                                                    } else {
                                                        echo $row['message']; 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php }
                            }
                        ?>
                    </div>

                <?php } elseif(!isset($_GET['messageid']) && isset($_GET['type']) && $_GET['type'] == 'sent') { ?>

                    <div class="mailbox-right mailbox-right-sent">
                    <?php 
                            $client_id = $_SESSION['client_id'];
                            $sql = "SELECT * FROM `private_message` WHERE `user_id_sender` = '$client_id'";
                            $response = $conn->query($sql);

                            if ($response->num_rows > 0) {
                                while($row = $response->fetch_assoc()) { ?>
                                    <a href="/mailbox.php?type=sent&messageid=<?php echo $row['id']; ?>">
                                        <div class="single-message-block">

                                            <?php 
                                                $senderId = $row['user_id_sender'];
                                                $senderName = '';
                                                $sql2 = "SELECT `name` FROM `user` WHERE `id` = '$senderId'";
                                                $response2 = $conn->query($sql2);
                                                if($response2->num_rows > 0) {
                                                    $senderName = $response2->fetch_assoc()['name'];
                                                }   
                                            ?>
                                        
                                            <div class="single-message-block-left">
                                                Sent by: <?php echo $senderName; ?>
                                            </div>
                                            <div class="single-message-block-right">
                                                <?php 
                                                    if(strlen($row['message']) > 30) {
                                                        echo substr($row['message'], 0, 30) . ' ...';
                                                    } else {
                                                        echo $row['message']; 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php }
                            }
                        ?>
                    </div>

                <?php } elseif(isset($_GET['messageid']) && $_GET['messageid'] !== '') { ?>
                    <?php
                        $messageId = $_GET['messageid'];
                        $sql = "SELECT * FROM `private_message` WHERE `id` = '$messageId'";
                        $response = $conn->query($sql);  
                        
                        $res = $response->fetch_assoc();

                        ?>

                            <div class="mailbox-right mailbox-right-single">

                                <?php 
                                    $senderId = $res['user_id_sender'];
                                    $receiverName = '';
                                    // Pobieramy nazwę OD KOGO na podstawie pobranego ID z wyższego zapytania.
                                    $sql2 = "SELECT `name` FROM `user` WHERE `id` = '$senderId'";
                                    $response2 = $conn->query($sql2);
                                    if($response2->num_rows > 0) {
                                        $receiverName = $response2->fetch_assoc()['name'];
                                    }   
                                ?>

                                Sent by: <?php echo $receiverName; ?>
                                <p>
                                    <?php echo $res['message']; ?>
                                </p>
                            </div>

                        <?php
                    ?>
                <?php } ?>
            </div>

        </div>
     </div>
    

    <?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>