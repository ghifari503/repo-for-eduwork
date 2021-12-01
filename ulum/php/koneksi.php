<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "perpustakaan";

$koneksi = mysqli_connect($server, $user, $password, $db);

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$data_buku = query("SELECT * FROM bukus");
$no = 1;
echo "<h1>Data Buku</h1>";
foreach ($data_buku as $buku) {
    echo $no++;
    echo ". Buku : {$buku['isbn']} {$buku['judul']} - {$buku['tahun']} <br/>";
}

$data_anggotas = query("SELECT * FROM anggotas");
$angka = 1;
echo "<h1>Data Anggota</h1>";
foreach ($data_anggotas as $anggota) {
    echo $angka++;
    echo ". Anggota : {$anggota['name']} - {$anggota['alamat']} <br/>";
}
