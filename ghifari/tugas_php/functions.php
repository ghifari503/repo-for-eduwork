<?php
function perkalian($angka1,$angka2){
    $S=$angka1;
    $S=$angka2;
    $hasil=$S*$S;
    return $hasil;
}
echo "luas bangun datar persegi <br/>";
echo "sisi persegi 9cm <br/>";
$hasil=perkalian(9,9);
echo "perkalian 9 x 9 adalah $hasil";
echo "<hr>";


echo "Luas Lingkaran dengan jari-jari 7cm = ".luas_lingkaran(7)."cm";
 

function luas_lingkaran($jari2)
{
   return M_PI*$jari2*$jari2;
}
echo"<hr>";


function luas_segitiga($alas,$tinggi)
{
	$luas = ($alas)/2 * $tinggi;
	return $luas;
}
echo "Luas Segitiga dengan alas 6 dan tinggi 15 = ".luas_segitiga(6,15);
echo"<hr>";

function luas_persegi_panjang($panjang,$lebar)
{
	$hasil = $panjang * $lebar;
	echo "Hasil Perhitungan Persegi Panjang, Panjang = <b>".$panjang."</b> & Lebar = <b>".$lebar."</b> = <b>".$hasil."</b><br/>"; 
}
 
luas_persegi_panjang(10,5);














?>