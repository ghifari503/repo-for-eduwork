<?php
require_once 'koneksi.php';
$pengarang = query("SELECT * FROM pengarangs");
$penerbit = query("SELECT * FROM penerbits");
$katalog = query("SELECT * FROM katalogs");

//-----------Add Data
if (isset($_POST['tambah'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $penerbits = $_POST['penerbit'];
    $pengarangs = $_POST['pengarang'];
    $katalogs = $_POST['katalog'];
    $qty_stok = $_POST['qty_stok'];
    $harga_pinjam = $_POST['harga_pinjam'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "INSERT INTO `bukus` VALUES (NULL, '$isbn', '$judul', '$tahun', '$penerbits', '$pengarangs', '$katalogs', '$qty_stok', '$harga_pinjam', '$timestamp', NULL);");

    header("Location: index.php");
}

//-----------Update Data
if (isset($_POST['perbarui'])) {
    $id_buku = $_POST['id_buku'];
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $penerbits = $_POST['penerbit'];
    $pengarangs = $_POST['pengarang'];
    $katalogs = $_POST['katalog'];
    $qty_stok = $_POST['qty_stok'];
    $harga_pinjam = $_POST['harga_pinjam'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "UPDATE `bukus` SET `isbn` = '$isbn', `judul` = '$judul', `tahun` = '$tahun', `id_penerbit` = '$penerbits', `id_pengarang` = '$pengarangs', `id_katalog` = '$katalogs', `qty_stok` = '$qty_stok', `harga_pinjam` = '$harga_pinjam', `updated_at` = '$timestamp' WHERE `bukus`.`id` = $id_buku;");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create & Update Data Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn btn-primary mt-2">Back to home</a><br /><br />
        <!-- EDIT DATA -->
        <?php if (isset($_GET['id_buku'])) : ?>
            <?php
            $id_buku = $_GET['id_buku'];
            $data = query("SELECT * FROM bukus WHERE id = $id_buku")[0];
            ?>
            <form action="" method="POST">
                <input type="hidden" name="id_buku" value="<?= $data['id'] ?>" />
                <table class="table table-borderless">
                    <tr>
                        <td width="20%">ISBN</td>
                        <td><input type="text" name="isbn" value="<?= $data['isbn'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td><input type="number" name="tahun" value="<?= $data['tahun'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>
                            <select name="penerbit" class="form-control">
                                <?php foreach ($penerbit as $p) : ?>
                                    <option <?= ($p['id'] == $data['id_penerbit']) ? 'selected' : '' ?> value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td>
                            <select name="pengarang" class="form-control">
                                <?php foreach ($pengarang as $peng) : ?>
                                    <option <?= ($peng['id'] == $data['id_pengarang']) ? 'selected' : '' ?> value="<?= $peng['id'] ?>"><?= $peng['nama_pengarang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Katalog</td>
                        <td>
                            <select name="katalog" class="form-control">
                                <?php foreach ($katalog as $kat) : ?>
                                    <option <?= ($kat['id'] == $data['id_katalog']) ? 'selected' : '' ?> value="<?= $kat['id'] ?>"><?= $kat['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Qty Stok</td>
                        <td><input type="number" name="qty_stok" value="<?= $data['qty_stok'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Harga Pinjam</td>
                        <td><input type="number" name="harga_pinjam" value="<?= $data['harga_pinjam'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><input type="submit" name="perbarui" value="Update" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
        <?php else : ?>
            <!-- ADD DATA -->
            <form action="" method="POST">
                <table class="table table-borderless">
                    <tr>
                        <td width="20%">ISBN</td>
                        <td><input type="text" name="isbn" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judul" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td><input type="number" name="tahun" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>
                            <select name="penerbit" class="form-control">
                                <?php foreach ($penerbit as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td>
                            <select name="pengarang" class="form-control">
                                <?php foreach ($pengarang as $peng) : ?>
                                    <option value="<?= $peng['id'] ?>"><?= $peng['nama_pengarang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Katalog</td>
                        <td>
                            <select name="katalog" class="form-control">
                                <?php foreach ($katalog as $kat) : ?>
                                    <option value="<?= $kat['id'] ?>"><?= $kat['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Qty Stok</td>
                        <td><input type="number" name="qty_stok" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Harga Pinjam</td>
                        <td><input type="number" name="harga_pinjam" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><input type="submit" name="tambah" value="Add" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
        <?php endif ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>