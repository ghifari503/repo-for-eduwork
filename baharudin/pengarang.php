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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Perpustakaan</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="penerbit.php">Penerbit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengarang.php">Pengarang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="katalog.php">Katalog</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col pt-4">
                <a class="btn btn-success" href="crud/add_pengarang.php">Add New Pengarang</a><br/>

                <table class="table table-striped table-bordered mt-3" width='80%' border=1>
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Nama Pengarang</th> 
                            <th>Email</th> 
                            <th>Telepon</th> 
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php  
                        while($data_pengarang = mysqli_fetch_array($pengarang)) {         
                            echo "<tr>";
                            echo "<td>".$data_pengarang['nama_pengarang']."</td>";
                            echo "<td>".$data_pengarang['email']."</td>";
                            echo "<td>".$data_pengarang['telp']."</td>";    
                            echo "<td>".$data_pengarang['alamat']."</td>";
                            echo "<td><a class='btn btn-info' href='crud/edit_pengarang.php?id=$data_pengarang[id]'>Edit</a> | 
                            <a class='btn btn-danger' href='crud/delete.php?id_pengarang=$data_pengarang[id]' onclick='return confirm(\"Delete?\")'>Delete</a>
                            </td></tr>";        
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>