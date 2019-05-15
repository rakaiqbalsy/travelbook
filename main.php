<?php
  session_start();
?>

<!DOCTYPE html>
<html>
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
      // tampilkan pesan Gagal "Username atau Password salah, cek kembali Username dan Password Anda"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
                Username atau Password salah, cek kembali Username dan Password Anda.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Anda telah berhasil logout"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Anda telah berhasil logout.
              </div>";
      }

       elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Telah Login.
              </div>";
      }
      ?>
    
    <!-- awal navbar -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Travelin</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-item nav-link active" href="#">Tentang kami </a>
                  <a class="nav-item nav-link active" href="#">Rute</a>
                  <a class="nav-item nav-link active" href="#">Reservasi</a>
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
                           <?php include "navlogout.php" ?> 

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
          <a href="?module=pesan" class="btn btn-half">Reservasi Sekarang</a>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <?php
    	include "../pesan/view.php" 
     ?>


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
    
    <!-- akhir footer -->

    <!-- <div class="alert alert-primary" role="alert">
        A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
      </div> -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../../js/perusahaan.js"></script>
</body>
</html>
