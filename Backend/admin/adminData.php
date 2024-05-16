<?php

session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);
}

$email = $_SESSION['email'];

$query = "SELECT name, password, email FROM admin WHERE email = '$email'";
$result  = mysqli_query($connection, $query);

$adminData= array();
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        $adminData[] =$row;
    }

    $json_requests = json_encode($adminData);
    echo $json_requests;

}else{
 echo json_encode("failed");
}