<?php
include_once("connect.php");
 
$isbn = $_GET['isbn'];
 
$result = mysqli_query($mysqli, "DELETE FROM bukus WHERE isbn='$isbn'");

header("Location:index.php");
?>