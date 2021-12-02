<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$sql = "SELECT * FROM anggotas WHERE alamat LIKE '%Bandung%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "nama : " . $row["name"] . "<br>" . "alamat : " . $row["alamat"] . "<br>" . "telp : " . $row["telp"] . "<br><br>";
    }
}else {
    echo "Data Kosong!";
}
mysqli_close($conn);
?>