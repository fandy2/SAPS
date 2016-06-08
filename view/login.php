

<div class="tabs alternative ">
<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
    <ul class="nav nav-tabs">
        <li  <?php if ($get!='p') {
    echo 'class="active"';
} ?>>
            <a href="#m" data-toggle="tab">Mahasiswa</a>
        </li>
        <li <?php if ($get=='p') {
    echo 'class="active"';
} ?>>
            <a href="#d" data-toggle="tab">Penilai</a>
        </li>
    </ul>
</div>
    
     <div class="tab-content">
        <div class="tab-pane <?php if ($get!='p') {
    echo 'fade in active';
} ?>" id="m">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                    <form class="login-page" method="post" action="index.php?controller=auth_c&action=tampilan_masuk">
                        <div class="login-header margin-bottom-30">
                            <h2>Halaman Masuk Mahasiswa</h2>
                        </div>
                        <?php if ($get=='m') {
                            echo '<h3><span class="label label-danger">NIM atau Kata Sandi salah</span></h3>';
                        } ?>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input placeholder="NIM" class="form-control" type="text" name="nim" required>
                        </div>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input placeholder="Kata Sandi" class="form-control" type="password" name="pwd" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="checkbox">
                                    <input type="checkbox">Stay signed in</label>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary pull-right" type="submit" name="masukm">Masuk</button>
                            </div>
                        </div>
                        <hr>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if ($get=='p') {
    echo 'fade in active';
} ?>" id="d">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                    <form class="login-page" method="post" action="index.php?controller=auth_c&action=tampilan_masuk">
                        <div class="login-header margin-bottom-30">
                       
                            <h2>Halaman Masuk Dosen</h2>
                        </div>
                         <?php if ($get=='p') {
                            echo '<h3><span class="label label-danger">NIP atau Kata Sandi salah</span></h3>';
                        } ?>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input placeholder="NIP" class="form-control" type="text" name="nim" required>
                        </div>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input placeholder="Kata Sandi" class="form-control" type="password" name="pwd" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="checkbox">
                                    <input type="checkbox">Stay signed in</label>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary pull-right" type="submit" name="masukd">Masuk</button>
                            </div>
                        </div>
                        <hr>
                      
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>
