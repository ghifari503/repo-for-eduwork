<?php
include_once("../connect.php");
$buku = mysqli_query($conn, "SELECT bukus.*, pengarangs.nama_pengarang, penerbits.nama_penerbit, katalogs.nama AS katalog FROM bukus 
JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
JOIN penerbits on bukus.id_penerbit = penerbits.id 
JOIN katalogs on bukus.id_katalog = katalogs.id
ORDER BY bukus.id ASC ")

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

    <a href="add.php">Add new book</a>

    <table width="80%" border="1">
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
        <?php
            while($buku_data = mysqli_fetch_array($buku))
            {
                echo "<tr>";
                echo "<td>".$buku_data['isbn']."</td>";
                echo "<td>".$buku_data['judul']."</td>";
                echo "<td>".$buku_data['tahun']."</td>";
                echo "<td>".$buku_data['nama_pengarang']."</td>";
                echo "<td>".$buku_data['nama_penerbit']."</td>";
                echo "<td>".$buku_data['katalog']."</td>";
                echo "<td>".$buku_data['qty_stok']."</td>";
                echo "<td>".$buku_data['harga_pinjam']."</td>";
                echo "<td><a href='edit.php?isbn=$buku_data[isbn]'>Edit</a> 
                | <a href='delete.php?isbn=$buku_data[isbn]' onclick='return confirm('Are you sure want to delete this record?');'>Delete</a></td></tr>";
            }

        ?>
    </table>
</body>
</html>