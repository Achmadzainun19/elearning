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
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- list mata pelajaran -->
            <div class="col-md-8 col-md-offset-2 ">
                <?php
                $no=1;
                    $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel left join kelas on kelas.id_kelas=ampu.id_kelas where ampu.id_guru='$glob_id_guru'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <div class="pull-left">
                                    <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                    <span class="username">
                                        <a href="javascript:void(0)"><?php echo $d['nm_kelas'];?> | <?php echo $d['nm_mapel'];?></a> 
                                        
                                        
                                    </span>
                                    <span class="description"><?php echo $d['nm_guru'];?> </span>
                                </div>
                                <div class="pull-right" style="padding-top:5px; ">
                                    <a href="?page=mata_pelajaran&mata_pelajaran=detail&id_ampu=<?php echo $d['id_ampu'];?>" class="btn btn-sm btn-success" >Lihat Mata Pelajaran</a>
                                </div>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                    </div>
                <?php $no++;  } ?>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
