
<?php
session_start();
    $host="localhost";
	$user="root";
	$password="";	
	$koneksi=mysql_connect($host,$user,$password) or die("Gagal Koneksi !");
	mysql_select_db("saps");

	$sql = $_POST['sql'];
	
	$data= "";
	 $rquery = mysql_query($sql);
	
	while($result = mysql_fetch_row($rquery)){
		$data .= "<tr>
		<th><input type='checkbox' class='cek' value=".$result[8]."></th>
			<th>".$result[0]."</th>
			<th>".$result[1]."</th>
			<th>".$result[2]."</th>
			<th>".$result[3]."</th>
			<th>".$result[4]."</th>
			<th>".$result[5]."</th>
			<th>".$result[6]."</th>
			<th>".$result[7]."</th>
			
		</tr>" ;
	}

	echo $data;
?>