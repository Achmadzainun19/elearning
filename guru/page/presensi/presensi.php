  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Presensi 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> presensi</a></li>
        <li class="active">data presensi </li>
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
                                    <a href="?page=laporan&laporan=presensi_detail&id_ampu=<?php echo $d['id_ampu'];?>" class="btn btn-sm btn-success" >Lihat Rekap Presensi</a>
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



<!-- modal cari -->
<div class="modal fade" id="cari">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Presensi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/siswa/?system=laporan_presensi&aksi=cari">
            <div class="modal-body">
                <div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan</label>
                        <select class="form-control " name="bulan" required >
                            <option>-- pilih --</option>  
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <select class="form-control " name="tahun" required >
                            <option>-- pilih --</option>  
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Cari </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal cari -->
