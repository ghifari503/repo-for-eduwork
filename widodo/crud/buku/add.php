<?php
	include_once("../connect.php");
	include_once("../layout/header.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($conn, "SELECT * FROM katalogs");
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
        <tr> 
				<td>ISBN</td>
				<td><input type="text" class="form-control" name="isbn"></td>
			</tr>
			<tr> 
				<td>Judul</td>
				<td><input type="text" class="form-control" name="judul"></td>
			</tr>
			<tr> 
				<td>Tahun</td>
				<td><input type="text" class="form-control" name="tahun"></td>
			</tr>
			<tr> 
				<td>Penerbit</td>
				<td>
					<select name="id_penerbit">
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
					<select name="id_pengarang">
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
					<select name="id_katalog">
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
				<td><input type="text" class="form-control" name="qty_stok"></td>
			</tr>
			<tr> 
				<td>Harga Pinjam</td>
				<td><input type="text" class="form-control" name="harga_pinjam"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-info mt-2" type="submit" name="Submit" value="Add"></td>
			</tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
            $isbn = $_POST['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
        
        // include database connection file
        include_once("../connect.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO bukus(isbn,judul,tahun,id_penerbit,id_pengarang,id_katalog,qty_stok,harga_pinjam) VALUES('$isbn','$judul','$tahun','$id_penerbit','$id_pengarang','$id_katalog','$qty_stok','$harga_pinjam')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Books</a>";
    }
    ?>
</div>