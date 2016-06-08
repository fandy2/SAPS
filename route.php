<?php
  function call($controller, $action) {
    require_once('controller/' . $controller . '.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      case 'auth_c':
      require_once('model/auth.php');
        $controller = new AuthC();
      break;
      case 'mahasiswa_c':
       require_once('model/mahasiswa.php');
        $controller = new MahasiswaC();
      break;
      case 'pointsaps_c':
       require_once('model/pointsaps.php');
        $controller = new PSapsC();
      break;
       case 'komentar_c':
       require_once('model/komentar.php');
        $controller = new KomentarC();
      break;
    }

    $controller->{ $action }();
  }


  $controllers = array('auth_c' => ['tampilan_masuk' , 'masuk', 'beranda', 'keluar'],
                       'mahasiswa_c' => ['tampilkan_list_mahasiswa','tampilkan_profil','list_mahasiswa_mp'],
                       'pointsaps_c' => ['halaman_input_saps', 'input_saps', 'daftar_saps','list_sertifikat','minta_persetujuan','daftar_saps_dinilai'],
                       'komentar_c' => ['halaman_komen','input_komentar']);
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action); /* post index */
    } else {
      call('auth_c', 'beranda');
    }
  } else {
    call('auth_c', 'beranda');
  }
?>