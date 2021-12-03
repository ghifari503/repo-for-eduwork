<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM katalogs
                                 ORDER BY katalogs.id ASC");
?>
 
<html>
<head>    
    <title>Katalog</title>
</head>
 
<body>
<center>
    <a href="../buku/index.php">Buku</a> |
    <a href="../penerbit/index.php">Penerbit</a> |
    <a href="../pengarang/index.php">Pengarang</a> |
    <a href="index.php">Katalog</a>
    <hr>
</center>

<a href="add.php">Add New Katalog</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>ID</th>
        <th>Nama</th> 
        <th>Aksi</th>
    </tr>
    <?php  
    while($katalogs_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$katalogs_data['id']."</td>";
        echo "<td>".$katalogs_data['nama']."</td>";    
        echo "<td><a href='edit.php?id=$katalogs_data[id]'>Edit</a> | <a href='delete.php?id=$katalogs_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>