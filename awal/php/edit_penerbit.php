<?php
	$title = 'Edit Penerbit';
	include_once 'shared/header.php';

	$id = $_GET['id'];
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits WHERE id = '$id'");

    while($penerbit_data = mysqli_fetch_array($penerbit)) {
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>
	<a href="penerbit.php">Go to Penerbit</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id=<?php echo $id; ?>" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>" required></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
			</tr>
			<tr> 
				<td>No. Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>" required></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Edit"></td>
			</tr>
		</table>
	</form>
	
	<?php
		if (isset($_POST['Submit'])) {
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");
			$result = mysqli_query($mysqli, "UPDATE `penerbits` SET `nama_penerbit` = '$nama_penerbit', `email` = '$email', telp = '$telp', `alamat` = '$alamat' WHERE `penerbits`.`id` = '$id';");
			
			header("Location: penerbit.php");
		}
	?>
<?php include_once 'shared/footer.php'; ?>