<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("connection failed:" . mysqli_connected_error());
}

// echo "connected successfully";
// mysqli_close($conn);

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($result->num_row >0){
    while($row = $result->fetch_assoc()){
        echo "buku : " . $row["isbn"]. " ". $row["judul"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
