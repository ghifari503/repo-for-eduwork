<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("connection failed:" . mysqli_connected_error());
}

echo "connected successfully";
mysqli_close($conn);


?>
