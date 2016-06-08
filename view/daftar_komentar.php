<div class="col-md-12">
	<div class="col-md-6">
		<form role="form" method="post" action="index.php?controller=komentar_c&action=halaman_komen&id=<?php echo $_GET['id'];?>">
		    <div class="form-group">
		      <label for="comment">Komentar:</label>
		      <textarea name="isi" class="form-control" rows="5" maxlength="100" id="comment" required></textarea>
		      <button class="btn pull-right" name="in_komen">Komentar</button>
		    </div>
		</form>
	</div>
</div>
<div class="col-md-12">
<div class="col-md-6">
<h2>Komentar Penilai</h2>
	<ul class="list-group">
	
<?php 

foreach ($list_p as $li) {

 ?>
	
	<li class="list-group-item">
      	<!-- <div class="col-md-10"> -->
            <a href="?controller=mahasiswa_c&action=tampilkan_profil&nim=<?php echo $li->nim; ?>"><h4><?php echo $li->nama; ?></h4><a>
            <p><?php echo $li->isi; ?></p>
            <span class="date">
                <i class="fa fa-clock-o color-gray-light"></i><?php echo $li->waktu; ?>
            </span>
        <!-- </div> -->
	</li>
    
<?php }

?>
</ul>



</div>
</div>
<hr>
<div class="col-md-12">
<div class="col-md-6">
<h2>Komentar Mahasiswa</h2>
<ul class="list-group">

<?php

foreach ($list as $li) {

 ?>
	
	<li class="list-group-item">
      	<!-- <div class="col-md-10"> -->
            <a href="?controller=mahasiswa_c&action=tampilkan_profil&nim=<?php echo $li->nim; ?>"><h4><?php echo $li->nama; ?></h4><a>
            <p><?php echo $li->isi; ?></p>
            <span class="date">
                <i class="fa fa-clock-o color-gray-light"></i><?php echo $li->waktu; ?>
            </span>
        <!-- </div> -->
	</li>
    
<?php } ?>

	</ul>


</div>
</div>