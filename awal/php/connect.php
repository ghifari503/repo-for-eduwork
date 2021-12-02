<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Connect to the database server
$mysqli = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$mysqli) {
    echo 'Unable to connect to the database: ' . mysqli_connect_error();
    exit();
}
?>