<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Karla|Roboto|Viga" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/daftar.css">
  <title>Masuk Travelin.Kuy</title>
</head>
<body>
  
  <section class="daftar">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h3>Daftar Member TravelinKuy.id</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="pendaftaran">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="width: 500px;">
            <form class="login100-form validate-form" action="proses.php?act=insert" method="POST">
          

              <?php  

                  require_once "../../config/database.php";
                  // fungsi untuk membuat id pelanggan
                  $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pelanggan,6) as kode FROM data_pelanggan
                                                    ORDER BY id_pelanggan DESC LIMIT 1")
                                                    or die('Ada kesalahan pada query tampil id_pelanggan : '.mysqli_error($mysqli));

                  $count = mysqli_num_rows($query_id);

                  if ($count <> 0) {
                      // mengambil data kode_pelanggan
                      $data_id = mysqli_fetch_assoc($query_id);
                      $kode    = $data_id['kode']+1;
                  } else {
                      $kode = 1;
                  }

                  // buat kode_pelanggan
                  $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
                  $id_pelanggan = "PLG-$buat_id";
              ?>

                <div class="wrap-input100 validate-input">
                      <input class="input100"type="text" class="form-control" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" readonly required>
                      <span class="focus-input100"></span>
                      <span class="symbol-input100">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                </div>

              <div class="form-group">
                <label for="namaLengkap">Nama Lengkap : </label>
                <input class="form-control" id="namaLengkap" type="text" name="nama_pelanggan" placeholder="Nama Lengkap">
              </div>


              <div class="form-group" data-validate = "Valid email is required: ex@abc.xyz">
                <label for="email">E-mail : </label>
                <input class="form-control" id="email" type="email" name="email_pelanggan" placeholder="Email">
              </div>

              <div class="form-group">
                <label for="username">Username : </label>
                <input class="form-control" id="username" type="text" name="username_pelanggan" placeholder="username">
              </div>

              <div class="form-group" data-validate = "Password is required">
                <label for="password">Password : </label>
                <input class="form-control" id="password" type="password" name="password_pelanggan" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat : </label>
                <textarea class="form-control" id="alamat" name="alamat_pelanggan" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="nomorHp">Nomor Handphone : </label>
                <input class="form-control" id="nomorHp" type="number" name="nomor_pelanggan" placeholder="nomor handphone">
              </div>

              
              <div class="container-login100-form-btn">
                <button class="btn btn-success" type="submit" name="simpan" value="simpan">
                  Daftar
                </button>
              </div>

              
            </form>
            <a href="#"  class="btn btn-primary">Login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  

  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>


