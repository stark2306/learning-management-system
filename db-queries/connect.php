<?php
$servername = "localhost";
$db_username = "wilson";
$db_password = "1234";
$database = "cricket_management_system";

// Create connection
$connection = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

