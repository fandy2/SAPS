<?php 
/**
* 
*/
class PSaps
{
	
	public $judul;
	public $butir;
	public $sub_butir;
	public $unsur;
	public $sub_unsur;
	public $nilai;
	public $nim;
	public $status;
	public $nama_file;
	public $tipe_file;
	public $id;

	function __construct($judul, $sub_butir, $butir, $sub_unsur, $unsur, $nilai, $nim, $status, $nama_file, $tipe_file, $id)
	{
		$this->judul = $judul;
		$this->sub_butir = $sub_butir;
		$this->butir = $butir;
		$this->unsur = $unsur;
		$this->sub_unsur = $sub_unsur;
		$this->nilai = $nilai;
		$this->nim = $nim;
		$this->status = $status;
		$this->nama_file = $nama_file;
		$this->tipe_file = $tipe_file;
		$this->id = $id;

	}

	public static function input_saps($saps){
		$db = Db::getInstance();
		$sql = "insert into saps_mahasiswa (Judul, Kode_saps, BP, Status, nama_file, tipe_file) values ('$saps->judul', $saps->sub_butir, $saps->nim, '$saps->status', '$saps->nama_file', '$saps->tipe_file')";
		

		if (mysqli_query($db ,$sql)) {
					return true;
				}else{
					echo mysqli_error($db); 
				}
	}

	public static function daftar_saps($nim){
		$db = Db::getInstance();
		 $list = [];
		$sql = "select saps_mahasiswa.Id, saps_mahasiswa.judul, sub_butir.Nama, butir.Nama, sub_unsur.Nama, unsur.Nama, sub_butir.Nilai, saps_mahasiswa.nama_file, saps_mahasiswa.Status from saps_mahasiswa inner join (sub_butir inner join (butir inner join (sub_unsur inner join unsur on sub_unsur.Kode = unsur.id ) on butir.Kode = sub_unsur.Id) on sub_butir.Kode = butir.Id) on saps_mahasiswa.Kode_saps = sub_butir.Id where saps_mahasiswa.BP = $nim order by sub_butir.id asc";
		$re = mysqli_query(Db::getInstance() ,$sql);
		while ($hasil= mysqli_fetch_row($re)) {
        	$list[] = new PSaps($hasil[1], $hasil[2], $hasil[3], $hasil[4], $hasil[5], $hasil[6], $nim, $hasil[8], $hasil[7], " ", $hasil[0]);

      		}
      return $list;
	}

	public static function hapus_saps($id){
		$db = Db::getInstance();

		$sql = "DELETE FROM saps_mahasiswa WHERE Id in ($id)";
		
		if (mysqli_query($db, $sql)) {
		    return "Berhasil Dihapus";
		} else {
		    return "Gagal Dihapus";
		}
	}

	public static function daftar_sert($nim){
		$db = Db::getInstance();
		 $list = [];
		$sql = "select saps_mahasiswa.Id, saps_mahasiswa.judul, unsur.Nama, sub_butir.Nilai, saps_mahasiswa.nama_file, saps_mahasiswa.tipe_file from saps_mahasiswa inner join (sub_butir inner join (butir inner join (sub_unsur inner join unsur on sub_unsur.Kode = unsur.id ) on butir.Kode = sub_unsur.Id) on sub_butir.Kode = butir.Id) on saps_mahasiswa.Kode_saps = sub_butir.Id where saps_mahasiswa.BP = $nim";
		$re = mysqli_query(Db::getInstance() ,$sql);
		while ($hasil= mysqli_fetch_row($re)) {
        	$list[] = new PSaps($hasil[1], '', '', '', $hasil[2], $hasil[3], $nim, '', $hasil[4], $hasil[5], $hasil[0]);
      		}
      return $list;
	}

	public static function point_sert($id){
		$db = Db::getInstance();
		$sql = "select saps_mahasiswa.Id, saps_mahasiswa.judul, unsur.Nama, sub_butir.Nilai, saps_mahasiswa.nama_file, saps_mahasiswa.tipe_file from saps_mahasiswa inner join (sub_butir inner join (butir inner join (sub_unsur inner join unsur on sub_unsur.Kode = unsur.id ) on butir.Kode = sub_unsur.Id) on sub_butir.Kode = butir.Id) on saps_mahasiswa.Kode_saps = sub_butir.Id where saps_mahasiswa.Id = $id";
		$re = mysqli_query(Db::getInstance() ,$sql);
		$list ="";
		while ($hasil= mysqli_fetch_row($re)) {
        	$list = new PSaps($hasil[1], '', '', '', $hasil[2], $hasil[3], '', '', $hasil[4], $hasil[5], $hasil[0]);
      		}
      return $list;
	}

	public static function update_status($nilai){
		$db = Db::getInstance();
		$sql = "update saps_mahasiswa set Status = '$nilai[0]' where Id = $nilai[1]";
		$re = mysqli_query($db ,$sql);
		echo mysqli_error($db);
	}
}

 ?>