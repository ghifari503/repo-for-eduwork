<?php
require_once 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "INSERT INTO `pengarangs` VALUES (NULL, '$nama_pengarang', '$email', '$no_telp', '$alamat', '$timestamp', NULL);");

    header("Location: pengarang.php");
}

if (isset($_POST['perbarui'])) {
    $id = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $timestamp = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "UPDATE `pengarangs` SET `nama_pengarang` = '$nama_pengarang', `email` = '$email', `telp` = '$no_telp', `alamat` = '$alamat', `updated_at` = '$timestamp' WHERE `pengarangs`.`id` = $id;");

    header("Location: pengarang.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create & Update Data Pengarang</title>
</head>

<body>
    <a href="pengarang.php">Back to pengarang</a><br /><br />
    <!-- Update DATA -->
    <?php if (isset($_GET['id_pengarang'])) : ?>
        <?php
        $id = $_GET['id_pengarang'];
        $data = query("SELECT * FROM pengarangs WHERE id = $id")[0];
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id_pengarang" value="<?= $data['id'] ?>" />
            <table width="25%">
                <tr>
                    <td>Nama Pengarang</td>
                    <td><input type="text" name="nama_pengarang" value="<?= $data['nama_pengarang'] ?>" /></td>
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
                    <td>Nama Pengarang</td>
                    <td><input type="text" name="nama_pengarang" /></td>
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