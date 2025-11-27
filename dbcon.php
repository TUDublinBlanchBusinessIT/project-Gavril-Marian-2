<?php
$servername = "localhost";
$username = "root";          //Template took from w3School
$password = "1234";  
$dbname = "aquaticCentre";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $dbname,$port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
