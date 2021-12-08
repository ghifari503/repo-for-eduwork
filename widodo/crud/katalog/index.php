<?php
include_once("../connect.php");
include_once("../layout/header.php");
$katalog = mysqli_query($conn, "SELECT * FROM katalogs")

?>
    <a href="add.php" class="btn btn-info">Add New Penerbit</a>
    <br>
    <table width="80%" class="table table-striped">
        <br>
        <tr>
            <th>Id</th>
            <th>Katalog</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($katalog_data = mysqli_fetch_array($katalog))
            {
                echo "<tr>";
                echo "<td>".$katalog_data['id']."</td>";
                echo "<td>".$katalog_data['nama']."</td>";
                echo "<td><a href='edit.php?id=$katalog_data[id]' class='btn btn-warning'>Edit</a> 
                 <a href='delete.php?id=$katalog_data[id]' class='btn btn-danger'>Delete</a></td></tr>";
            }

        ?>
    </table>
    </div>
</body>
</html>