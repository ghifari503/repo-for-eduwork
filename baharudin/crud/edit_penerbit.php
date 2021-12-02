<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("../connect/connect.php");
	$id = $_GET['id'];

	$penerbit = mysqli_query($conn, "SELECT * FROM penerbits WHERE id='$id'");

    while($data_penerbit = mysqli_fetch_array($penerbit))
    {
    	$id = $data_penerbit['id'];
    	$nama = $data_penerbit['nama_penerbit'];
    	$email = $data_penerbit['email'];
    	$telp = $data_penerbit['telp'];
		$alamat = $data_penerbit['alamat'];
    }
	
?>
 
<body>

	<a href="../penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama; ?>"></td>
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
			$nama = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			include_once("../connect/connect.php");

			$result = mysqli_query($conn, "UPDATE penerbits SET nama_penerbit = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:../penerbit.php");
		}
		
	?>
</body>
</html>