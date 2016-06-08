<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
 require_once('db.php');
require_once('model/mahasiswa.php');
require_once('model/pointsaps.php');
$au=Mahasiswa::profil($_GET['nim']);
$saps=PSaps::daftar_saps($_GET['nim']);

?>


<!DOCTYPE html>
<html>
<head>
    <title> DAFTAR SAPS MAHASISWA</title>
</head>
<body>
<div align="center"> DAFTAR USUL PENETAPAN ANGKA KREDIT KEGIATAN MAHASISWA <br>
STUDENT ACTIVITIES PERFORMANCE SYSTEM (SAPS) <br>
UNIVERSITAS ANDALAS </div>
<br>
 <table width="100%" align="center" border=1>
 <tr>
        <th>No</th>
        
        <th colspan="2" align="center">Keterangan Perorangan</th>

    </tr>
    <tr>
        <th>1</th>
        <td>Nama</td>
        <td><?php echo $au->nama; ?></td>
     
    </tr>
    <tr>
        <th>2</th>
        <td>BP</td>
        <td><?php echo $au->nim; ?></td>
     
    </tr>
    <tr>
        <th>3</th>
        <td>Fakultas/Jurusan/Program Studi</td>
        <td><?php echo $au->fakultas; ?> / <?php echo $au->jurusan; ?></td>
     
    </tr>
      <tr>
        <th>4</th>
        <td>Tempat dan tanggal lahir</td>
        <td><?php echo $au->tempat_lahir; ?> / <?php echo $au->tanggal_lahir; ?></td>
     
    </tr>
      <tr>
        <th>5</th>
        <td>Jenis Kelamin</td>
        <td><?php echo $au->jk; ?></td>
     
    </tr>
      <tr>
        <th>5</th>
        <td>Penilai</td>
        <td><?php echo $au->penilai; ?></td>
     
      </tr>
 </table>
 <br>
 <br>
  <table width="100%" align="center" border=1>
 <tr>
        <td>&nbsp; &nbsp;  &nbsp;  &nbsp;</td>
        
        <th colspan="4">Unsur yang Dinilai</th>

    </tr>
    <tr>
        
        <th>Unsur dan Sub Unsur</th>
        <th>Angka Kredit</th>
        <th> Status</th>
     
    </tr>
    <tr>
     
    </tr>

    <tr>
      
        <td>Unsur Utama</td>
        <td></td>
        <td></td>
     
     
    </tr>
      
    



<?php 
$unsur='';
$sub_unsur='';
$butir='';
$sub_butir='';
$total=0;
$judul=1;
foreach ($saps as $sa) { 
$total+=$sa->nilai;
if ($sa->unsur==$unsur) {
  
}else{
  $unsur=$sa->unsur;
$sub_unsur='';
$butir='';
$sub_butir='';
  ?>
      <tr>
       
        <td><?php echo $sa->unsur; ?></td>
        <td></td>
        <td></td> 
      </tr>
    <?php
}

if ($sa->sub_unsur==$sub_unsur) {
  
}else{
  $sub_unsur=$sa->sub_unsur;
$butir='';
$sub_butir='';
  ?>
      <tr>
       
        <td>&nbsp;&nbsp;<?php echo $sa->sub_unsur; ?></td>
        <td></td>
        <td></td> 
      </tr>
    <?php
}

if ($sa->butir==$butir) {
  
}else{
  $butir=$sa->butir;
$sub_butir='';
?>
      <tr>
     
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sa->butir; ?></td>
        <td></td>
        <td></td> 
      </tr>
    <?php
}

if ($sa->sub_butir==$sub_butir) {
  
}else{
  $sub_butir=$sa->sub_butir;
  ?>
      <tr>
       
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sa->sub_butir; ?></td>
        <td></td>
        <td></td> 
      </tr>
    <?php
}

 ?>
      <tr>
        
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $judul.'. '.$sa->judul; ?></td>
        <td><?php echo $sa->nilai; ?></td>
        <td><?php echo $sa->status; ?></td> 
      </tr>
    <?php
$judul++;
}
?>
  
<tr>
  <td>Total Point</td>
  <td><?php echo $total; ?></td>
</tr>
 </table>
</body>
</html>