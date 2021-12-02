<html>
<head>
	<title>Add Pengarang</title>
</head>

<?php
	include_once("../connect/connect.php");
?>

<body>
	<a href="../pengarang.php">Go to Home</a>
	<br/><br/>
 
	<form action="add_pengarang.php" method="post" name="form1">
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
				<td>No Telp</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
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
			
			include_once("../connect/connect.php");

			$result = mysqli_query($conn, "INSERT INTO `pengarangs` (`nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$nama_pengarang', '$email', '$telp', '$alamat');");
			
			header("Location:../pengarang.php");
		}
	?>
</body>
</html>