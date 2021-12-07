<?php
include_once("../connect.php");
 
$isbn = $_GET['isbn'];
$result = mysqli_query($conn, "DELETE FROM bukus WHERE isbn='$isbn'");

// var_dump(mysqli_error($conn));
// die;
header("Location:index.php");

?>