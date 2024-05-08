<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'SecurityGuard_db';

$connection = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection to the database failed".$connection->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$guardsNumber = $_POST['guardsNumber'];

if(!$name || !$email || !$password || !$tel || !$address || !$gender || !$guardsNumber){
    echo '<script>alert("Fill in all given fields");</script>';
}else{
    $query = "INSERT INTO requests(client_name, client_email, client_password, phoneNumber, guard_gender,guardsNumber, client_address) 
    VALUES('$name', '$email', '$password', '$tel', '$gender', '$guardsNumber','$address')"; 

    $result  = mysqli_query($connection, $query);

    if($result){
        echo "successful";
        header('Location:../../Frontend/html/requestSuccessful.html');
    }else{
        echo "failed";
    }
}