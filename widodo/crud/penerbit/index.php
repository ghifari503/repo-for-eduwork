<?php
include_once("../connect.php");
include_once("../layout/header.php");
$penerbit = mysqli_query($conn, "SELECT * FROM penerbits")

?>
    <a href="add.php" class="btn btn-info">Add New Penerbit</a>
    <br>
    <table width="80%" class="table table-striped">
        <br>
        <tr>
            <th>Id</th>
            <th>Nama Penerbit</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($terbit = mysqli_fetch_array($penerbit))
            {
                echo "<tr>";
                echo "<td>".$terbit['id']."</td>";
                echo "<td>".$terbit['nama_penerbit']."</td>";
                echo "<td>".$terbit['email']."</td>";
                echo "<td>".$terbit['telp']."</td>";
                echo "<td>".$terbit['alamat']."</td>";
                echo "<td><a href='edit.php?id=$terbit[id]' class='badge badge-warning'>Edit</a> 
                <a href='delete.php?id=$terbit[id]' class='badge badge-danger'>Delete</a></td></tr>";
            }

        ?>
    </table>
    </div>
</body>
</html>