<?php
// Create database connection using config file
include_once("../config.php");
include_once("../master/master.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM pengarangs
                                 ORDER BY pengarangs.id ASC");
?>

<div class="container mt-3">
<a class="btn btn-primary mb-2" href="add.php">Add New Pengarang</a>
 
    <table class="table table-striped">
 
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
        echo "<td><a class='btn btn-info mr-1' href='edit.php?id=$pengarangs_data[id]'>Edit</a>  <a class='btn btn-danger ml-1' href='delete.php?id=$pengarangs_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</div>
