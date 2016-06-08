<?php 
require_once('../db.php');
require_once('pointsaps.php');

class TestPS extends PHPUnit_Framework_TestCase{


	public function testdaftarSaps(){
		$li = PSaps::daftar_saps(2);
		$this->assertEquals(4, count($li));
	}

	public function testdaftarSert(){
		$li = PSaps::daftar_sert(2);
		$this->assertEquals(4, count($li));
	}

	public function testdUpdateStat(){
		$li = PSaps::hapus_saps(30);
		$this->assertTrue($li=='Berhasil Dihapus');
	}
}
 ?>