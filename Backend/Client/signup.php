<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "SecurityGuard_db";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password']; 


    $query = "INSERT INTO clients(name, password) VALUES ('$name','$password')";
    $result = mysqli_query($conn, $query);

    if($result){
       echo "<script>alert('you are successfully logged in')</script>";
       echo "<script>window.location.href='../../Frontend/html/home.html'</script>";
    }else{
        echo "failed";
    }

} 
$conn->close();
?>