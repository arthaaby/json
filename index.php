<title>JSON</title>
<body>
<h1> Inputkan Data Mahasiswa </h1> 
<form method="post" action="parsing.php">
	<table border="0" cellspacing="7px">
		<tr>
			<td> NRP </td>
			<td>:</td>
			<td><input type="text" name="nrp" placeholder="Masukkan NRP Mahasiswa"></input></td>
		</tr>
		<tr>
			<td> Nama Mahasiswa </td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" maxlength=40></input></td>
		</tr>
		<tr>
			<td> Jurusan </td>
			<td>:</td>
			<td><input type="text" name="jurusan" placeholder="Jurusan Mahasiswa" maxlength=40></input></td>
		</tr>
		<tr>
			<td> Jenis Kelamin </td>
			<td>:</td>
			<td>
				<input type="radio" name="jenis_kelamin" value="Pria" checked>Laki-Laki
				<input type="radio" name="jenis_kelamin" value="Perempuan" >Perempuan </td>
		</tr>		
		<tr>
			<td><td>
			<td><br>
				<input type="submit" value="Save">
				<input type="reset" value="Clear">
			</td>
		</tr>
</form>
<form action="parsing.php" method="post" enctype="multipart/form-data">
		<tr><br>
			<td><td>
			<td><input type="submit" name="submit" value="Data Mahasiswa"></td>
				
		</tr>
	</form>
</body>

<?php 
	error_reporting(0);
	include "koneksi.php";

	$nrp = $_POST["nrp"];
	$nama = $_POST["nama"];
	$jurusan = $_POST["jurusan"];
	$jenis_kelamin = $_POST["jenis_kelamin"];

	if ($nrp!="" && $nama!="" && $jurusan!="" && $jenis_kelamin!="") {
		$query = "insert into data_mhs (nrp,nama,jurusan,jenis_kelamin) values ('$nrp','$nama','$jurusan','$jenis_kelamin')";
		mysqli_query($koneksi,$query);
	};

	$tab_name = "mahasiswa";
	$query = "select * from $tab_name";
	$hasil = mysqli_query($koneksi,$queri);
	$field_count = mysqli_num_fields($hasil);
	$sitejson = array();

	while ($data=mysqli_fetch_array($hasil)) {
		$sitejson[]=array(
			'nrp' => $data['nrp'], 
			'nama' => $data['nama'],
			'jurusan' => $data['jurusan'],
			'jenis_kelamin' => $data['jenis_kelamin'] 
		);
};
?>