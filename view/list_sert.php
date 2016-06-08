 <div class="col-md-3">
  	<ul class="list-group sidebar-nav" id="sidebar-nav">
  		<li class="list-group-item"><a href="?controller=mahasiswa_c&action=tampilkan_profil&nim=<?php echo $_GET['nim'];?>">Profil Mahasiswa</a></li>
  		<li class="list-group-item"><a href="?controller=pointsaps_c&action=list_sertifikat&nim=<?php echo $_GET['nim'];?>">Sertifikat Mahasiswa</a></li>
	</ul>
</div>

<div class="col-md-9">
	<div class="col-md-12">
		<h2>Daftar Sertifikat</h2>
	                            <!-- Filter Buttons -->
	 	<div class="portfolio-filter-container margin-top-20">
	     	<ul class="portfolio-filter">
	            <li class="portfolio-filter-label label label-primary">
	                Disaring berdasarkan:
	            </li>
	            <li>
	                <a href="#" class="portfolio-selected btn btn-default" data-filter="*">Semua</a>
	            </li>
	            <li>
	                <a href="#" class="btn btn-default" data-filter=".penalaran">Penalaran</a>
	            </li>
	            <li>
	                <a href="#" class="btn btn-default" data-filter=".minat">Minat dan Bakat</a>
	            </li>
	            <li>
	                <a href="#" class="btn btn-default" data-filter=".pengabdian">Pengabdian Masyarakat</a>
	            </li>
	        </ul>
	    </div>
	    
	    <!-- End Filter Buttons -->
	</div>                            
		<div class="row">
        	<div class="col-md-12 portfolio-group no-padding">
                <?php  
                	foreach ($list as $li) {
                		
        
                ?>
                <div class="col-md-6 portfolio-item margin-bottom-40 <?php if ($li->unsur=='Penalaran') {
                	echo 'penalaran';}elseif ($li->unsur=='Minat Dan Bakat') {
                		echo 'minat';}else{echo 'pengabdian';} ?>">
                    <div>
                        <a href="?controller=komentar_c&action=halaman_komen&id=<?php echo $li->id;?>">
                            <figure>
                                <img src="upload/<?php if ($li->tipe_file=='pdf') {
                                	echo "pdf.jpg";
                                }else{ echo $li->nama_file; } ?>">
                                <figcaption>
                                    <h3 class="margin-top-20"><?php echo $li->judul; ?></h3>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
                <?php  
                	}
                ?>
        	</div>
   	 	</div>
</div>
