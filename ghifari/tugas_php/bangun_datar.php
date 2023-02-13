<?php

$S = 9;
$p = 12;
$l = 5;
$a = 9;
$t = 4;
$d1 = 18;
$d2 = 10;


echo "luas bangun datar persegi <br/>";
echo "sisi persegi 9cm <br/>";
$L = $S * $S;
echo "$S * $S = $L";
echo "<hr>";

echo "luas bangun datar persegi panjang <br/>";
echo "Tono membeli kertas berbentuk persegi panjang dengan panjang 12 cm dan lebar 5 cm. Berapakah luas kertas yang dibeli Tono tersebut? <br/>";
$L = $p * $l;
echo "$p * $l = $L";
echo "<hr>";


echo "luas bangun datar segitiga <br/>";
echo "Sebuah segitiga memiliki ukuran alas 9 cm dan tinggi 4 cm. Berapakah luas dari segitiga tersebut <br/>";
$L = 0.5 * $a * $t;
echo "0.5 * $a * $t = $L";
echo "<hr>";

echo "luas bangun datar jajar genjang <br/>";
echo "Berapakah luas dari jajar genjang jika diketahui memiliki alas 9 cm dan tinggi 4 cm? <br/>";
$L = $a * $t;
echo "$a * $t = $L";
echo "<hr>";

echo "luas bangun datar belah ketupat <br/>";
echo "Hitunglah luas belah ketupat yang memiliki ukuran diagonal 18 cm dan 10 cm. <br/>";
$L = 0.5 * $d1 * $d2;
echo "0.5 * $d1 * $d2 = $L";
echo "<hr>";







?>