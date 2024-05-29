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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email'] = $email;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if($username!=="admin"){
        echo "<script>alert('Not admin')</script>";
        echo "<script>window.location.href='../../Frontend/html/client.html'</script>";
    }else{
        $query = "INSERT INTO admin(name,email,  password) VALUES('$username','$email', '$hashedPassword')";

        $result  = mysqli_query($conn, $query);

        if($result){
            header('Content-Type: application/json');

            echo  json_encode($_SESSION);
            header('Location:../../Frontend/html/dashboard.html');

            exit;

        }else{
            echo "failed";
        }

        $conn->close();
   }
}