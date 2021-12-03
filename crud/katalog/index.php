<?php
// Create database connection using config file
include_once("../config.php");
include_once("../master/master.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM katalogs
                                 ORDER BY katalogs.id ASC");
?>
 
<div class="container mt-3">

<a class="btn btn-primary mb-2" href="add.php">Add New Katalog</a>
 
    <table class="table table-striped">
 
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
        echo "<td><a class='btn btn-info mr-1' href='edit.php?id=$katalogs_data[id]'>Edit</a>  <a class='btn btn-danger' href='delete.php?id=$katalogs_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</div>
