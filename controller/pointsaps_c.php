<?php 
	/**
	* 
	*/
	class PSapsC
	{
		
		function halaman_input_saps(){
			require_once("view/input_saps.php");
		}
		
		function hapus_point_saps(){
			if(!empty($_POST['cek'])) {
					$id = "";
					$c=true;
    				foreach($_POST['cek'] as $cek) {
    					if ($c) {
    						$id .= $cek;
    						$c=false;
    					}else{
    						$id .= ', '.$cek;
    					}
    				}

    				$cb = PSaps::hapus_saps($id);
    				return $cb;
    			}else{
    				return "Cek Point Dulu";
    			}
		}

		function input_saps(){
			if (isset($_POST['inputsaps'])) {
				if ( 0 < $_FILES['file']['error'] ) {
			        return false;
			    }
			    else {
			    	$i=0;
			    	$nama = $_FILES['file']['name'];
			        while (file_exists('upload/'.$nama)) {
			        	$i++;     
			        	$nama = $i.$_FILES['file']['name']; 	 
			        }
			        if(move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $nama)){
			        	$judul = $_POST['judul'];
						$kode = $_POST['kode'];
						$nim = $_SESSION['nim'];
						$nama_file = $nama;
						$tipe_file= "gambar";

						if($_FILES["file"]["type"] == 'application/pdf'){
							$tipe_file= "pdf";
						}

						$saps = new PSaps($judul, $kode,"","","","", $nim, "Menunggu", $nama_file, $tipe_file,"");
						$cek = PSaps::input_saps($saps);
						if ($cek) {
						 	header("Location: index.php?controller=pointsaps_c&action=halaman_input_saps&s=berhasil"); 
						}else{
						 	header("Location: index.php?controller=pointsaps_c&action=halaman_input_saps&s=gagal"); 
						}
			        }
			    }

			}
		}

		function daftar_saps(){
			if (isset($_POST['hapus'])) {
				$cb = $this->hapus_point_saps();
			}

			if (isset($_POST['MP'])) {
				$cb = $this->minta_persetujuan();
			}

			$nim = $_SESSION['nim'];
			
			
			$list = PSaps::daftar_saps($nim);
			 require_once('model/mahasiswa.php');
            $au=Mahasiswa::profil($_SESSION['nim']);
            
			require_once("view/daftar_saps.php");
		}

		function daftar_saps_dinilai(){
			
			if (isset($_POST['Snilai'])) {
				$this->nilai_saps();
				 header("Location: index.php"); 
			}
			$nim = $_GET['nim'];			
			$list = PSaps::daftar_saps($nim);

			require_once("view/daftar_saps_dinilai.php");
		}

		function nilai_saps(){
			$status= 'Diterima';
			foreach ($_POST['nilai'] as $nilai) {
				$nilais = explode('|', $nilai);
				PSaps::update_status($nilais);
				if ($nilais[0]=='Ditolak') {
					$status = 'Ditolak';
				}
			}
			require_once('model/mahasiswa.php');
			$cb = Mahasiswa::update_status_saps($_GET['nim'], $status,$_SESSION['nim']);
			

			
		}

		function list_sertifikat(){
			$nim = $_GET['nim'];
			$list =PSaps::daftar_sert($nim);
			require_once("view/list_sert.php");
		}

		function minta_persetujuan(){
			require_once('model/mahasiswa.php');
        	
			$cb = Mahasiswa::update_status_saps($_SESSION['nim'], 'Meminta persetujuan','');

		}

		
	}

 ?>