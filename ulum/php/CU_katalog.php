<?php
require_once 'koneksi.php';

//-----------ADD Data
if (isset($_POST['tambah'])) {
    $nama = $_POST['katalog'];
    $timestamp = date("Y-m-d H:i:s");
    mysqli_query($koneksi, "INSERT INTO `katalogs` VALUES (NULL, '$nama', '$timestamp', NULL);");

    header("Location: katalog.php");
}

//-----------Update Data
if (isset($_POST['perbarui'])) {
    $id = $_POST['id_katalog'];
    $nama = $_POST['katalog'];
    $timestamp = date("Y-m-d H:i:s");
    mysqli_query($koneksi, "UPDATE `katalogs` SET `nama` = '$nama', `updated_at` = '$timestamp' WHERE `katalogs`.`id` = $id;");

    header("Location: katalog.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create & Update Data Katalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <a href="katalog.php" class="btn btn-primary mt-2">Back to katalog</a><br /><br />
        <?php if ($_GET['id_katalog']) : ?>
            <?php
            $id = $_GET['id_katalog'];
            $data = query("SELECT * FROM katalogs WHERE id = $id")[0];
            ?>
            <!-- Update DATA -->
            <form action="" method="POST">
                <input type="hidden" name="id_katalog" value="<?= $data['id'] ?>" />
                <table class="table table-borderless">
                    <tr>
                        <td width="20%">Nama Katalog</td>
                        <td><input type="text" name="katalog" value="<?= $data['nama'] ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><input type="submit" name="perbarui" value="UPDATE" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
        <?php else : ?>
            <!-- ADD DATA -->
            <form action="" method="POST">
                <table class="table table-borderless">
                    <tr>
                        <td width="20%">Nama Katalog</td>
                        <td><input type="text" name="katalog" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><input type="submit" name="tambah" value="ADD" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>