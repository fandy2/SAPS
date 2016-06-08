<?php 
require_once('../db.php');
require_once('angkatan.php');
/**
* 
*/
class AngkatanTEST extends PHPUnit_Framework_TestCase
{
	

	public function testangkatan(){
		
		$list=Angkatan::list_angkatan();
		$this->assertEquals(4, count($list));
		
	}
}


 ?>