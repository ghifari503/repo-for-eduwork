<?php
include_once("../connect.php");
$penerbit = mysqli_query($conn, "SELECT * FROM penerbits")

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
            <th>Nama Penerbit</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($terbit = mysqli_fetch_array($penerbit))
            {
                echo "<tr>";
                echo "<td>".$terbit['id']."</td>";
                echo "<td>".$terbit['nama_penerbit']."</td>";
                echo "<td>".$terbit['email']."</td>";
                echo "<td>".$terbit['telp']."</td>";
                echo "<td>".$terbit['alamat']."</td>";
                echo "<td><a href='edit.php?id=$terbit[id]'>Edit</a> 
                | <a href='delete.php?id=$terbit[id]'>Delete</a></td></tr>";
            }

        ?>
    </table>
</body>
</html>