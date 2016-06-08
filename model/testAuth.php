<?php 
require_once('../db.php');
require_once('auth.php');

class AuthTEST extends PHPUnit_Framework_TestCase{

	public $auth;


	public function set(){

		$ni=$this->auth = new Auth(1311522022,11111);
		$this->assertTrue($ni->ni==1311522022);
		$this->assertTrue($ni->pass==11111);
		
	}

	

	public function testMasuk(){

		$cons= new Auth(11,11);
		$hasil = Auth::cek($cons,'penilai');

		$this->assertTrue($hasil);
	}




}

 ?>