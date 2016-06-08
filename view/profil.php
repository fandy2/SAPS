 <div class="col-md-3">
  	<ul class="list-group sidebar-nav" id="sidebar-nav">
  		<li class="list-group-item"><a href="?controller=mahasiswa_c&action=tampilkan_profil&nim=<?php echo $_GET['nim'];?>">Profil Mahasiswa</a></li>
  		<li class="list-group-item"><a href="?controller=pointsaps_c&action=list_sertifikat&nim=<?php echo $_GET['nim'];?>">Sertifikat Mahasiswa</a></li>
	</ul>
</div>
<div class="col-md-9">
	<h2 align="center">Profil Mahasiswa</h2>
	<table class="table table-striped">
		<tr>
			<td>NIM</td>
			<td>: <?php echo $mhs->nim; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>: <?php echo $mhs->nama; ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>: <?php echo $mhs->jurusan; ?></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>: <?php echo $mhs->fakultas; ?></td>
		</tr>
		<tr>
			<td>Angkatan</td>
			<td>: <?php echo $mhs->angkatan; ?></td>
		</tr><tr>
			<td>Tanggal Lahir</td>
			<td>: <?php echo $mhs->tanggal_lahir; ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>: <?php echo $mhs->tempat_lahir; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: <?php echo $mhs->jk; ?></td>
		</tr>
		<tr>
			<td>Status SAPS</td>
			<td>: <?php echo $mhs->status_saps; ?></td>
		</tr>
		<tr>
			<td>Penilai</td>
			<td>: <?php echo $mhs->penilai; ?></td>
		</tr>

	</table>
</div>