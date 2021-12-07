<?php
	include_once("../connect.php");
	$id = $_GET['id'];
    $katalog = mysqli_query($conn, "SELECT * FROM katalogs WHERE id ='$id'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$nama_katalog = $katalog_data['nama'];
    
    }
?>
<div class="container-fluid mt-3">
    <a class="btn btn-primary mb-2" href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="edit.php?id=<?php echo $id; ?>" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $id; ?>" readonly></td>
			</tr>
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama_katalog; ?>"></td>
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
			$nama_katalog = $_POST['nama'];
		
        // include database connection file
        include_once("../connect.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "UPDATE katalogs SET nama = '$nama_katalog' WHERE id = '$id';");
        
		header("Location:index.php");
    }
    ?>
</div>