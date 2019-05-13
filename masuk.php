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
    <link rel="stylesheet" href="css/masuk.css">
    <title>Masuk Travelin.Kuy</title>
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
          <div class="card" style="width: 500px;">
            <form action="login-check.php" method="POST">
              <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="password">Password : </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
<<<<<<< HEAD
              <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
=======
              <button type="submit" class="btn btn-primary">Masuk</button>
>>>>>>> ae4739e45ed2473b4429b7d7b16efb379261b49b
            </form>
            <a href="modules/daftar/daftar.php"  class="btn btn-success">Daftar</a>
          </div>
        </div>
      </div>
    </section>     
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>