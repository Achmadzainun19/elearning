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
        <li class="active"> presensi siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- list tugas -->
            <div class="col-md-12 ">
                    <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Presensi Siswa</h3>
                                <div class="user-block pull-right">
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <div class="box-body table-responsive">
                            <p></p>
                            <?php
                            // data profil   
                            $guru_ampu=mysqli_query($koneksi,"select * from ampu left join guru on ampu.id_guru=guru.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where ampu.id_ampu='$_GET[id_ampu]'");
                            while($dk = mysqli_fetch_array($guru_ampu)){
                                $nama_mapel=$dk['nm_mapel'];
                                $guru_pengajar=$dk['nm_guru'];
                                $id_kelas=$dk['id_kelas'];
                            }    
                            $kelas=mysqli_query($koneksi,"select * from kelas left join guru on guru.id_guru=kelas.id_guru where kelas.id_kelas='$id_kelas'");
                            while($dk = mysqli_fetch_array($kelas)){
                                $nama_kelas=$dk['nm_kelas'];
                                $wali_kelas=$dk['nm_guru'];
                            }          
                            
                            ?>
                            <table>
                                <tr>
                                    <td>Nama Kelas</td>
                                    <td>: <b><?php echo $nama_kelas; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Wali Kelas</td>
                                    <td>: <b><?php echo $wali_kelas; ?></b></td>
                                </tr>
                                <tr>
                                    <td> Mata Pelajaran </td>
                                    <td>: <b><?php echo $nama_mapel; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Guru Mata Pelajaran </td>
                                    <td>: <b><?php echo $guru_pengajar; ?></b></td>
                                </tr>
                            </table>
                            <table class="table table-bordered " style="margin-top:20px;">
                                <thead class="text-center" style="font-weight:700;">
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Nama</td>
                                        <?php
                                        // menentukan jumlah rowspan pada kolom materi
                                        $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                        $jum_materi=mysqli_num_rows($materi);
                                        ?>
                                        <td <?php if($jum_materi==0){ }elseif($jum_materi>=0){ echo "colspan='$jum_materi'"; }?>>Materi</td>
                                        <td colspan="2">Total Siswa Presensi</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        // menentukan nama nama materi 
                                        $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                        $jum_materi=mysqli_num_rows($materi);
                                        if($jum_materi>=1){
                                        while($m = mysqli_fetch_array($materi)){
                                        ?>
                                        <td><?php echo $m['judul'];?></td>
                                        <?php } }else{ ?>
                                        <td></td>
                                        <?php } ?>
                                        <td>Masuk</td>
                                        <td>Tidak Masuk</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // data siswa
                                        $no=1;
                                        $data=mysqli_query($koneksi,"select * from siswa left join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_kelas='$id_kelas'");
                                        while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d['nm_siswa']?></td>
                                            <?php
                                            // menentukan nama nama materi
                                            $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                            $jum_materi=mysqli_num_rows($materi);
                                            $jum_masuk=0;
                                            if($jum_materi>=1){
                                                while($m = mysqli_fetch_array($materi)){
                                                    $notif=mysqli_query($koneksi,"select * from notif where id_materi='$m[id_materi]' and id_siswa='$d[id_siswa]'");
                                                    $jum_notif=mysqli_num_rows($notif);
                                                    if($jum_notif>=1){
                                                        $jum_masuk++;
                                                        $dn=mysqli_fetch_assoc($notif);
                                                    ?>
                                                        <td  class="text-center" style="background-color:#eee; "><?php echo date("d-m-Y",$dn["time"])?></td>
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <td></td>
                                                    <?php
                                                    } 
                                                } 
                                            }else{ ?>
                                                <td></td>
                                            <?php } ?>
                                        <td class="text-center"><?php echo $jum_masuk; ?></td>
                                        <td class="text-center"><?php echo $jum_materi-$jum_masuk; ?></td>
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
