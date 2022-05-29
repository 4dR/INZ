<?php 
ob_start();
session_start();

include "../dbconnect.php";

$conn = OpenCon();


//clientid to sender
if(isset($_POST['comment-textarea']) && $_POST['comment-textarea'] != '' &&
$_POST['comment-textarea'] !== null) {

    $sender_id = mysqli_real_escape_string($conn, $_SESSION['client_id']); // id sendera
    $receiver_id = mysqli_real_escape_string($conn, $_POST['profileid']); // id receivera
    $comment = mysqli_real_escape_string($conn, $_POST['comment-textarea']); // comment
    $rating = mysqli_real_escape_string($conn, $_POST['stars']); //rating
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT `comment` (`id`, `user_id_sender`, `user_id_receiver`, `comment`, `rate`, `date`) 
    VALUES (NULL, '$sender_id', '$receiver_id', '$comment', '$rating','$date')";

    try {
        $result = $conn->query($sql);
        header('Location: /userProfile.php?profile=' . $receiver_id . '#comment-textarea');
        exit;
    } catch(Exception $e) {
        echo $e;
    }
    
}
?>