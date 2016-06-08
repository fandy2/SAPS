<?php 
/**
* 
*/
class KomentarC
{

	function detail_sertifikat(){
			require_once("model/pointsaps.php");
			$li = PSaps::point_sert($_GET['id']);
			require_once("view/detail_sert.php");
		}

	function halaman_komen(){
		$this->detail_sertifikat();
		if (isset($_POST['in_komen'])) {
			$this->input_komentar();
		}

		$list = Komentar::daftar_komentar($_GET['id']);
		$list_p = Komentar::daftar_komentar_penilai($_GET['id']);
		require_once("view/daftar_komentar.php");
	}

	function input_komentar(){
		
		$komen = new Komentar('',$_POST['isi'],$_SESSION['nim'],$_GET['id'],'','');
		Komentar::input_komentar($komen,$_SESSION['akses']);
		
	}
}

 ?>