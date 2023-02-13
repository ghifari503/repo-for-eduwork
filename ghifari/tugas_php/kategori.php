<?php
$nama = "GHIFARI";
$tb = 1.7;
$bb = 55;

$bmi = $bb/pow($tb,2);


echo "<p>Halo, &nbsp;"   . $nama; 
echo ". Nilai bmi anda adalah &nbsp;" .$bmi;

if ($bmi < "18.5") {
  echo "(kurus)";
} elseif ($bmi > "18.5-24.9") {
  echo "(sedang)";
} else  {
  echo "(gemuk)";
}
?>