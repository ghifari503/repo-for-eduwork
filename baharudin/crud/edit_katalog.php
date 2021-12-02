<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("../connect/connect.php");
	$id = $_GET['id'];

	$katalog = mysqli_query($conn, "SELECT * FROM katalogs WHERE id='$id'");

    while($data_katalog = mysqli_fetch_array($katalog))
    {
    	$id = $data_katalog['id'];
    	$nama = $data_katalog['nama'];
    }
	
?>
 
<body>

	<a href="../katalog.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_katalog.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
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
			$nama = $_POST['nama'];

			include_once("../connect/connect.php");

			$result = mysqli_query($conn, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");
			
			header("Location:../katalog.php");
		}
		
	?>
</body>
</html>