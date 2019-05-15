<?php
  session_start();

  require_once "../../config/database.php";
?>


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong>
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT COUNT(id_pembelian) as jumlah FROM pembelian")
                                            or die('Ada kesalahan pada query tampil Data Booking: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p href="?module=form_pembelian&form=add">Beli Tiket</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  

          if (empty($_SESSION['username']) && empty($_SESSION['password'])){
              echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
          }
                  
          else { ?>
            <a href="?module=form_pembelian&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } ?>
        </div>
      </div><!-- ./col -->

    </div><!-- /.row -->
  </section><!-- /.content -->