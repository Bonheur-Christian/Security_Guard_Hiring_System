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
    $password = $_POST['password'];

    if($username!=="admin"){
        echo "<script>alert('Not admin')</script>";
        echo "<script>window.location.href='../../Frontend/html/client.html'</script>";
    }else{
        $query = "INSERT INTO admin(name, password) VALUES('$username', '$password')";

        $result  = mysqli_query($conn, $query);

        if($result){
            header('Location:../../Frontend/html/dashboard.html');
        }else{
            echo "failed";
        }

        $conn->close();
   }
}