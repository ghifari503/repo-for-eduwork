<?php
require_once 'koneksi.php';
// ------ Delete Buku
if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];
    mysqli_query($koneksi, "DELETE FROM bukus WHERE `isbn` = $isbn");

    header("Location: index.php");
}
// ------ Delete Penerbit
if (isset($_GET['id_penerbit'])) {
    $id_penerbit = $_GET['id_penerbit'];
    mysqli_query($koneksi, "DELETE FROM penerbits WHERE `id` = $id_penerbit");

    header("Location: penerbit.php");
}
// ------ Delete Pengarang
if (isset($_GET['id_pengarang'])) {
    $id_pengarang = $_GET['id_pengarang'];
    mysqli_query($koneksi, "DELETE FROM pengarangs WHERE `id` = $id_pengarang");

    header("Location: pengarang.php");
}

// ------ Delete Katalog
if (isset($_GET['id_katalog'])) {
    $id_katalog = $_GET['id_katalog'];
    mysqli_query($koneksi, "DELETE FROM katalogs WHERE `id` = $id_katalog");

    header("Location: katalog.php");
}
