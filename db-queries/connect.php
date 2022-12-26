<?php
$servername = "localhost";
$db_username = "denver";
$db_password = "Rubi@123";
$database = "cricket_management_system";

// Create connection
$connection = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

