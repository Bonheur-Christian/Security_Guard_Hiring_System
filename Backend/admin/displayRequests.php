<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);
}

$query = "SELECT client_name, client_email, phoneNumber, guardsNumber FROM requests";
$result  = mysqli_query($connection, $query);

$requests= array();
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        $requests[] =$row;
    }

    $json_requests = json_encode($requests);
    echo $json_requests;

}else{
 echo json_encode("failed");
}