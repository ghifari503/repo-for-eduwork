<?php
include_once("koneksi.php");
 
$mysqli = new mysqli('localhost', 'root', '', 'perpustakaan') or die(mysqli_error($mysqli));

$isbn = $_GET['isbn'];
 
$result = mysqli_query($mysqli, "DELETE FROM detail_peminjaman WHERE isbn='$isbn'");

$result = mysqli_query($mysqli, "DELETE FROM buku WHERE isbn='$isbn'");