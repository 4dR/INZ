<?php 
ob_start();
session_start();

include "../dbconnect.php";

$conn = OpenCon();

if(isset($_POST['dcname']) && $_POST['dcname'] != '' 
&& $_POST['dcname'] !== null) {

    $client_id = mysqli_real_escape_string($conn, $_SESSION['client_id']);
    $dc_tag = mysqli_real_escape_string($conn, $_POST['dcname']);

    $sql = "UPDATE `user_info` SET `discord_tag` = '$dc_tag' WHERE `client_id` = '$client_id'";
    
    try {
        $result = $conn->query($sql);
        header('Location: /userProfile.php');
        exit;
    } catch(Exception $e) {
        echo $e;
    }
}

if(isset($_POST['clientid']) && $_POST['clientid'] != '' &&
$_POST['clientid'] !== null) {

    $client_id = mysqli_real_escape_string($conn, $_POST['clientid']);

    $sql = "UPDATE `user_info` SET `discord_tag` = '' WHERE `client_id` = '$client_id'";

    try {
        $result = $conn->query($sql);
        header('Location: /userProfile.php');
        exit;
    } catch(Exception $e) {
        echo $e;
    }

}
    
?>