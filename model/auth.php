<?php
class Auth
{
	
	public $ni;
	public $pass;
  

	function __construct($ni, $pass)
	{
		 $this->ni = $ni;
		 $this->pass = $pass;
  
	}

	public static function cek($Auth, $akses) {
      	Db::getInstance();
      	$ni = $Auth->ni;
      	$pass = $Auth->pass;

        if($akses=='mahasiswa'){
          $sql = "select *from mahasiswa where nim = '$ni' and password = '$pass'";
        }elseif ($akses=='penilai'){
          $sql = "select *from penilai where nip = '$ni' and password = '$pass'";
        }else{return false;}
          
      	
      	$re = mysqli_query(Db::getInstance() ,$sql);
        
            
        
        if ($re) {
          $row = mysqli_fetch_row($re);
          $_SESSION['nama']=$row[1];
          
          if($row[0]>0) {
            return true;
          }else{return false;}
        }else{return false;}
  		

    }

}
?>