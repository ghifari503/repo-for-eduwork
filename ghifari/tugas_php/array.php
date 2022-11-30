 
 <table border="1">
  <tr>
    <th>no</th>
    <th>nama</th>
    <th>tanggal lahir</th>
    <th>umur</th>
    <th>alamat</th>
    <th>kelas</th>
    <th>nilai</th>
    <th>hasil</th>
  </tr>
 <?php

$no = [1,2,3,4,5,6];
$nama = ["Pelita", "Najmina", "Anita", "Bayu", "Nasa", "Rahma"];
$tgl_lahir =  ["27-12-1997", "07-10-1998", "20-08-1999" , "01-01-1990", "10-04-1995", "15-09-1993"];
$alamat = ["bandung", "jakarta", "semarang", "bandung", "bandung", "yogyakarta"];
$kelas = ["laravel", "vueJS", "design", "digital marketing", "UI/UX designer", "Node JS"];
$nilai = [90, 55, 80, 65, 70, 85];

$hasil = $nilai;
// // tanggal lahir
// $tgl_lahir = date('Y-m-d', strtotime('1995-06-13'));

// // tanggal hari ini
// $today = new DateTime('today');

// // tahun
// $y = $today->diff($tgl_lahir)->y;

// // bulan
// $m = $today->diff($tgl_lahir)->m;

// // hari
// $d = $today->diff($tgl_lahir)->d;
// echo "Umur: " . $y . " tahun " ;


if ($nilai < "70") {
  echo "(C)";
} elseif ($nilai == "70-80") {
  echo "(B)";
} else  {
  echo "(A)";
}


echo "<tr>";
echo "<th>".($no[0])."</th>"."<th>".$nama[0]."</th>"."<th>". $tgl_lahir[0]."</th>"."<th>".$umur."</th>"."<th>".$alamat[0]."</th>"."<th>".$kelas[0]."</th>"."<th>".$nilai[0]."</th>".$hasil[0];
echo "</tr>";
echo "<tr>";
echo "<th>".($no[1])."</th>"."<th>".$nama[1]."</th>"."<th>". $tgl_lahir[1]."</th>"."<th>".$umur."</th>"."<th>".$alamat[1]."</th>"."<th>".$kelas[1]."</th>"."<th>".$nilai[1]."</th>".$hasil[1];
echo "</tr>";
echo "<th>".($no[2])."</th>"."<th>".$nama[2]."</th>"."<th>". $tgl_lahir[2]."</th>"."<th>".$umur."</th>"."<th>".$alamat[2]."</th>"."<th>".$kelas[2]."</th>"."<th>".$nilai[2]."</th>".$hasil[2];
echo "</tr>";
echo "<th>".($no[3])."</th>"."<th>".$nama[3]."</th>"."<th>". $tgl_lahir[3]."</th>"."<th>".$umur."</th>"."<th>".$alamat[3]."</th>"."<th>".$kelas[3]."</th>"."<th>".$nilai[3]."</th>".$hasil[3];
echo "</tr>";
echo "<th>".($no[4])."</th>"."<th>".$nama[4]."</th>"."<th>". $tgl_lahir[4]."</th>"."<th>".$umur."</th>"."<th>".$alamat[4]."</th>"."<th>".$kelas[4]."</th>"."<th>".$nilai[4]."</th>".$hasil[4];
echo "</tr>";
echo "<th>".($no[5])."</th>"."<th>".$nama[5]."</th>"."<th>". $tgl_lahir[5]."</th>"."<th>".$umur."</th>"."<th>".$alamat[5]."</th>"."<th>".$kelas[5]."</th>"."<th>".$nilai[5]."</th>".$hasil[5];
echo "</tr>";






?>

</table>
