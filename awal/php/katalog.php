<?php
    $title = 'Katalog';
    include_once 'shared/header.php';
    $katalog = mysqli_query($mysqli, "SELECT * FROM `katalogs`");
?>
    <a href="add_katalog.php" class="btn btn-primary mb-3">Add New Katalog</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Katalog</th> 
                <th>Nama Katalog</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['id']."</td>";
            echo "<td>".$katalog_data['nama']."</td>";  
            echo "<td><a class='btn btn-success' href='edit_katalog.php?id=$katalog_data[id]'>Edit</a> <a class='btn btn-danger' href='delete_katalog.php?id=$katalog_data[id]'>Delete</a></td></tr>";        
        }
    ?>
        </tbody>
    </table>
<?php include_once 'shared/footer.php'; ?>