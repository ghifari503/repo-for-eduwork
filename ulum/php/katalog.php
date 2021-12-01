<?php
require_once 'koneksi.php';

$katalog = query("SELECT * FROM katalogs ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Katalog</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="penerbit.php">Penerbit</a> |
        <a href="pengarang.php">Pengarang</a> |
        <a href="katalog.php">Katalog</a> |
    </center>

    <a href="CU_katalog.php">Add New Katalog</a>
    <table width="40%" border="1">
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($katalog as $k) : ?>
            <tr>
                <td><?= $k['nama'] ?></td>
                <td><a href="CU_katalog.php?id_katalog=<?= $k['id'] ?>">Edit</a> | <a href="delete.php?id_katalog=<?= $k['id'] ?>" onclick="confirm('Yakin dihapus ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>