<?php
require_once 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "INSERT INTO `penerbits` VALUES (NULL, '$nama_penerbit', '$email', '$no_telp', '$alamat', '$timestamp', NULL);");

    header("Location: penerbit.php");
}

if (isset($_POST['perbarui'])) {
    $id = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "UPDATE `penerbits` SET `nama_penerbit` = '$nama_penerbit', `email` = '$email', `telp` = '$no_telp', `alamat` = '$alamat', `updated_at` = '$timestamp' WHERE `penerbits`.`id` = $id;");

    header("Location: penerbit.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create & Update Data Penerbit</title>
</head>

<body>
    <a href="penerbit.php">Back to penerbit</a><br /><br />
    <!-- Update DATA -->
    <?php if (isset($_GET['id_penerbit'])) : ?>
        <?php
        $id = $_GET['id_penerbit'];
        $data = query("SELECT * FROM penerbits WHERE id = $id")[0];
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id_penerbit" value="<?= $data['id'] ?>" />
            <table width="25%">
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama_penerbit" value="<?= $data['nama_penerbit'] ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?= $data['email'] ?>" /></td>
                </tr>
                <tr>
                    <td>No Telp.</td>
                    <td><input type="number" name="no_telp" value="<?= $data['telp'] ?>" /></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat" cols="17" rows="5"><?= $data['alamat'] ?></textarea></td>
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
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama_penerbit" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" /></td>
                </tr>
                <tr>
                    <td>No Telp.</td>
                    <td><input type="number" name="no_telp" /></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat" cols="17" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="tambah" value="Add" /></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>