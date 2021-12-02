<?php
	$title = 'Edit Katalog';
	include_once 'shared/header.php';

	$id = $_GET['id'];
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");

    while ($katalog_data = mysqli_fetch_array($katalog)) {
    	$nama = $katalog_data['nama'];
    }
?>
	<a href="katalog.php" class="btn btn-warning mb-3">Cancel</a>
 
	<form action="edit_katalog.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" class="btn btn-primary mt-2" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
		if(isset($_POST['update'])) {
			$nama = $_POST['nama'];
			
			include_once("connect.php");
			$result = mysqli_query($mysqli, "UPDATE `katalogs` SET `nama` = '$nama' WHERE `id` = '$id';");
			
			header("Location: katalog.php");
		}
	?>
<?php include_once 'shared/footer.php'; ?>