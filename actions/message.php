<?php 
ob_start();
session_start();

include "../dbconnect.php";

$conn = OpenCon();

$send_to = mysqli_real_escape_string($conn, $_POST['send-to']);
$message = mysqli_real_escape_string($conn, $_POST['mailbox-message']);
$client_id = $_SESSION['client_id'];

$sql = "SELECT `id` FROM `user` WHERE `name` = '$send_to'";

$response = $conn->query($sql);



if($response->num_rows > 0) {
    $receiver_id = intval($response->fetch_assoc()['id']);
    $sql = "INSERT INTO `private_message` (`id`, `user_id_sender`, `user_id_receiver`, `message`)
    VALUES (NULL, '$client_id', '$receiver_id', '$message')";

    try {
        $response = $conn->query($sql);
    
    } catch(Exception $e) {
        echo $e;
    }
}

header('Location: /mailbox.php');
?>