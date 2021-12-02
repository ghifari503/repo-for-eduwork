<?php
    $title = 'Pengarang';
    include_once 'shared/header.php';
    $pengarang = mysqli_query($mysqli, "SELECT * FROM `pengarangs`");
?>
    <a href="add_pengarang.php" class="btn btn-primary mb-3">Add New Pengarang</a>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Pengarang</th> 
                <th>Nama Pengarang</th> 
                <th>Email</th> 
                <th>No. Telepon</th> 
                <th>Alamat</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    <?php  
        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
            echo "<tr>";
            echo "<td>".$pengarang_data['id']."</td>";
            echo "<td>".$pengarang_data['nama_pengarang']."</td>";  
            echo "<td>".$pengarang_data['email']."</td>";  
            echo "<td>".$pengarang_data['telp']."</td>";  
            echo "<td>".$pengarang_data['alamat']."</td>";  
            echo "<td><a class='btn btn-success' href='edit_pengarang.php?id=$pengarang_data[id]'>Edit</a> <a class='btn btn-danger' href='delete_pengarang.php?id=$pengarang_data[id]'>Delete</a></td></tr>";        
        }
    ?>
        </tbody>
    </table>
<?php include_once 'shared/footer.php'; ?>