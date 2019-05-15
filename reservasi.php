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
    <link rel="stylesheet" href="css/perusahaan.css">
    <link rel="stylesheet" href="css/masuk.css"> 
    <title>Reservasi Travelin.Kuy</title>
  </head>
  <body>

<?php
    session_start();
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
                Telah Daftar.
              </div>";
      }
?>    

    <!-- awal navbar -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark">
          <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Travelin</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-item nav-link active" href="about.php">Tentang kami </a>
                  <a class="nav-item nav-link active" href="rute.php">Rute</a>
                  <a class="nav-item nav-link active" href="reservasi.php">Reservasi</a>
                  <!-- <a class="nav-item nav-link active" href="#">Bantuan</a> -->
                  <div class="garis"></div>
                  <a class="nav-item btn tombol" href="modules/daftar/daftar.php">Daftar</a>
                  <a class="nav-item btn tombol1" href="masuk.php">Masuk</a>
                </div>
              </div>
          </div>
        </nav>
    </header>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="kata">
          <h2>RESERVASI</h2>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- Tentang Kami -->
    <section class="awal">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 info-panel">
            <div class="row">
              <div class="col-lg">
     <!--            <a href="bisabelajar.html"> -->
                  <img src="img/edu.svg" alt="foto" class="float-left">
                  <h4>Aman</h4>
                  <p>Keamanan Standar Prioritas Kami</p>
                </a>
              </div>
              <div class="col-lg"> 
                <a href="#">
                  <img src="img/love.svg" alt="foto" class="float-left">
                  <h4>Nyaman</h4>
                  <p>Armada Yang Prima Dengan Pelayanan Full Service</p>
                </a>
              </div>
              <div class="col-lg">
<!--                 <a href="bjb.html"> -->
                  <img src="img/box.svg" alt="foto" class="float-left">
                  <h4>Terjangkau</h4>
                  <p>Harga Yang Terjangkau Dan Kompetitif</p>
                </a> 
              </div>
            </div>
          </div>
        </div>

<!-- Akhir Tentang Kami -->

  <!-- Reservasi -->
    <section class="tampilan">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <h3>TravelinKuy.id</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="cards">
      <div class="container">
        <div class="row">
          <div class="card" style="width: 500px; height: 350px">
            <form action="login-check.php" method="POST">
              <div class="form-group">
                <label for="username">Nama Pelanggan    : </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Anda">
              </div>

              <div class="form-group">
                <label for="control-label">Tanggal Berangkat : </label>
                <input type="text" class="form-control" id="dtp" placeholder="Masukan Tanggal">                
                <!-- <input type="password" class="form-control" id="password" name="password" placeholder="Password"> -->
              </div>
              <br>
        

              <button type="submit" class="btn btn-primary" name="login" value="Login">Reservasi</button>
              <!-- <button type="submit" class="btn btn-primary">Masuk</button> -->
            </form>
            <!-- <a href="modules/daftar/daftar.php"  class="btn btn-success">Daftar</a> -->
          </div>
        </div>
      </div>
    </section> 
    <br><hr>
    <!-- Akhir Reservasi -->

    <section class="anotherevent">
      <div class="container">
       <h2>Reservation Point</h2>
       <hr>
          <div class="col-sm-12">
            <div class="card-deck">

              <div class="card col-sm4">
                <img src="img/baltos.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Balubur Town Square</h5>
                  <p class="card-text">Balubur Town Square Blok B5 Tamansari Bandung</p>
                                       <p> Telp: (022) 26546</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Travelin-Kuy</small>
                </div>
              </div>
              
              <div class="card">
                <img src="img/hartonomall.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Hartono Mall</h5>
                  <p class="card-text">Hartono Mall Raya Blok A No 34 Yogyakarta</p>
                  <p> Telp: (0221) 25646</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Travelin-Kuy</small>
                </div>
              </div>

              <div class="card">
                <img src="img/office.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Office Center</h5>
                  <p class="card-text">Jl A.H Nasution (samping uin bandung) No 34 Cibiru Bandung</p>
                  <p>Telp: (022) 200949  </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Travelin-Kuy</small>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
           <a href="reservasi.php" class="btn btn-full">Reservation Point</a> 
          </div> 
      </div>
    </section>

    <section class="selang">
      <div class="container-fluid">
       <div class="container text-center">
        <div class="col-sm-12">
           <h2>Reservasi Online</h2>
           <hr>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <p>Nikmati Kemudahan Reservasi Dengan Online Booking di Travelin.id</p>
         </div>
        <div class="col-sm-3"></div>
        </div> 
       </div>
        <div class="text-center">
          <a href="reservasi.php" class="btn btn-full">Reservasi Sekarang</a> <!-- 
          <a href="#" class="btn btn-half">Konsultasi Galang Dana</a> --> 
        </div>
      </div>
    </section>  
    <!-- Akhir Reservasi -->  


    <!-- Modal Logout -->
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
                                  <a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
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
    <!-- akhir footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/perusahaan.js"></script>
    <script src="js/masuk.js"></script> 


  </body>
</html>