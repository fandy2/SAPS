<?php 
require_once('../db.php');
require_once('mahasiswa.php');

class AuthTEST extends PHPUnit_Framework_TestCase{

	public $mahasiswa;


	

	

	public function testperangkatan(){

			
		$list=Mahasiswa::perangkatan(2012);
		$this->assertEquals(2, count($list));
	}

	public function testProfil(){

			
		$list=Mahasiswa::profil(1);
		$this->assertEquals(1, count($list));
	}

	public function testListMPersetujuan(){

			
		$list=Mahasiswa::list_minta_persetujuan();
		$this->assertEquals(1, count($list));
	}

	public function testRubahStatus(){

			
		$list=Mahasiswa::update_status_saps(1,'Ditolak',11);
		$this->assertTrue($list);
	}


}
 ?>