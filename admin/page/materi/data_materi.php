  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Materi
        <small>data materi </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Materi</a></li>
        <li class="active">Data Materi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data mapel -->
            <div class="col-md-12 ">
                <?php
                if($_SESSION['pesan']=='bi'){
                ?>
                <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil disimpan</h5>
                    
                </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='be'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil diedit</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                } elseif($_SESSION['pesan']=='bh'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil dihapus</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                } 
                ?>
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Data Materi</h3>
                    <div class="box-tools">
                        <a href="?page=materi" class="btn btn-success">TAMBAH DATA</a>
                    </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Judul Tugas</th>
                                <th>Tanggal Upload</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_materi=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru left join kelas on kelas.id_kelas=ampu.id_kelas left join mapel on mapel.id_mapel=ampu.id_mapel");
                                while($d = mysqli_fetch_array($data_materi)){
                            ?>
                            <tr id="<?php echo $d['id_materi'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_mapel']?></td>
                                <td><?php echo $d['nm_guru']?></td>
                                <td><?php echo $d['nm_kelas']?></td>
                                <td><?php echo $d['judul']?></td>
                                <td><?php echo date('d-m-Y',$d['time']);?></td>
                                <td>
                                    <button relid="<?php echo $d['id_materi']?>" class="btn btn-xs btn-primary edit_data">lihat data</button>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Judul Tugas</th>
                                <th>Tanggal Upload</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


