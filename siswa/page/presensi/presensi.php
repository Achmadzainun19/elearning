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
            <div class="col-md-12 ">
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <table>
                        <tr>
                            <td > Kelas</td>
                            <td style="padding-right:30px;">: <?php echo $glob_nama_kelas; ?> </td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>: <?php echo $glob_nama_wali_kelas; ?></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
            <!-- list tugas -->
            <div class="col-md-12 ">
                    <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Presensi Siswa</h3>
                                <div class="user-block">
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <div class="box-body table-responsive">
                            <p>data presensi ini berdasarkan tanggal siswa melakukan akses pertama kali membuka materi, selebihnya siswa dianggap sudah melakukan presensi pada materi yang telah diapload oleh guru pengampu pelajaran</p>
                            <?php
                            // penentuan tanggal awal dan akhir di bulan tertentu
                            $hari_ini = date("Y-m-d");
                            $bulan = date('F', strtotime($hari_ini));
                            $tgl_pertama = date('1', strtotime($hari_ini));
                            $tgl_terakhir = date('t', strtotime($hari_ini));
                            ?>
                            <table class="table table-bordered ">
                                <thead class="text-center" style="font-weight:700;">
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Nama</td>
                                        <td colspan="<?php echo $tgl_terakhir; ?>"><?php echo $bulan; ?></td>
                                        <td rowspan="2">Total Kehadiran</td>
                                        <td rowspan="2">Total Materi Upload</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        for($a=$tgl_pertama; $a<=$tgl_terakhir; $a++){
                                        ?>
                                            <td><?php echo $a; ?></td>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel where ampu.id_kelas='$glob_id_kelas'");
                                        while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td class="text-left"><?php echo $d['nm_mapel'];?></td>
                                        <?php
                                        for($a=$tgl_pertama; $a<=$tgl_terakhir; $a++){
                                        ?>
                                            <td></td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                            </div>
                    </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
