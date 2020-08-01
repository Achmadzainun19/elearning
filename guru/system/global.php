<?php
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$glob_ver=mysqli_query($koneksi,"select * from guru where username='$username' and password='$password'");
while($w = mysqli_fetch_array($glob_ver)){
    $glob_id_guru=$w['id_guru'];
    $glob_nama_guru=$w['nm_guru'];
    $glob_kd_guru=$w['kd_guru'];
}

$glob_data_ampu=mysqli_query($koneksi,"select * from ampu where id_guru='$glob_id_guru'");
$glob_jum_ampu=mysqli_num_rows($glob_data_ampu);
?>