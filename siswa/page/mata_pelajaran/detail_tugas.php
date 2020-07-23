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
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <?php
                        $data=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu  left join guru on guru.id_guru=ampu.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where  materi.id_materi='$_GET[id_materi]'");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                    <table>
                        <tr>
                            <td > Mata Pelajaran</td>
                            <td style="padding-right:30px;">: <?php echo $d['nm_mapel']; ?> </td>
                            <td >Materi diposting</td>
                            <td >:  <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($d['time']))))); ?> <?php echo date("H:i:s",$d['time']);?> </td>
                        </tr>
                        <tr>
                            <td>Guru Pengajar</td>
                            <td>: <?php echo $d['nm_guru']; ?> </td>
                            <td>Materi ditutup</td>
                            <td>: <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($d['expired']))))); ?> <?php echo date("H:i:s",$d['expired']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <!-- list tugas -->
            <?php
                $data=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu  left join guru on guru.id_guru=ampu.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where  materi.id_materi='$_GET[id_materi]'");
                while($d = mysqli_fetch_array($data)){
            ?>
            <div class="col-md-8 col-md-offset-2 ">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="pull-left">
                            <div class="user-block">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#"><?php echo $d['judul']?></a></span>
                                <span class="description">Jenis : Materi</span>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- post text -->
                        <p></p>

                        <!-- Attachment -->
                            <div class="attachment-block clearfix">
                                <img class="attachment-img" src="../assets/dist/img/photo1.png" alt="Attachment Image">
                                <div class="attachment-pushed">
                                <h4 class="attachment-heading">File PDF</h4>
                                <div class="attachment-text">
                                    Materi dapat di download dengan sekali klik
                                    <div style="padding-top:15px;">
                                    <button class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download Materi</button>
                                    </div>
                                </div>
                                <!-- /.attachment-text -->
                                </div>
                                <!-- /.attachment-pushed -->
                            </div>
                        <!-- /.attachment-block -->

                        <!-- Social sharing buttons -->
                        <span class="pull-right text-muted">3 diskusi</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments">
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../assets/dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Maria Gonzales
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../assets/dist/img/user5-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Nora Havisham
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                            The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <img class="img-responsive img-circle img-sm" src="../assets/dist/img/user4-128x128.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                            <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
