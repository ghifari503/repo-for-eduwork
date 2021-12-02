<?php
	$title = 'Add Penerbit';
	include_once 'shared/header.php';
?>
	<a href="penerbit.php">Go to Penerbit</a>
	<br/><br/>
 
	<form action="add_penerbit.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" required></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr> 
				<td>No. Telepon</td>
				<td><input type="text" name="telp" required></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
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
			$result = mysqli_query($mysqli, "INSERT INTO `penerbits`(
											    `id`,
											    `nama_penerbit`,
											    `email`,
											    `telp`,
											    `alamat`,
											    `created_at`,
											    `updated_at`
											)
											VALUES(
											    NULL,
											    '$nama_penerbit',
											    '$email',
											    '$telp',
											    '$alamat',
											    NULL,
											    NULL
											);");
			
			header("Location: penerbit.php");
		}
	?>
<?php include_once 'shared/footer.php'; ?>