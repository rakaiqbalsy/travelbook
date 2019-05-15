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
            <!-- Tabel Tiket User  -->
            <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Pembelian</th>
                <th class="center">Tanggal Berangkat</th>
                <th class="center">Nama Pelanggan</th>
                <th class="center">Jumlah Tiket</th>
                <th class="center">Subtotal</th>
                <th class="center">Action</th>
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  

            //Cek Session User
            $id_user = $_SESSION['id_user'];
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel pembelian
            $query = mysqli_query($mysqli, "SELECT * FROM pembelian as A JOIN is_users as B ON A.id_user = B.id_user WHERE A.id_user = $id_user" )
                                            or die('Ada kesalahan pada query tampil Data Pembelian: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              //$harga_beli = format_rupiah($data['harga_beli']);
              //$harga_jual = format_rupiah($data['harga_jual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_pembelian]</td>
                      <td width='180'>$data[tgl_berangkat]</td>
                      <td width='180'>$data[nama_user]</td>
                      <td width='180'>$data[jumlah_tiket]</td>
                      <td width='180'>$data[subtotal]</td>"?>
                      <td width='180'><a class="btn btn-primary btn-social pull-right" href="cetak.php?act=print&id=<?php echo $data['id_pembelian']; ?>" target="_blank">
                            <i class="fa fa-print"></i> Cetak
                          </a>
                          <?php echo "</td>


                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
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

  </body>
</html>
