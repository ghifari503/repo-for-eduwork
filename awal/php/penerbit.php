<?php
    $title = 'Penerbit';
    include_once 'shared/header.php';
    $penerbit = mysqli_query($mysqli, "SELECT * FROM `penerbits`");
?>
    <a href="add_penerbit.php" class="btn btn-primary mb-3">Add New Penerbit</a>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Penerbit</th> 
                <th>Nama Penerbit</th> 
                <th>Email</th> 
                <th>No. Telepon</th> 
                <th>Alamat</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";  
            echo "<td>".$penerbit_data['email']."</td>";  
            echo "<td>".$penerbit_data['telp']."</td>";  
            echo "<td>".$penerbit_data['alamat']."</td>";  
            echo "<td><a class='btn btn-success' href='edit_penerbit.php?id=$penerbit_data[id]'>Edit</a> <a class='btn btn-danger' href='delete_penerbit.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
        </tbody>
    </table>
<?php include_once 'shared/footer.php'; ?>