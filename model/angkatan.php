<?php
 	class Angkatan{

 		public $angkatan;

 		public function __construct($angkatan) {
	      $this->angkatan      = $angkatan;
	    }

	    public static function list_angkatan() {
	    	Db::getInstance();
	      
	      $sql = "select *from angkatan";
    	$re = mysqli_query(Db::getInstance() ,$sql);
	      $list = [];
    	while ($hasil= mysqli_fetch_row($re)) {
    		$list[] = new Angkatan($hasil[0]);
    	}
			

	      return $list;
	    }
 	}
?>