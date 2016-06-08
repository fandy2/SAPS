<div class="list-group">
	<?php 
		foreach ($list as $li) {
			echo "<a class='list-group-item' href='?controller=mahasiswa_c&action=tampilkan_profil&nim=$li->nim'>$li->nim $li->nama</a>";
		}

	 ?>
</div>