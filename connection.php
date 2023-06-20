<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "agaetis_test";
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>