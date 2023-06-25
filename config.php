<?php
$servername = "localhost";
$username = "hotel_user";
$password = "admin";
$dbname = "ems";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>