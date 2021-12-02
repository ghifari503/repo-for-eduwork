<?php
	$title = 'Add Pengarang';
	include_once 'shared/header.php';
?>
	<a href="pengarang.php">Go to Pengarang</a>
	<br/>
    <br/>
 
	<form action="add_pengarang.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" required></td>
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
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");
			$result = mysqli_query($mysqli, "INSERT INTO `pengarangs`(
											    `id`,
											    `nama_pengarang`,
											    `email`,
											    `telp`,
											    `alamat`,
											    `created_at`,
											    `updated_at`
											)
											VALUES(
											    NULL,
											    '$nama_pengarang',
											    '$email',
											    '$telp',
											    '$alamat',
											    NULL,
											    NULL
											);");
			
			header("Location: pengarang.php");
		}
	?>
<?php include_once 'shared/footer.php'; ?>