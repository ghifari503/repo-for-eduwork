<?php
	include_once("../connect.php");
	$id = $_GET['id'];
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbits WHERE id ='$id'");

    while($terbit = mysqli_fetch_array($penerbit))
    {
    	$nama_penerbit = $terbit['nama_penerbit'];
    	$email = $terbit['email'];
    	$telp = $terbit['telp'];
    	$alamat = $terbit['alamat'];
    }
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="edit.php?id=<?php echo $id; ?>" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $id; ?>" readonly></td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-info mt-2" type="submit" name="update" value="Update"></td>
			</tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['update'])) {
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("../connect.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "UPDATE penerbits SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
        
		header("Location:index.php");
    }
    ?>
</div>