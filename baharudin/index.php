<?php
    include("connect/connect.php");
    $buku = mysqli_query($conn, "SELECT bukus.*, nama_pengarang, nama_penerbit, nama as nama_katalog FROM bukus 
                                        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
                                        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
                                        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
                                        ORDER BY isbn ASC");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <a class="btn btn-success" href="crud/add_buku.php">Add New Buku</a><br/>

                <table class="table table-striped table-bordered mt-3" width='80%' border=1>
                    <thead class="thead-dark text-center">
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
                    </thead>

                    <?php  
                        while($buku_data = mysqli_fetch_array($buku)) {         
                            echo "<tr>";
                            echo "<td>".$buku_data['isbn']."</td>";
                            echo "<td>".$buku_data['judul']."</td>";
                            echo "<td class=\"text-center\">".$buku_data['tahun']."</td>";    
                            echo "<td>".$buku_data['nama_pengarang']."</td>";    
                            echo "<td>".$buku_data['nama_penerbit']."</td>";    
                            echo "<td>".$buku_data['nama_katalog']."</td>";    
                            echo "<td class=\"text-right\">".$buku_data['qty_stok']."</td>";    
                            echo "<td class=\"text-right\">".$buku_data['harga_pinjam']."</td>";    
                            echo "<td><a class='btn btn-info' href='crud/edit_buku.php?isbn=$buku_data[isbn]'>Edit</a> | 
                            <a class='btn btn-danger' href='crud/delete.php?isbn=$buku_data[isbn]' onclick='return confirm(\"Delete?\")'>Delete</a>
                            </td></tr>";        
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>