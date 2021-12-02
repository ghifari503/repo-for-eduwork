<?php
    $title = 'Homepage';
    include_once 'shared/header.php';
    $buku = mysqli_query($mysqli, "SELECT
                                        bukus.*,
                                        pengarangs.nama_pengarang,
                                        penerbits.nama_penerbit,
                                        katalogs.nama AS nama_katalog
                                    FROM
                                        bukus
                                    LEFT JOIN pengarangs ON pengarangs.id = bukus.id_pengarang
                                    LEFT JOIN penerbits ON penerbits.id = bukus.id_penerbit
                                    LEFT JOIN katalogs ON katalogs.id = bukus.id_katalog
                                    ORDER BY
                                        bukus.judul ASC");
?>

<a href="add.php" class="btn btn-primary mb-3">Add New Buku</a>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ISBN</th> 
                <th>Judul</th> 
                <th>Tahun</th> 
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Katalog</th>
                <th>Stok</th>
                <th>Harga Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody> 
    <?php 
        while ($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-success' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
        <tbody> 
    </table>
<?php include_once 'shared/footer.php'; ?>