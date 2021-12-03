<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM penerbits
                                 ORDER BY penerbits.id ASC");
?>
 
<html>
<head>    
    <title>Penerbit</title>
</head>
 
<body>
<center>
    <a href="../buku/index.php">Buku</a> |
    <a href="index.php">Penerbit</a> |
    <a href="../pengarang/index.php">Pengarang</a> |
    <a href="../katalog/index.php">Katalog</a>
    <hr>
</center>

<a href="add.php">Add New Penerbit</a><br/><br/>
 
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
    while($penerbits_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$penerbits_data['id']."</td>";
        echo "<td>".$penerbits_data['nama_penerbit']."</td>";
        echo "<td>".$penerbits_data['email']."</td>";
        echo "<td>".$penerbits_data['telp']."</td>";    
        echo "<td>".$penerbits_data['alamat']."</td>";    
        echo "<td><a href='edit.php?id=$penerbits_data[id]'>Edit</a> | <a href='delete.php?id=$penerbits_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>