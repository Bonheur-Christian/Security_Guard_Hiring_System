<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);
}

$query = "SELECT client_name, client_email, client_phoneNumber FROM acceptedrequest";
$result  = mysqli_query($connection, $query);

$AcceptedRequests= array();
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        $AcceptedRequests[] =$row;
    }

    $json_requests = json_encode($AcceptedRequests);
    echo $json_requests;

}else{
 echo json_encode("failed".err);
}