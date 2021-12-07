<?php
include_once("../connect.php");
$katalog = mysqli_query($conn, "SELECT * FROM katalogs")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homa Page</title>
</head>
<body>
    <center>
        <a href="../buku/index.php">Buku</a>
        <a href="../penerbit/index.php">Penerbit</a>
        <a href="../pengarang/index.php">Pengarang</a>
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Add New Penerbit</a>

    <table width="80%" border="1">
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
                echo "<td><a href='edit.php?id=$katalog_data[id]'>Edit</a> 
                | <a href='delete.php?id=$katalog_data[id]'>Delete</a></td></tr>";
            }

        ?>
    </table>
</body>
</html>