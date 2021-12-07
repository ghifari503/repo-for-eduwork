<?php
include_once("../connect.php");
 
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM penerbits WHERE id='$id'");

// var_dump(mysqli_error($conn));
// die;

header("Location:index.php");

?>