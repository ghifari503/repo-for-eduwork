<?php
// Create database connection using config file
include_once("../config.php");
include_once("../master/master.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT bukus.*, pengarangs.nama_pengarang, penerbits.nama_penerbit, katalogs.nama AS katalog FROM bukus 
                                 JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
                                 JOIN penerbits on bukus.id_penerbit = penerbits.id 
                                 JOIN katalogs on bukus.id_katalog = katalogs.id
                                 ORDER BY bukus.id ASC");
?>
 
<div class="container mt-3">
  
    <a class="btn btn-primary mb-2" href="add.php" role="button">Add New Buku</a>
    
        <table class="table table-striped">
        <thead>
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
        <tbody>
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
            echo "<td><a class='btn btn-info mr-1' href='edit.php?isbn=$bukus_data[isbn]'>Edit</a>  <a class='btn btn-danger ml-1' href='delete.php?isbn=$bukus_data[isbn]'>Delete</a></td></tr>";        
        }
        ?>
        </tbody>
        </table>
    </div>
