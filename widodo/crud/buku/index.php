<?php
include_once("../connect.php");
include_once("../layout/header.php");
$buku = mysqli_query($conn, "SELECT bukus.*, pengarangs.nama_pengarang, penerbits.nama_penerbit, katalogs.nama AS katalog FROM bukus 
JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
JOIN penerbits on bukus.id_penerbit = penerbits.id 
JOIN katalogs on bukus.id_katalog = katalogs.id
ORDER BY bukus.id ASC ")

?>


    <a href="add.php" class="btn btn-info">Add new book</a>
    <br>
    <table class="table table-striped" width="80%">
        <br>
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
                echo "<td><a href='edit.php?isbn=$buku_data[isbn]' class='badge badge-warning'>Edit</a> 
                 <a href='delete.php?isbn=$buku_data[isbn]' class='badge badge-danger'>Delete</a></td></tr>";
            }

        ?>
    </table>
    </div>
</body>
</html>