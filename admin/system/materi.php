<?php
if($_GET['aksi']=='select_ampu'){
    $id=$_POST['id'];
    $ampu=mysqli_query($koneksi,"select * from ampu left join mapel on ampu.id_mapel=mapel.id_mapel left join guru on guru.id_guru=ampu.id_guru where ampu.id_kelas='$id'");
    // $data=array();
    while($d = mysqli_fetch_array($ampu)){
        // $data[]=array(
        //     'id_ampu'=>$d['id_ampu'],
        //     'id_mapel'=>$d['id_mapel'],
        //     'nama_mapel'=>$d['nm_mapel'],
        // );
        echo "<option value=".$d['id_ampu'].">".$d['nm_mapel']." ( ".$d['nm_guru']." )</option>";
    }
    // echo json_encode($data); 
    
}elseif($_GET['aksi']=='upload_materi'){
    // deklarasi variabel
    $id_ampu=$_POST['pengampu'];
    $judul=$_POST['judul'];
    $ket=$_POST['deskripsi'];
    $jenis=$_POST['jenis'];
    $link='';
    $time=time();
    $expired=time($_POST['batas_akhir']);
    $sts='1';
    // pengaturan upload
    $rand = rand();
    $ekstensi =  array('jpeg','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    $filename = $_FILES['file']['name'];
    $ukuran = $_FILES['file']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        $_SESSION['pesan']='ge';
        header('location:?page=materi');
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$rand.'_'.$filename);
            // query upload
            mysqli_query($koneksi, "INSERT INTO materi VALUES('','$id_ampu','$judul','$ket','$jenis','$link','$time','$expired','$sts')");
            $_SESSION['pesan']='bi';
            header('location:?page=materi');
        }else{
            $_SESSION['pesan']='gu';
            header('location:?page=materi');
        }
}
}

?>