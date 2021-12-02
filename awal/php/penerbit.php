<?php
    $title = 'Penerbit';
    include_once 'shared/header.php';
    $penerbit = mysqli_query($mysqli, "SELECT * FROM `penerbits`");
?>
    <a href="add_penerbit.php">Add New Penerbit</a>
    <br/>
    <br/>
 
    <table class="table" width='80%' border=1>
 
    <tr>
        <th>Id Penerbit</th> 
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>No. Telepon</th> 
        <th>Alamat</th> 
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";  
            echo "<td>".$penerbit_data['email']."</td>";  
            echo "<td>".$penerbit_data['telp']."</td>";  
            echo "<td>".$penerbit_data['alamat']."</td>";  
            echo "<td><a class='btn btn-primary' href='edit_penerbit.php?id=$penerbit_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete_penerbit.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
<?php include_once 'shared/footer.php' ?>