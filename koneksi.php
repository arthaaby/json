<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="json";
	
	$koneksi=mysql_connect("$host","$user","$pass");
	$data=mysql_select_db("$db",$koneksi);
?>