<?php
include_once("connect.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM pengarangs WHERE id='$id'");

header("Location: pengarang.php");
?>