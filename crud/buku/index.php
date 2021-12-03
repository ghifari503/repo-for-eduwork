<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT bukus.*, pengarangs.nama_pengarang, penerbits.nama_penerbit, katalogs.nama AS katalog FROM bukus 
                                 JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
                                 JOIN penerbits on bukus.id_penerbit = penerbits.id 
                                 JOIN katalogs on bukus.id_katalog = katalogs.id
                                 ORDER BY bukus.id ASC");
?>
 
<html>
<head>    
    <title>Buku</title>
</head>
 
<body>
<center>
    <a href="index.php">Buku</a> |
    <a href="../penerbit/index.php">Penerbit</a> |
    <a href="../pengarang/index.php">Pengarang</a> |
    <a href="../katalog/index.php">Katalog</a>
    <hr>
</center>

<a href="add.php">Add New Buku</a><br/><br/>
 
    <table width='80%' border=1>
 
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
    while($bukus_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$bukus_data['isbn']."</td>";
        echo "<td>".$bukus_data['judul']."</td>";
        echo "<td>".$bukus_data['tahun']."</td>";    
        echo "<td>".$bukus_data['nama_pengarang']."</td>";    
        echo "<td>".$bukus_data['nama_penerbit']."</td>";    
        echo "<td>".$bukus_data['katalog']."</td>";    
        echo "<td>".$bukus_data['qty_stok']."</td>";    
        echo "<td>".$bukus_data['harga_pinjam']."</td>";    
        echo "<td><a href='edit.php?isbn=$bukus_data[isbn]'>Edit</a> | <a href='delete.php?isbn=$bukus_data[isbn]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>