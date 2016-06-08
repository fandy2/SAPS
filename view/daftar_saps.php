
<h2 align="center">Daftar SAPS Diambil</h2> 
<?php  if ($au->status_saps=='Ditolak') {
                echo "<h2 align='center'><label class='label label-danger'>SAPS Ditolak</label></h2>";    
                }
                if ($au->status_saps=='Diterima') {
                     echo "<h2 align='center'><label class='label label-primary'>SAPS Diterima</label></h2>";    
                }
                ?>
                
<form  method="post" action="index.php?controller=pointsaps_c&action=daftar_saps">
<table align="center" class="table table-hover">
    <thead>
        <tr>                                    
            <th></th>
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
            $total= 0;
            foreach ($list as $li) {
                echo "<tr><th><input value='$li->id' type='checkbox' name='cek[]'></th><th>$li->judul</th><th>$li->unsur</th><th>$li->sub_unsur</th><th>$li->butir</th><th>$li->sub_butir</th><th>$li->nilai</th><th>$li->nama_file</th><th>$li->status</th></tr>";
                $total+=$li->nilai;
            }

         ?>
    </tbody>
</table>
<?php echo "<h3 align='right'><label >Total Point = $total</label></h3>"; ?>
    
    <a href="a.php?nim=<?php echo $_SESSION['nim']; ?>" class="btn">Unduh SAPS</a>
    <?php 

        if ($au->status_saps!='Diterima' && $au->status_saps!='Meminta persetujuan') {
            echo '<button class="btn" name="hapus">Hapus</button>';
        }

        if ($total>=50 && $au->status_saps!='Diterima' && $au->status_saps!='Meminta persetujuan') {
            echo '<button class="btn" name="MP">Minta Persetujuan</button>';
        }


     ?>
    
</form>