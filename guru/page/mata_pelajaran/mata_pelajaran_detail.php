  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mata Pelajaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> mata pelajaran</a></li>
        <li class="active">mata pelajaran detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
        <div class="row">
            <div class="col-md-8 col-md-offset-2"> 
                <?php
                if($_SESSION['pesan']=='bh'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil dihapus</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                }
                ?>
            </div>
            <?php
            $no=1;
                $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel left join kelas on kelas.id_kelas=ampu.id_kelas where ampu.id_ampu='$_GET[id_ampu]'");
                while($d = mysqli_fetch_array($data)){
            ?>
            <div class="col-md-8 col-md-offset-2">
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <table >
                        <tr>
                            <td > Mata Pelajaran</td>
                            <td style="padding-right:30px;">: <b><?php echo $d['nm_mapel']; ?></b> </td>
                            <td>Jumlah Siswa</td>
                            <td> : <b> <?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from siswa where id_kelas='$d[id_kelas]'")); ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>Guru Pengajar</td>
                            <td>: <b><?php echo $d['nm_guru']; ?></b> </td>
                            <td>Jumlah Materi Upload</td>
                            <td> : <b> <?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from materi where id_ampu='$d[id_ampu]'")); ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: <b><?php echo $d['nm_kelas']; ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div style="padding-bottom:15px;">
                    <a href="?page=mata_pelajaran&mata_pelajaran=tambah&id_ampu=<?php echo $_GET['id_ampu'];?>" class="btn btn-primary"><i class="fa fa-plus"> </i> TAMBAH MATERI</a>
                </div>
            </div>
            <!-- list tugas -->
            <?php
            $data_list=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru where materi.id_ampu='$_GET[id_ampu]'");
            while($dl = mysqli_fetch_array($data_list)){
            ?>
            <div class="col-md-8 col-md-offset-2 ">
                
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <div class="pull-left">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username">
                                    <a href="#"><?php echo $dl['nm_guru'];?></a>
                                    
                                </span>
                                <span class="description"> <?php echo $dl['judul'];?> | <?php echo hari_ini(date('D',strtotime(date('Y-m-d',($d['time'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($dl['time']))))); ?> <?php echo date("H:i:s",$dl['time']);?></span>
                            </div>
                            <div class="pull-right" style="padding-top:5px; ">
                                <a href="?page=mata_pelajaran&mata_pelajaran=detail_materi&id_materi=<?php echo $dl['id_materi'];?>" class="btn btn-sm btn-success" >Lihat Materi</a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
