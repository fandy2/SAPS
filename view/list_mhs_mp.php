<div class="list-group">
	<?php 
		foreach ($list as $li) {
			echo "<a class='list-group-item' href='?controller=pointsaps_c&action=daftar_saps_dinilai&nim=$li->nim'>$li->nim $li->nama</a>";
		}

	 ?>
</div>