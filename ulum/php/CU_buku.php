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
</head>

<body>
    <a href="index.php">Back to home</a><br /><br />
    <!-- EDIT DATA -->
    <?php if (isset($_GET['id_buku'])) : ?>
        <?php
        $id_buku = $_GET['id_buku'];
        $data = query("SELECT * FROM bukus WHERE id = $id_buku")[0];
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id_buku" value="<?= $data['id'] ?>" />
            <table width="25%">
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="isbn" value="<?= $data['isbn'] ?>" /></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" value="<?= $data['judul'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="number" name="tahun" value="<?= $data['tahun'] ?>" /></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select name="penerbit">
                            <?php foreach ($penerbit as $p) : ?>
                                <option <?= ($p['id'] == $data['id_penerbit']) ? 'selected' : '' ?> value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select name="pengarang">
                            <?php foreach ($pengarang as $peng) : ?>
                                <option <?= ($peng['id'] == $data['id_pengarang']) ? 'selected' : '' ?> value="<?= $peng['id'] ?>"><?= $peng['nama_pengarang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                        <select name="katalog">
                            <?php foreach ($katalog as $kat) : ?>
                                <option <?= ($kat['id'] == $data['id_katalog']) ? 'selected' : '' ?> value="<?= $kat['id'] ?>"><?= $kat['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input type="number" name="qty_stok" value="<?= $data['qty_stok'] ?>" /></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input type="number" name="harga_pinjam" value="<?= $data['harga_pinjam'] ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="perbarui" value="Update" /></td>
                </tr>
            </table>
        </form>
    <?php else : ?>
        <!-- ADD DATA -->
        <form action="" method="POST">
            <table width="25%">
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="isbn" /></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" /></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="number" name="tahun" /></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select name="penerbit">
                            <?php foreach ($penerbit as $p) : ?>
                                <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select name="pengarang">
                            <?php foreach ($pengarang as $peng) : ?>
                                <option value="<?= $peng['id'] ?>"><?= $peng['nama_pengarang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                        <select name="katalog">
                            <?php foreach ($katalog as $kat) : ?>
                                <option value="<?= $kat['id'] ?>"><?= $kat['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input type="number" name="qty_stok" /></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input type="number" name="harga_pinjam" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="tambah" value="Add" /></td>
                </tr>
            </table>
        </form>
    <?php endif ?>
</body>

</html>