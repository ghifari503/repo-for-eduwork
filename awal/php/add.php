<?php
	$title = 'Add Buku';
	include_once 'shared/header.php';
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ISBN</td>
				<td><input type="text" name="isbn" required></td>
			</tr>
			<tr> 
				<td>Judul</td>
				<td><input type="text" name="judul" required></td>
			</tr>
			<tr> 
				<td>Tahun</td>
				<td><input type="number" name="tahun" required></td>
			</tr>
			<tr> 
				<td>Penerbit</td>
				<td>
					<select name="id_penerbit" required>
						<?php 
						    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
						    	echo "<option value='".$penerbit_data['id']."'>".$penerbit_data['nama_penerbit']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Pengarang</td>
				<td>
					<select name="id_pengarang" required>
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option value='".$pengarang_data['id']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Katalog</td>
				<td>
					<select name="id_katalog" required>
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option value='".$katalog_data['id']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Qty Stok</td>
				<td><input type="number" name="qty_stok" required></td>
			</tr>
			<tr> 
				<td>Harga Pinjam</td>
				<td><input type="number" name="harga_pinjam" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
		if (isset($_POST['Submit'])) {
			$isbn = $_POST['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `bukus`(
											    `isbn`,
											    `judul`,
											    `tahun`,
											    `id_penerbit`,
											    `id_pengarang`,
											    `id_katalog`,
											    `qty_stok`,
											    `harga_pinjam`
											)
											VALUES(
											    '$isbn',
											    '$judul',
											    '$tahun',
											    '$id_penerbit',
											    '$id_pengarang',
											    '$id_katalog',
											    '$qty_stok',
											    '$harga_pinjam'
											);");
			
			header("Location: index.php");
		}
	?>
<?php include_once 'shared/footer.php' ?>