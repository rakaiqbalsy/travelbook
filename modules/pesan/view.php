<?php
  session_start();
  require_once "../../config/database.php";


  //cek session harus login
  if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    header("Location: ../../masuk.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla|Roboto|Viga" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/perusahaan.css">
    <title>Travelin.Kuy</title>
  </head>
  <body>
    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data pembelian baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembelian baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data pembelian berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembelian berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data pembelian berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembelian berhasil dihapus.
            </div>";
    }
    ?>
      <!-- awal navbar -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark">
          <div class="container-fluid">
              <a class="navbar-brand" href="../../index.php">Travelin</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-item nav-link active" href="../../about.php">Tentang kami </a>
                  <a class="nav-item nav-link active" href="../../rute.php">Rute</a>
                  <a class="nav-item nav-link active" href="../../reservasi.php">Reservasi</a>
                  <!-- <a class="nav-item nav-link active" href="#">Bantuan</a> -->
                  <div class="garis"></div>

                  <?php
                  if (empty($_SESSION['username']) && empty($_SESSION['password'])){?>
                      <a class="nav-item btn tombol" href="modules/daftar/daftar.php">Daftar</a>
                      <a class="nav-item btn tombol1" href="masuk.php">Masuk</a>
                  <?php } 
                  else {?>
                  <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                      <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                          <!-- panggil file "navlogout.php" untuk menampilkan logout -->
                           <?php include "../../navlogout.php" ?> 

                      </ul>
                    </div>
                  </nav>

                <?php } ?>
                    <!-- <a class="nav-item btn tombol2"> Raka </a> -->
                  
                </div>
              </div>
          </div>
        </nav>
    </header>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="kata">
          <h2>Eksekutif <span>Travel</span></h2>
          <p>Nikmati Perjalanan Yang Menyenangkan Bersama Kami</p>
          <br>
          <span>RESERVASI ONLINE</span>
      </div>
    </div>
    <!-- akhir jumbotron -->
  
  <!-- Reservasi -->
    <section class="tampilan">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <h3>TravelinKuy.id</h3>
            <span>FORM RESERVASI ONLINE</span>
            <hr>
          </div>
        </div>
      </div>
    </section>

    <section class="cards">
      <div class="container">
        <div class="row">
          <div class="card" style="width: 1000px; height: 800px">
            
            <form action="proses.php?act=insert" method="POST" name="formpembelian">  
              <div class="box-body">
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembelian,4) as kode FROM pembelian
            ORDER BY id_pembelian DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil pembelian : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode transaksi
            $data_id = mysqli_fetch_assoc($query_id);
            // print_r(ceil($data_id['kode']));die();
            $kode    = ceil($data_id['kode'])+1;
            } else {
            $kode = 1;
            }
            // buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_pembelian = "PBL-$tahun-$buat_id";
            ?>

            <br>
           <div class="form-group">
                <label class="col-sm-2 control-label">ID Pembelian : </label>
                <input type="text" class="form-control" name="id_pembelian" value="<?php echo $id_pembelian; ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="control-label">Tanggal Pembelian : </label>
                <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" value="<?php echo date('Y-m-d')?>" placeholder="Masukan Tanggal" readonly required>                
            </div>

              <!-- ambil id_user -->
              <?php
                  $id_user = $_SESSION['id_user'];
                  $query_id = mysqli_query($mysqli, "SELECT * FROM is_users WHERE id_user = $id_user");
                  $data_name = mysqli_fetch_assoc($query_id);
                  $data_id = $data_name['id_user'];
                  $name = $data_name['nama_user'];
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Nama Pelanggan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="username" name="id_pelanggan" value="<?php echo $name; ?>" placeholder="Masukan Nama Anda">
                </div>
              </div>

              <div class="form-group">
              <label for="id_jadwal" class="col-sm-2 control-label">Pilih Jadwal</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="id_jadwal" name="id_jadwal" data-placeholder="-- Pilih Jadwal --"  autocomplete="off" required>
                    <option value="<?php echo $data['id_jadwal'] ?>"></option>
                      <?php
                        $query_pelanggan = mysqli_query($mysqli, "SELECT id_jadwal, nama_jurusan, jam_berangkat FROM jadwal ORDER BY nama_jurusan ASC")
                          or die('Ada kesalahan pada query tampil jadwal: '.mysqli_error($mysqli));
                        while ($data_jadwal = mysqli_fetch_assoc($query_pelanggan)) {
                      echo"<option value=\"$data_jadwal[id_jadwal]\">$data_jadwal[id_jadwal] | $data_jadwal[nama_jurusan] | $data_jadwal[jam_berangkat] </option>";
                    }?>
                  </select>
                </div>
            </div>

             <div class="form-group">
              <label for="harga" class="col-sm-2 control-label">Harga Tiket</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="harga"  name="harga" onchange="subtotal()" value="120000" readonly required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket</label>
              <div class="col-sm-5" id="jumlah_tiket_div">
                <input type="number" class="form-control" id="jumlah_tiket"  name="jumlah_tiket" required data-max="8" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Berangkat</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" placeholder="Masukan Tanggal" required> 
                </div>
            </div>
            <hr>

              <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Reservasi</button>
            </form>
          </div>
        </div>
      </div>
    </section> 
    <br><hr>
<!-- Akhir Reservasi -->

 //<!-- Modal Logout -->
                      <div class="modal fade" id="logout">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title"><i class="fa fa-sign-out"> Logout</i></h4>
                              </div>
                              <div class="modal-body">
                                  <p>Apakah Anda yakin ingin logout? </p>
                              </div>
                              <div class="modal-footer">
                                  <a type="button" class="btn btn-danger" href="../../logout.php">Ya, Logout</a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                              </div>
                            </div>//<!-- /.modal-content -->
                        </div>//<!-- /.modal-dialog -->
                      </div>//<!-- /.modal -->

 <!-- footer -->
    <footer>
      <div class="container">
        <div class="ulfoot border-bottom border-dark">
          <div class="row">
            <div class="col-sm-3">
              <ul>
               <li id="judul">Travelin.id</li>
                <li>Aman</li>
                <li>Nyaman</li>
                <li>Terjangkau</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul>
                <li id="judul">Help + info</li>
                <li>FAQ</li>
                <li>Privacy Policy</li>
                <li>Terms of Use</li>
                
              </ul>
            </div>
            <div class="col-sm-3">
              <div class="row">
                <img src="img/013-twitter-1.svg" alt="">
                <img src="img/045-facebook.svg" alt="">
                <img src="img/instagram.svg" alt="">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-3">
            <ul>
              <li id="judul">Alamat: </li>
              <li>Jl AH Nasution No 34 Cibiru Bandung</li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul>
              <li id="judul">Telp: </li>
              <li>(022) 200949</li>
            </ul>
          </div>
          </div>
        </div>
        <p> Copyright © Travelin.id, Inc. All Right Reserved.</p>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../../js/perusahaan.js"></script>

    <script type="text/javascript">
    function subtotal() {
        var jumlah_tiket=$('#jumlah_tiket').val();
        var harga=$('#harga').val();
        var subtotal=0;
        subtotal=parseInt(harga)*(jumlah_tiket);
        console.log(jumlah_tiket);
        console.log(harga);
        console.log(subtotal);
        $('#subtotal').attr('value', subtotal);
    }
    $(document).ready(function() {
      $('#id_jadwal').on('change', function(){
        var id_jadwal=$('#id_jadwal').val();
        //console.log(id_jadwal);
        var link="http://localhost/travel/modules/pesan/cek_data.php?id_jadwal="+id_jadwal;
        //console.log(link);
        // url for ajax http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal=JDWL-000001
        $.ajax({
          url: link,
          success:function(dt){
            data=JSON.parse(dt);
             // data iku isine object json key harga: xxxxk
            $('#harga').attr('value', data.harga);
            $('#jumlah_tiket').attr('data-max', data.kapasitas);
            $('#jumlah_tiket').attr('max', data.kapasitas);
            $('#jumlah_tiket').attr('placeholder', 'max-'+data.kapasitas);
          }
        });
      });

      $('#jumlah_tiket').on('change', function(){
        var jumlah_tiket=$('#jumlah_tiket').val();
        var max_jumlah_tiket=$('#jumlah_tiket').data('max');
        var harga=$('#harga').val();
        if(parseInt(jumlah_tiket)>parseInt(max_jumlah_tiket)){
          alert('tiket terlalu banyak');
          $('#jumlah_tiket').val(max_jumlah_tiket);
        subtotal=parseInt(harga)*(max_jumlah_tiket);
        $('#subtotal').attr('value', subtotal);
        }
        if(parseInt(jumlah_tiket)<=parseInt(max_jumlah_tiket)){
        subtotal=parseInt(harga)*(jumlah_tiket);
        $('#subtotal').attr('value', subtotal);
        }
      });
    });

    function hitung() {
      harga = parseInt($("#harga").val());
      jumlah_tiket = parseInt($("#jumlah_tiket").val());
      if (isNaN(harga)) harga = 0;
      if (isNaN(jumlah_tiket)) jumlah_tiket = 0;
      subtotal = harga + jumlah_tiket;
      $("#subtotal").empty().append("subtotal:");
      $("#subtotal").append(subtotal);
     // $(".pesan").append("<hr/>kunjungilah <a href='http://adapani.blogspot.com/search/label/ajax'>ADAPANI BLOG untuk ilmu yang lebih mumpuni</a>");
    }

    $("#harga, #jumlah_tiket").keyup(function() {
      hitung();
    });
    </script>
  </body>
</html>
