<?php  

/**
* 
*/
class MahasiswaC
{
	
	function tampilkan_list_mahasiswa(){
		$list = Mahasiswa::perangkatan($_GET['angkatan']);
		require_once ("view/list_mhs.php");
	}

	function tampilkan_profil(){
		$mhs = Mahasiswa::profil($_GET['nim']);
		require_once ("view/profil.php");
	}

	function list_mahasiswa_mp(){
		$list = Mahasiswa::list_minta_persetujuan();
		require_once ("view/list_mhs_mp.php");
	}


}	



?>