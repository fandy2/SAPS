<?php 
require_once('../db.php');
require_once('komentar.php');

class AuthTEST extends PHPUnit_Framework_TestCase{

	public $komentar;




	public function testDaftarKomentar(){

			
		$list=Komentar::daftar_komentar(17);
		$this->assertEquals(4, count($list));
	}

	public function testDaftarKomentarPenilai(){

			
		$list=Komentar::daftar_komentar_penilai(11);
		$this->assertEquals(1, count($list));
	}


	public function testinputKomentar(){

		$kom= new Komentar('','test komen',1,11,'','');
		$hasil = Komentar::input_komentar($kom,'mahasiswa');

		$this->assertTrue($hasil);
	}




}

 ?>