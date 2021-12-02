<?php
	$title = 'Edit Pengarang';
	include_once 'shared/header.php';

	$id = $_GET['id'];
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs WHERE id = '$id'");

    while($pengarang_data = mysqli_fetch_array($pengarang)) {
    	$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email = $pengarang_data['email'];
    	$telp = $pengarang_data['telp'];
    	$alamat = $pengarang_data['alamat'];
    }
?>
	<a href="pengarang.php" class="btn btn-warning mb-3">Cancel</a>
 
	<form action="edit_pengarang.php?id=<?php echo $id; ?>" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" class="form-control" value="<?php echo $nama_pengarang; ?>" required></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required></td>
			</tr>
			<tr> 
				<td>No. Telepon</td>
				<td><input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>" required></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-primary mt-3" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
		if (isset($_POST['Submit'])) {
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");
			$result = mysqli_query($mysqli, "UPDATE `pengarangs` SET `nama_pengarang` = '$nama_pengarang', `email` = '$email', telp = '$telp', `alamat` = '$alamat' WHERE `pengarangs`.`id` = '$id';");
			
			header("Location: pengarang.php");
		}
	?>
<?php include_once 'shared/footer.php'; ?>