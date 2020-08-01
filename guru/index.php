<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');

// include koneksi
include 'config/koneksi.php';
include 'config/function.php';
include 'system/global.php';


if($_GET['page']==true){
    
    // cek status login terlebih dahulu apabila mengakses route page
    if($_SESSION['login']=='login_guru'){
        include 'header.php';
        include 'navbar.php';
        include 'sidebar.php';
        if($_GET['page']=='beranda' or $GET_['page']=='index'){
            include 'page/beranda/beranda.php';
            include 'footer.php';
        }elseif($_GET['page']=='mata_pelajaran'){

            if($_GET['mata_pelajaran']=='detail'){
                include 'page/mata_pelajaran/mata_pelajaran_detail.php';
                include 'footer.php';
            }elseif($_GET['mata_pelajaran']=='tambah'){
                include 'page/mata_pelajaran/tambah_materi.php';
                include 'footer.php';
                include 'page/mata_pelajaran/ajax_materi.php';
            }elseif($_GET['mata_pelajaran']=='detail_materi'){
                include 'page/mata_pelajaran/detail_materi.php';
                include 'footer.php';
                include 'page/mata_pelajaran/ajax_materi.php';
            }else{
                include 'page/mata_pelajaran/mata_pelajaran.php';
                include 'footer.php';
            }
            
        }elseif($_GET['page']=='laporan'){
            if($_GET['laporan']=='presensi_detail'){
                include 'page/presensi/presensi_detail.php';
                include 'footer.php';
            }elseif($_GET['laporan']=='presensi'){
                include 'page/presensi/presensi.php';
                include 'footer.php';
            }
        }
        
    }else{
        header("location:?pag=login");
    }
}elseif($_GET['system']==true){
    // cek status login terlebih dahulu apabila mengakses route system
    if($_SESSION['login']=='login_guru'){
        if($_GET['system']=='beranda' or $_GET['system']=='index'){
            include 'system/beranda.php';
        }elseif($_GET['system']=='materi'){
            include 'system/materi.php';
        }
    }else{
        header("location:?pag=login");
    }
}elseif($_GET['pag']=='login'){
    if($_GET['aksi']=='logout'){
        
    }else{
        if($_SESSION['login']=='login_guru'){
            $_SESSION['login']='';
        }
    }
    
    // session_destroy(); 
    // $_SESSION['status_login']=='';
    include 'system/login.php';
    include 'login.php';
    
}else{
    // menuju halaman error ketika url asal ketik
    include 'error.php';
}



?>