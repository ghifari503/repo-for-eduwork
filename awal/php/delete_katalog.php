<?php
include_once("connect.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM katalogs WHERE id='$id'");

header("Location: katalog.php");
?>