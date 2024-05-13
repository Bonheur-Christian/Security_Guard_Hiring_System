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

    $username = trim($_POST['name']);// Trim extra spaces
    $age = $_POST['age']; 
  
$query = "INSERT INTO guards(guard_name, guard_age) VALUES('$username', '$age')";

$result  = mysqli_query($conn, $query);

if($result){
    echo "<script>alert('Guard is successful added')</script>";
    echo "<script>window.location.href='../../Frontend/html/allguards.html'</script>";
    
}else{
    echo "failed";
}

        $conn->close();
   }