<html>
<head>
    <title>Add Katalog</title>
</head>
<?php
	include_once("../config.php");
?>
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama"></td>
			</tr>
            <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
            $nama = $_POST['nama'];
        
        // include database connection file
        include_once("../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO katalogs(nama) VALUES('$nama')");
        
        // Show message when user added
        echo "Katalog added successfully. <a href='index.php'>View Katalog</a>";
    }
    ?>
</body>
</html>