<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM pengarangs
                                 ORDER BY pengarangs.id ASC");
?>
 
<html>
<head>    
    <title>Pengarang</title>
</head>
 
<body>
<center>
    <a href="../buku/index.php">Buku</a> |
    <a href="../penerbit/index.php">Penerbit</a> |
    <a href="index.php">Pengarang</a> |
    <a href="../katalog/index.php">Katalog</a>
    <hr>
</center>

<a href="add.php">Add New Pengarang</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>ID</th>
        <th>Nama</th> 
        <th>Email</th> 
        <th>Telp</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
    while($pengarangs_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$pengarangs_data['id']."</td>";
        echo "<td>".$pengarangs_data['nama_pengarang']."</td>";
        echo "<td>".$pengarangs_data['email']."</td>";
        echo "<td>".$pengarangs_data['telp']."</td>";    
        echo "<td>".$pengarangs_data['alamat']."</td>";    
        echo "<td><a href='edit.php?id=$pengarangs_data[id]'>Edit</a> | <a href='delete.php?id=$pengarangs_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>