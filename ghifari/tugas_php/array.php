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
$alamat =       ["bandung", "jakarta", "semarang", "bandung", "bandung", "yogyakarta"];
$kelas =      ["laravel", "vueJS", "design", "digital marketing", "UI/UX designer", "Node JS"];
$nilai =      [90, 55, 80, 65, 70, 85];


for ($i=0; $i < count($no) ; $i++) { 
  if ($nilai[$i] < 70) {
    $hasil  = "(C)";
  } elseif ($nilai[$i] >= 70 && $nilai[$i] <= 80) {
    $hasil = "(B)";
  } else  {
    $hasil = "(A)";
  }  

  // tanggal lahir
  $tgl_lahir[$i] = date_create($tgl_lahir[$i]);

  // tanggal hari ini
  $today = new DateTime('today');

  // tahun
  $y = $today->diff($tgl_lahir[$i])->y;

  // bulan
  $m = $today->diff($tgl_lahir[$i])->m;

  // hari
  $d = $today->diff($tgl_lahir[$i])->d;
  $umur[$i] = $y . " tahun " ;

  echo "<tr>";
  echo "<th>".$no[$i]."</th>"."<th>".$nama[$i]."</th>"."<th>". $tgl_lahir[$i]->format('d-m-Y') ."</th>"."<th>".$umur[$i]."</th>"."<th>".$alamat[$i]."</th>"."<th>".$kelas[$i]."</th>"."<th>".$nilai[$i]."</th>"."<th>".$hasil."</th>";
  echo "</tr>";
}

?>

</table>