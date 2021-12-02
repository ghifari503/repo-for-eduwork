<?php
include_once("../connect/connect.php");

if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn']; 
    mysqli_query($conn, "DELETE FROM bukus WHERE isbn=$isbn");

    header("Location:../index.php");
}

if(isset($_GET['id_penerbit'])){
    $id_penerbit = $_GET['id_penerbit']; 
    mysqli_query($conn, "DELETE FROM penerbits WHERE id=$id_penerbit");

    header("Location:../penerbit.php");
}

if(isset($_GET['id_pengarang'])){
    $id_pengarang = $_GET['id_pengarang']; 
    mysqli_query($conn, "DELETE FROM pengarangs WHERE id=$id_pengarang");

    header("Location:../pengarang.php");
}

if(isset($_GET['id_katalog'])){
    $id_katalog = $_GET['id_katalog']; 
    mysqli_query($conn, "DELETE FROM katalogs WHERE id=$id_katalog");

    header("Location:../katalog.php");
}
?>