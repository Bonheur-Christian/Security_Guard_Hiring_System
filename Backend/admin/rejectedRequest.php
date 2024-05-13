<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);}
    $client_email = $_GET['client_email'];
    echo($client_email);
    $query = "INSERT INTO rejectedrequests(client_name, client_email, client_phoneNumber) SELECT client_name,client_email,phoneNumber FROM requests WHERE client_email = '$client_email' "; 
    $result  = mysqli_query($connection, $query);
    echo($result);

    $acceptedRequest = array();
    if($result){
        echo "<script>alert('request rejected')</script>";             

    }else{
       echo json_encode("failed");
    }