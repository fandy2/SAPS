<?php

	class AuthC
	{
		
		function masuk (){
			//return "";
			if (isset($_POST['masukm'])) {

				$mas = new Auth($_POST['nim'],$_POST['pwd']);
				$akses = "mahasiswa";
				$get = Auth::cek($mas, $akses);
				if ($get) {
					$_SESSION['nim'] = $_POST['nim'];
					$_SESSION['pwd'] = $_POST['pwd'];
					$_SESSION['akses'] = 'mahasiswa';
					 header("Location: index.php"); 
				}else{
					return "m";
				}
			}
			if (isset($_POST['masukd'])) {

				$mas = new Auth($_POST['nim'],$_POST['pwd']);
				$akses = "penilai";
				$get = Auth::cek($mas, $akses);
				if ($get) {
					$_SESSION['nim'] = $_POST['nim'];
					$_SESSION['pwd'] = $_POST['pwd'];
					$_SESSION['akses'] = 'penilai';
					 header("Location: index.php"); 
				}else{
					return "p";
				}
			}

		}


		function tampilan_masuk(){

			$get = $this->masuk();
			require_once("view/login.php");
		}
		
		function beranda(){

			require_once("view/beranda.php");
		}

		function keluar(){
			session_unset(); 
			session_destroy();
			header("Location: index.php"); 

		}
		
	}

?>