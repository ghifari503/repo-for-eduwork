<?php
include_once("../connect.php");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarangs")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homa Page</title>
</head>
<body>
    <center>
        <a href="../buku/index.php">Buku</a>
        <a href="../penerbit/index.php">Penerbit</a>
        <a href="../pengarang/index.php">Pengarang</a>
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Add New Penerbit</a>

    <table width="80%" border="1">
        <tr>
            <th>Id</th>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($karang = mysqli_fetch_array($pengarang))
            {
                echo "<tr>";
                echo "<td>".$karang['id']."</td>";
                echo "<td>".$karang['nama_pengarang']."</td>";
                echo "<td>".$karang['email']."</td>";
                echo "<td>".$karang['telp']."</td>";
                echo "<td>".$karang['alamat']."</td>";
                echo "<td><a href='edit.php?id=$karang[id]'>Edit</a> 
                | <a href='delete.php?id=$karang[id]'>Delete</a></td></tr>";
            }

        ?>
    </table>
</body>
</html>