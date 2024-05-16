<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

header("Content-Type: application/json");

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);
}
$query = "SELECT client_name, client_email, client_phoneNumber FROM rejectedRequests";
$result  = mysqli_query($connection, $query);

$rejectedRequests= array();
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        $rejectedRequests[] =$row;
    }
    echo  json_encode($rejectedRequests);
}else{
 echo json_encode("failed".err);
}