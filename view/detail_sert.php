<div align="center">
	<h2 align="center"><?php echo $li->judul ?></h2>
<?php 
	if ($li->tipe_file=='pdf') {?>
    	<embed src="upload/<?php echo $li->nama_file; ?>" width="1000" height="400" type="application/pdf">
    	<?php 
    }else{ ?>
    	<img src="upload/<?php echo $li->nama_file; ?>">
   <?php  } 
?>

	
    
</div>