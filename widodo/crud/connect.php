<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername,$username,$password,$database);

//check connection
if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());

}

?>
