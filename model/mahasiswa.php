<?php
class Mahasiswa{
	
	public $nim;
  public $nama;
  
	public $jurusan;
	public $fakultas;
	public $angkatan;
	public $tanggal_lahir;
	public $tempat_lahir;
	public $jk;
	public $status_saps;
	public $penilai;


  public function __construct($nim, $nama, $jurusan, $fakultas, $angkatan, $tanggal_lahir, $tempat_lahir, $jk, $status_saps, $penilai) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->fakultas = $fakultas;
        $this->angkatan = $angkatan;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->tempat_lahir = $tempat_lahir;
        $this->jk = $jk;
        $this->status_saps = $status_saps;
        $this->penilai = $penilai;
    }

	public static function perangkatan($angkatan) {
      Db::getInstance();
        
        $sql = "select nim, nama, jurusan, fakultas, angkatan, tanggal_lahir, tempat_lahir, jk, status_saps, penilai from mahasiswa  where angkatan = $angkatan";
      $re = mysqli_query(Db::getInstance() ,$sql);
        $list = [];
      while ($hasil= mysqli_fetch_row($re)) {
        $list[] = new Mahasiswa($hasil[0], $hasil[1], $hasil[2], $hasil[3], $hasil[4], $hasil[5], $hasil[6], $hasil[7], $hasil[8], $hasil[9]);
      }
      
      return $list;
    }

	public static function profil($nim) {
       
        
        $sql = "select mahasiswa.nim, mahasiswa.nama, mahasiswa.jurusan, mahasiswa.fakultas, mahasiswa.angkatan, mahasiswa.tanggal_lahir, mahasiswa.tempat_lahir, mahasiswa.jk, mahasiswa.status_saps, penilai.nama from mahasiswa left join penilai on mahasiswa.penilai = penilai.nip where mahasiswa.nim = $nim";
      $re = mysqli_query(Db::getInstance() ,$sql);
      //echo mysqli_error(Db::getInstance());
        $list = [];
      while ($hasil = mysqli_fetch_row($re)) {
        $list = new Mahasiswa($hasil[0], $hasil[1], $hasil[2], $hasil[3], $hasil[4], $hasil[5], $hasil[6], $hasil[7], $hasil[8], $hasil[9]);
      }
      
      return $list;
    }
    
    public static function list_minta_persetujuan() {
      Db::getInstance();
        
        $sql = "select nim, nama, jurusan, fakultas, angkatan, tanggal_lahir, tempat_lahir, jk, status_saps, penilai from mahasiswa where status_saps = 'Meminta persetujuan'";
      $re = mysqli_query(Db::getInstance() ,$sql);
        $list = [];
      while ($hasil= mysqli_fetch_row($re)) {
        $list[] = new Mahasiswa($hasil[0], $hasil[1], $hasil[2], $hasil[3], $hasil[4], $hasil[5], $hasil[6], $hasil[7], $hasil[8], $hasil[9]);
      }
      
      return $list;
    }

    public static function update_status_saps($nim, $status, $nip) {
      Db::getInstance();
        
        $sql = "UPDATE mahasiswa SET status_saps = '$status', penilai= '$nip' where nim = $nim";
        
        if (mysqli_query(Db::getInstance() ,$sql)) {
          return true;
        }else{
        
          return false;
        }
      
        
    }

    
}

?>