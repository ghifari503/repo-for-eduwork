<?php
	include_once("../config.php");
	include_once("../master/master.php");
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-1" href="index.php">Go to Home</a>
    
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
        <tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>Telpon</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
            <tr> 
				<td></td>
				<td><input class="btn btn-info mt-2" type="submit" name="Submit" value="Add"></td>
			</tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
            $nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO pengarangs(nama_pengarang,email,telp,alamat) VALUES('$nama_pengarang','$email','$telp','$alamat')");
        
        // Show message when user added
        echo "Pengarang added successfully. <a href='index.php'>View Pengarang</a>";
    }
    ?>
</div>