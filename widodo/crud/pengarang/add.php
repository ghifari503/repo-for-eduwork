<?php
	include_once("../connect.php");
	include_once("../layout/header.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM pengarangs");
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="../pengarang/add.php" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" class="form-control" name="nama_pengarang"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" class="form-control" name="email"></td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="text" class="form-control" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat"></td>
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
        include_once("../connect.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO pengarangs(nama_pengarang,email,telp,alamat) VALUES('$nama_pengarang','$email','$telp','$alamat')");
        
        // Show message when user added
        echo "Penerbit added successfully. <a href='../pengarang/index.php'>View Pengarang</a>";
    }
    ?>
</div>