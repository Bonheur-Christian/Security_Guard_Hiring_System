<?php
// starting session 
session_start();

//setting up the server and database request
$server = "localhost";
$username = "root";
$password = "";
$db = "SecurityGuard_db";

// establishing connection
$connection  = new mysqli($server, $username, $password, $db);
if($connection->connect_error){
    die("connection_err".$connection->connect_error);
}

//setting header content-type
header('Content-Type:application/json');

//fetching the user input
$guard_fname = $_POST['fname'];
$guard_lname = $_POST['lname'];

if($guard_fname && $guard_lname){
//inserting into the database table
$query = "INSERT INTO guards(guard_fname, guard_lname)
 VALUES('$guard_fname', '$guard_lname')";

$result  = mysqli_query($connection, $query);
//verifying if there is result
if($result){
    echo json_encode("successful");
}else{
    echo json_encode("failed");
}
}else{
    echo "Fill in the input fields";
    
}







