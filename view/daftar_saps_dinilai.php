<h2 align="center">Daftar SAPS Diambil</h2> 
<form  method="post" action="index.php?controller=pointsaps_c&action=daftar_saps_dinilai&nim=<?php echo $_GET['nim']; ?>">
<table align="center" class="table table-hover">
    <thead>
        <tr>                                    
            
            <th>Judul</th>                                    
            <th>Unsur</th>
            <th>Sub Unsur</th>
            <th>Butir</th>
            <th>Sub Butir</th>
            <th>Nilai</th>
            <th>Sertifikat</th>
            <th>Status</th>
        </tr>
    </thead>                                    
    <tbody id="tabsaps">
        <?php 

            foreach ($list as $li) {
                echo "<tr><th>$li->judul</th><th>$li->unsur</th><th>$li->sub_unsur</th><th>$li->butir</th><th>$li->sub_butir</th><th>$li->nilai</th><th>$li->nama_file</th><th><select name='nilai[]' required><option value=''>---</option><option value='Ditolak|$li->id'>Tolak</option><option value='Diterima|$li->id'>Setujui</option></select></th></tr>";
            }

         ?>
    </tbody>
</table>

    
    <a class="btn" href="a.php?nnim=<?php echo $_GET['nim']; ?>" >Unduh SAPS</a>
    <button class="btn" name="Snilai">Selesai</button>

</form>