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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Buku</a>
                    </li>
                    <li class="nav-item">
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

        <a href="CU_buku.php" class="btn btn-primary mt-2">Add New Buku</a>
        <table class="table table-hover mt-3">
            <thead class="thead-dark">
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
            </thead>
            <tbody>
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
                        <td><a href="CU_buku.php?id_buku=<?= $b['id'] ?>" class="btn btn-primary">Edit</a> | <a href="delete.php?isbn=<?= $b['isbn'] ?>" onclick="confirm('Yakin dihapus ?')" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>