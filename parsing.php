<title>Data mahasiswa</title>
<body>
	<h2>Data Mahasiswa<h2>
	<input type="file" name="file"><br>
</body>
<?php

$str = file_get_contents('mahasiswa.json');
$json = json_decode($str,true);

$jsonIterator = new RecursiveIteratorIterator(
	new RecursiveArrayIterator(json_decode($str,TRUE)),
	RecursiveIteratorIterator::SELF_FIRST);
?>
	
	<table width="600" border="0">
	<tr style='background:black;color:white'>  
	   	<th>NRP</th> 
 	 	<th>NAMA</th>
		<th>JURUSAN</th>
		<th>JENIS KELAMIN</th>
	</tr>
<?php
// $jumArray=count($json);
// for($i=0;$i<$jumArray;$i++) {
foreach ($json as $key => $value) {
?>
	<tr align="center" fontcolor:white>
		<td><?php echo $value['nrp']; ?></td>
		<td><?php echo $value['nama']; ?></td>
		<td><?php echo $value['jurusan']; ?></td>
		<td><?php echo $value['jenis_kelamin']; ?></td>
	</tr>
<?php	
};
	echo "</table>";
//print_r(count($json[0]));
?>