<?php
	$title = 'Add Katalog';
	include_once 'shared/header.php';
?>
	<a href="katalog.php" class="btn btn-warning mb-3">Cancel</a>

	<form action="add_katalog.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" class="form-control" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-primary" value="Add"></td>
			</tr>
		</table>
	</form>
<?php
	if(isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		
		include_once("connect.php");
		$result = mysqli_query($mysqli, "INSERT INTO `katalogs` (`id`, `nama`, `created_at`, `updated_at`) VALUES (NULL, '$nama', NULL, NULL);");
		
		header("Location: katalog.php");
	}
?>
<?php include_once 'shared/footer.php'; ?>