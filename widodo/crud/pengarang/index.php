<?php
include_once("../connect.php");
include_once("../layout/header.php");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarangs")

?>

    <a href="add.php" class="btn btn-info">Add New Penerbit</a>
    <br>
    <table width="80%" class="table table-striped">
        <br>
        <tr>
            <th>Id</th>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($karang = mysqli_fetch_array($pengarang))
            {
                echo "<tr>";
                echo "<td>".$karang['id']."</td>";
                echo "<td>".$karang['nama_pengarang']."</td>";
                echo "<td>".$karang['email']."</td>";
                echo "<td>".$karang['telp']."</td>";
                echo "<td>".$karang['alamat']."</td>";
                echo "<td><a href='edit.php?id=$karang[id]' class='badge badge-warning'>Edit</a> 
                <a href='delete.php?id=$karang[id]' class='badge badge-danger'>Delete</a></td></tr>";
            }

        ?>
    </table>
    </div>
</body>
</html>