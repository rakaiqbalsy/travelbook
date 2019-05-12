<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Travelin.kuy</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Karla|Roboto|Viga" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/csslogin/animate.css"> 
  <link rel="stylesheet" type="text/css" href="../../css/csslogin/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/csslogin/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/csslogin/util.css">
  <link rel="stylesheet" type="text/css" href="../../css/csslogin/login.css">
  
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <!-- gamabar bergerak -->
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../../img/logoo.png" alt="IMG">
        </div>

        <!-- formulir -->
        <form class="login100-form validate-form" action="proses.php?act=insert" method="POST">
          <span class="login100-form-title">
            <h2>Daftar Sebagai Member Travelin.kuy</h2>
          </span>

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

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="nama_pelanggan" placeholder="Nama Lengkap">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>


          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email_pelanggan" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="username_pelanggan" placeholder="username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password_pelanggan" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="nama_pelanggan" placeholder="nama">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="alamat_pelanggan" placeholder="alamat">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="number" name="nomor_pelanggan" placeholder="nomor handphone">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="simpan" value="simpan">
              Daftar
            </button>
          </div>

          
        </form>
        <!-- finish formulir -->
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../../js/loginjs/login.js"></script>
<!--===============================================================================================-->
  <script src="../../js/loginjs/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../../js/loginjs/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>