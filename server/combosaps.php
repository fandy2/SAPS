
<?php
session_start();
     $localhost = "localhost";
      $user = "root";
      $pass = "";
      $db = "saps";
      $s = mysqli_connect($localhost, $user, $pass, $db);

	$sql = $_POST['sql'];
	
	$data= "";
	 $rquery = mysqli_query($s,$sql);
	while($result = mysqli_fetch_row($rquery)){
		$data.= "<option class='cu' value='".$result[0]."'>".$result[1]."</option>";
	}

	echo $data;
?>