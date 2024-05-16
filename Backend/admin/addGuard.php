<?php
session_start();

// Database credentials (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "securityguard_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $age = $_POST['age']; 
    $phoneNumber = $_POST['phoneNumber']; 
  
$query = "INSERT INTO guards( guard_fname,  guard_lname, guard_age,phoneNumber) VALUES('$fname', '$lname','$age','$phoneNumber')";

$result  = mysqli_query($conn, $query);

if($result){
    echo "<script>alert('Guard is successful added')</script>";
    echo "<script>window.location.href='../../Frontend/html/security guards.html'</script>";
    
}else{
    echo "failed";
}

        $conn->close();
   }