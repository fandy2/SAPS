                               
                                <h2 align="center">Tambah Poin SAPS</h2> 
                                <?php 
                                    if (isset($_GET['s'])) {
                                        if ($_GET['s'] == 'berhasil') {
                                            echo "<h2 align='center'><span class='label label-success'>Input Berhasil</span></h2>";
                                        }else{
                                            echo "<h2 align='center'><span class='label label-danger'>Input Gagal</span></h2>";
                                        }
                                    }

                                 ?>
                                <form method="post" action="index.php?controller=pointsaps_c&action=input_saps" enctype="multipart/form-data">
                                 <label>Judul</label>
                                    <input placeholder="Judul" class="form-control" name="judul" required>
                                    <label>Unsur</label>
                                    <select id="unsur" class="form-control" required>
                                        <option value="">--Unsur--</option>
                                        <option value="1">Penalaran</option>
                                        <option value="2">Minat dan Bakat</option>
                                        <option value="3">Pengabdian Pada Masyarakat</option>
                                    </select>
                                    <label>Sub Unsur</label>
                                    <select id="s_unsur" class="form-control" required><option value="">--Sub Unsur--</option></select>
                                    <label>Butir</label>
                                    <select id="butir" class="form-control" required><option value="">--Butir--</option></select>
                                    <label>Sub Butir</label>
                                    <select id="s_butir" class="form-control" name="kode" required><option value="">--Sub Butir--</option></select > 
                                    <label>Sertifikat</label>
                                    <input type="file" class="form-control" name="file" id="gambar" required>
                                   
                                   
                                    <button class="btn btn-primary pull-right" type="submit" name="inputsaps">Tambah SAPS</button>
                                </form>
<script type="text/javascript">
$(document).ready(function(){

     $('#unsur').change(function(){
        var sql = "SELECT Id, Nama FROM sub_unsur where Kode ="+ $('#unsur').val();
        var datas = 'sql='+sql;
        $.ajax({
                    type:'POST',
                    data:datas,
                    url:'server/combosaps.php',
                    success:function(data) {    
                        $('#s_unsur').find('.cu').remove();
                        $('#butir').find('.cu').remove();
                        $('#s_butir').find('.cu').remove();
                        $('#s_unsur').append(data);
                    }
                    });
        })
    $('#s_unsur').change(function(){
        var sql = "SELECT Id, Nama FROM butir where kode ="+ $('#s_unsur').val();
        var datas = 'sql='+sql;
        $.ajax({
                    type:'POST',
                    data:datas,
                    url:'server/combosaps.php',
                    success:function(data) {    
                        $('#butir').find('.cu').remove();
                        $('#s_butir').find('.cu').remove();
                        $('#butir').append(data);
                    }
                    });
        })
    $('#butir').change(function(){
        var sql = "SELECT Id, Nama FROM sub_butir where kode ="+ $('#butir').val();
        var datas = 'sql='+sql;
        $.ajax({
                    type:'POST',
                    data:datas,
                    url:'server/combosaps.php',
                    success:function(data) {    
                        $('#s_butir').find('.cu').remove();
                        $('#s_butir').append(data);
                    }
                    });
        })

    $('#gambar').on('change', function(){
    var gambar= $('#gambar')[0].files[0];
   
    if (gambar.size>10000000) {
        alert("File tidak boleh lebih dari 10 MB")
        $('#gambar').wrap('<form>').closest('form').get(0).reset();
        $('#gambar').unwrap();

    }
    else if (gambar.type.indexOf("image") < 0 && gambar.type.indexOf("pdf") < 0) {
        alert("Format file salah!")
        $('#gambar').wrap('<form>').closest('form').get(0).reset();
        $('#gambar').unwrap();
    }
})
})
</script>
                                