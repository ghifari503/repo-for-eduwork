<?php
	include_once("../config.php");
	include_once("../master/master.php");
	$id = $_GET['id'];

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs WHERE id='$id'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id = $katalog_data['id'];
    	$nama = $katalog_data['nama'];
    }
?>
 
<div class="container-fluid mt-3">
	<a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
 
	<form action="edit.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
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

			

			$id = $_GET['id'];
			$nama = $_POST['nama'];
			
			include_once("../config.php");

			$result = mysqli_query($mysqli, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");
			
			header("Location:index.php");;
		}
	?>
</div>
