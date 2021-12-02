<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("../connect/connect.php");
	$id = $_GET['id'];

	$pengarang = mysqli_query($conn, "SELECT * FROM pengarangs WHERE id='$id'");

    while($data_pengarang = mysqli_fetch_array($pengarang))
    {
    	$id = $data_pengarang['id'];
    	$nama = $data_pengarang['nama_pengarang'];
    	$email = $data_pengarang['email'];
    	$telp = $data_pengarang['telp'];
		$alamat = $data_pengarang['alamat'];
    }
	
?>
 
<body>

	<a href="../pengarang.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_pengarang.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>No Telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id = $_GET['id'];
			$nama = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			include_once("../connect/connect.php");

			$result = mysqli_query($conn, "UPDATE pengarangs SET nama_pengarang = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:../pengarang.php");
		}
		
	?>
</body>
</html>