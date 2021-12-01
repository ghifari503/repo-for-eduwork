<?php
require_once 'koneksi.php';

$buku = query("SELECT bukus.*, pengarangs.nama_pengarang, penerbits.nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
            LEFT JOIN pengarangs ON pengarangs.id = bukus.id_pengarang 
            LEFT JOIN penerbits ON penerbits.id = bukus.id_penerbit
            LEFT JOIN katalogs ON katalogs.id = bukus.id_katalog
            ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="penerbit.php">Penerbit</a> |
        <a href="pengarang.php">Pengarang</a> |
        <a href="katalog.php">Katalog</a> |
    </center>

    <a href="CU_buku.php">Add New Buku</a>
    <table width="80%" border="1">
        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Katalog</th>
            <th>Stok</th>
            <th>Harga Pinjam</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($buku as $b) : ?>
            <tr>
                <td><?= $b['isbn'] ?></td>
                <td><?= $b['judul'] ?></td>
                <td><?= $b['tahun'] ?></td>
                <td><?= $b['nama_pengarang'] ?></td>
                <td><?= $b['nama_penerbit'] ?></td>
                <td><?= $b['nama_katalog'] ?></td>
                <td><?= $b['qty_stok'] ?></td>
                <td><?= $b['harga_pinjam'] ?></td>
                <td><a href="CU_buku.php?id_buku=<?= $b['id'] ?>">Edit</a> | <a href="delete.php?isbn=<?= $b['isbn'] ?>" onclick="confirm('Yakin dihapus ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>