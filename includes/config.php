<?php 
// Create connection
$conn =mysqli_connect("localhost","id10330685_localhost","SRM@2020","id10330685_intern");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
