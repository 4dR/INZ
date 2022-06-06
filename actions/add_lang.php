<?php 
ob_start();
session_start();

include "../dbconnect.php";

$conn = OpenCon();

//var_dump($_POST); die;

$client_id = $_SESSION['client_id'];
$lang_id = mysqli_real_escape_string($conn, $_POST['lang-list']);

$sql = "SELECT * FROM `languages` WHERE `user_id` = '$client_id' AND `lang_id` = '$lang_id'";
//var_dump($sql); die;
$result = $conn->query($sql);
//var_dump($result); die;
if($result->num_rows < 1) {
    $sql = "INSERT INTO `languages` (`id`, `user_id`, `lang_id`) VALUES (NULL, '$client_id', '$lang_id')";
    
    try {
        $result = $conn->query($sql);
        exit;
    } catch(Exception $e) {
        echo $e;
    }  
} 
header('Location: /userProfile.php');

?>