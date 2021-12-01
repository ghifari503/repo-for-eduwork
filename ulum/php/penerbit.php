<?php
require_once 'koneksi.php';

$penerbit = query("SELECT * FROM penerbits ORDER BY nama_penerbit ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerbit</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="penerbit.php">Penerbit</a> |
        <a href="pengarang.php">Pengarang</a> |
        <a href="katalog.php">Katalog</a> |
    </center>

    <a href="CU_penerbit.php">Add New Penerbit</a>
    <table width="80%" border="1">
        <tr>
            <th>Nama Penerbit</th>
            <th>Email</th>
            <th>No Telp.</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($penerbit as $p) : ?>
            <tr>
                <td><?= $p['nama_penerbit'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['telp'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><a href="CU_penerbit.php?id_penerbit=<?= $p['id'] ?>">Edit</a> | <a href="delete.php?id_penerbit=<?= $p['id'] ?>" onclick="confirm('Yakin dihapus ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>