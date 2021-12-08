<?php
	include_once("../connect.php");
	include_once("../layout/header.php");
	$id = $_GET['id'];
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarangs WHERE id ='$id'");

    while($karang = mysqli_fetch_array($pengarang))
    {
    	$nama_pengarang = $karang['nama_pengarang'];
    	$email = $karang['email'];
    	$telp = $karang['telp'];
    	$alamat = $karang['alamat'];
    }
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="edit.php?id=<?php echo $id; ?>" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly></td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" class="form-control" value="<?php echo $nama_pengarang; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" class="form-control" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>"></td>
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
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("../connect.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "UPDATE pengarangs SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
        
        // print_r($result);
        // die;
		header("Location:index.php");
    }
    ?>
</div>