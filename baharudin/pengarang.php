<?php
    include_once("connect/connect.php");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarangs 
                                        ORDER BY nama_pengarang ASC");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Perpustakaan</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="penerbit.php">Penerbit</a> |
        <a href="pengarang.php">Pengarang</a> |
        <a href="katalog.php">Katalog</a>
        <hr>
    </center>

    <a href="crud/add_pengarang.php">Add New Pengarang</a><br/><br/>
 
    <table class="table" width='80%' border=1>
 
    <tr>
        <th>Nama Pengarang</th> 
        <th>Email</th> 
        <th>Telepon</th> 
        <th>Alamat</th>
    </tr>
    <?php  
        while($data_pengarang = mysqli_fetch_array($pengarang)) {         
            echo "<tr>";
            echo "<td>".$data_pengarang['nama_pengarang']."</td>";
            echo "<td>".$data_pengarang['email']."</td>";
            echo "<td>".$data_pengarang['telp']."</td>";    
            echo "<td>".$data_pengarang['alamat']."</td>";
            echo "<td><a class='btn btn-primary' href='crud/edit_pengarang.php?id=$data_pengarang[id]'>Edit</a> | 
            <a class='btn btn-danger' href='crud/delete.php?id_pengarang=$data_pengarang[id]' onclick='return confirm(\"Delete?\")'>Delete</a>
            </td></tr>";        
        }
    ?>
    </table>
</body>
</html>