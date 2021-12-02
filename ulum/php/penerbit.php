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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Buku</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="penerbit.php">Penerbit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengarang.php">Pengarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="katalog.php">Katalog</a>
                    </li>
                </ul>
            </div>
        </nav>

        <a href="CU_penerbit.php" class="btn btn-primary mt-2">Add New Penerbit</a>
        <table class="table table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Penerbit</th>
                    <th>Email</th>
                    <th>No Telp.</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php foreach ($penerbit as $p) : ?>
                <tr>
                    <td><?= $p['nama_penerbit'] ?></td>
                    <td><?= $p['email'] ?></td>
                    <td><?= $p['telp'] ?></td>
                    <td><?= $p['alamat'] ?></td>
                    <td><a href="CU_penerbit.php?id_penerbit=<?= $p['id'] ?>" class="btn btn-primary">Edit</a> | <a href="delete.php?id_penerbit=<?= $p['id'] ?>" onclick="confirm('Yakin dihapus ?')" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>