<table border="1">
  <tr>
    <th>no</th>
    <th>nama</th>
    <th>kelas</th>
  </tr>

<?php

$no = 1;
$nama = 1;

for ($no=1, $nama=1, $i=10; $nama<=10, $i>0; $nama++, $i--  ){?>

<tr>
				<th> <?php echo $no; ?></th>
				<th><?php echo "NAMA ke:".$nama; ?></th>
				<th><?php echo "Kelas".$i; ?></th>
			</tr>
         <?php $no++;}?>


