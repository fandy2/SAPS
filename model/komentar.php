<?php 
/**
* 
*/
class Komentar
{
	
	public $id;
	public $isi;
	public $nim;
	public $id_sert;
	public $waktu;
	public $nama;


	function __construct($id, $isi, $nim, $id_sert, $waktu,$nama)
	{
		$this->id = $id;
		$this->isi = $isi;
		$this->nim = $nim;
		$this->id_sert = $id_sert;
		$this->waktu = $waktu;
		$this->nama = $nama;

	}


	public static function daftar_komentar($id){
		$db = Db::getInstance();
		 $list = [];
		$sql = "select komentar.ID, komentar.Isi, komentar.BP, komentar.Id_sertifikat, komentar.Tanggal, mahasiswa.nama from komentar inner join mahasiswa on mahasiswa.nim = komentar.BP where Id_sertifikat = $id ORDER BY komentar.Tanggal ASC";
		$re = mysqli_query($db ,$sql);
		echo mysqli_error($db);
		while ($hasil= mysqli_fetch_row($re)) {
        	$list[] = new Komentar($hasil[0],$hasil[1],$hasil[2],$hasil[3],$hasil[4],$hasil[5]);
      		}
      return $list;
	}

	public static function daftar_komentar_penilai($id){
		$db = Db::getInstance();
		 $list = [];
		$sql = "select koment_penilai.ID, koment_penilai.Isi, koment_penilai.nip, koment_penilai.id_s, koment_penilai.tanggal, penilai.nama from koment_penilai inner join penilai on penilai.nip = koment_penilai.nip where id_s = $id ORDER BY koment_penilai.tanggal ASC";
		$re = mysqli_query($db ,$sql);
		echo mysqli_error($db);
		while ($hasil= mysqli_fetch_row($re)) {
        	$list[] = new Komentar($hasil[0],$hasil[1],$hasil[2],$hasil[3],$hasil[4],$hasil[5]);
      		}
      return $list;
	}

	public static function input_komentar($komentar,$akses){
		$db = Db::getInstance();

		if ($akses=='mahasiswa') {
			$sql = "insert into komentar (Isi, BP, Id_sertifikat) values ('$komentar->isi', '$komentar->nim', '$komentar->id_sert')";
		}else{
			$sql = "insert into koment_penilai (nip, id_s, isi) values ('$komentar->nim', '$komentar->id_sert', '$komentar->isi')";
		}

		//$sql = "insert into komentar (Isi, BP, Id_sertifikat) values ('$komentar->isi', '$komentar->nim', '$komentar->id_sert')";
		

		if (mysqli_query($db ,$sql)) {
					return true;
				}else{
					echo mysqli_error($db); 
				}
	}

}


 ?>