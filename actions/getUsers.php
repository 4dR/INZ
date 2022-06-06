<?php 
ob_start();
session_start();

include "../dbconnect.php";

$conn = OpenCon();

$users = array();

    $query = "SELECT * FROM user";
    $response = $conn->query($query);
    $num_rows = $response->num_rows;

    if ($num_rows > 0) {
        while($row = $response->fetch_assoc()) {
            $arr = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "avatar" => $row['avatar'],
                "steamid" => $row['steamid']
            );

            array_push($users, $arr);
        }
    }

    $res = json_encode($users);

    echo $res; die;

?>