<?php
session_start();
    $host="localhost";
	$user="root";
	$password="";	
	$koneksi=mysql_connect($host,$user,$password) or die("Gagal Koneksi !");
	mysql_select_db("saps");

	$sql = $_POST['sql'];

	if (mysql_query($sql)) {
    echo "SAPS Dihapus";
} else {
    echo "Gagal Hapus SAPS" ;
}

?>