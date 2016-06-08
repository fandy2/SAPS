<?php
    if (isset($_SESSION['nim']) && isset($_SESSION['pwd'])&& isset($_SESSION['akses'])){
        if ($_SESSION['akses']=='mahasiswa') {
             require_once('model/mahasiswa.php');
            $au=Mahasiswa::profil($_SESSION['nim']);
        ?>
        
        <ul id="hornavmenu" class="nav navbar-nav">
            <li>
                <a href="index.php" class="fa-home">Beranda</a>
            </li>
            <li>
                <span class="fa-copy">Daftar Mahasiswa</span>
                <ul id="angkatan">
                    <?php
                    foreach ($angkatans as $angkatan) {
                      
                      echo "<li><a href='?controller=mahasiswa_c&action=tampilkan_list_mahasiswa&angkatan=$angkatan->angkatan'>Angkatan $angkatan->angkatan</a></li>";

                    }


                    ?>
                </ul>
            </li>
            <li>
                <span class="fa-copy"  
                <?php if ($au->status_saps=='Ditolak') {
                    echo 'style="color:red;"';
                }if ($au->status_saps=='Diterima') {
                     echo 'style="color:blue;"';    
                } ?>

                >SAPS</span>
                <ul>
                    <li><a href="?controller=pointsaps_c&action=halaman_input_saps" class="fa-home">Input SAPS</a></li>
                    <li><a href="?controller=pointsaps_c&action=daftar_saps" class="fa-home">Daftar SAPS</a></li>
                </ul>
            </li>
            <li>
                <span class="fa-copy"><?php echo $au->nama; ?></span>
                <ul>
                  <li><a href='?controller=mahasiswa_c&action=tampilkan_profil&nim=<?php echo $_SESSION['nim']; ?>'>Profil</a></li>
                  <li><a href='?controller=auth_c&action=keluar'>Logout</a></li>
                </ul>
            </li>
        </ul>
<?php 
}
    if ($_SESSION['akses']=='penilai') {

?>

        <ul id="hornavmenu" class="nav navbar-nav">
            <li>
                <a href="index.php" class="fa-home">Beranda</a>
            </li>
            <li>
                <span class="fa-copy">Daftar Mahasiswa</span>
                <ul id="angkatan">
                    <?php
                    foreach ($angkatans as $angkatan) {
                      
                      echo "<li><a href='?controller=mahasiswa_c&action=tampilkan_list_mahasiswa&angkatan=$angkatan->angkatan'>Angkatan $angkatan->angkatan</a></li>";

                    }


                    ?>
                </ul>
            </li>
            <li>
                <a href="?controller=mahasiswa_c&action=list_mahasiswa_mp" class="fa-home">Permintaan Persetujuan</a>
            </li>
            <li>
                <span class="fa-copy"><?php echo $_SESSION['nama']; ?></span>
                <ul>
                  
                  <li><a href='?controller=auth_c&action=keluar'>Logout</a></li>
                </ul>
            </li>
        </ul>


<?php  
}}

?>