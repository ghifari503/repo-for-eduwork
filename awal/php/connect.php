<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Connect to the database server
$mysqli = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$mysqli) {
    echo 'Unable to connect to the database: ' . mysqli_connect_error();
    exit();
}

// Create the query
$query = "SELECT * FROM bukus";

// Send the query to MySQL
$result = $mysqli->query($query);

// Check if data exists
if ($result->num_rows > 0) {
    // Iterate through the result set
    while($book = $result->fetch_assoc()) {
        echo 'Buku: ' . $book['isbn'] . ' ' . $book['judul'] . '<br />';
    }
} else {
    echo '0 Results';
}

// close the connection
$mysqli->close();