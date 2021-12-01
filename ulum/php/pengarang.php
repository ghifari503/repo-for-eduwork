<?php
require_once 'koneksi.php';

$pengarang = query("SELECT * FROM pengarangs ORDER BY nama_pengarang ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengarang</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="penerbit.php">Penerbit</a> |
        <a href="pengarang.php">Pengarang</a> |
        <a href="katalog.php">Katalog</a> |
    </center>

    <a href="CU_pengarang.php">Add New Pengarang</a>
    <table width="80%" border="1">
        <tr>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>No Telp.</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pengarang as $p) : ?>
            <tr>
                <td><?= $p['nama_pengarang'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['telp'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><a href="CU_pengarang.php?id_pengarang=<?= $p['id'] ?>">Edit</a> | <a href="delete.php?id_pengarang=<?= $p['id'] ?>" onclick="confirm('Yakin dihapus ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>