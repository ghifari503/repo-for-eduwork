<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername,$username,$password,$database);

//check connection
if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());

}

// echo "Connected Successfuly";
// mysqli_close($conn);

$sql = "SELECT * FROM bukus";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    //output data of each row
    while ($row = $result->fetch_assoc()){
        echo "Buku : " . $row["isbn"]. "" .$row["judul"]. "<br>";
    }
}   else {
    echo "0 results";
}
$conn->close();

?>