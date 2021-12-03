<?php
/**
 * using mysqli_connect for database connection
 */
 
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $database); 
 
?>