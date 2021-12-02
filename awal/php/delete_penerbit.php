<?php
include_once("connect.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM penerbits WHERE id='$id'");

header("Location: penerbit.php");
?>