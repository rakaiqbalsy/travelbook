
<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidjadwal'])) {
	$id_jadwal = $_POST['dataidjadwal'];

  // fungsi query untuk menampilkan data dari tabel jadwal
  $query = mysqli_query($mysqli, "SELECT id_jadwal,nama_jurusan,harga,kapasitas FROM jadwal WHERE id_jadwal='$id_jadwal'")
                                  or die('Ada kesalahan pada query tampil data jadwal: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $sisa   = $data['sisa'];
  $satuan = $data['satuan'];

	if($sisa != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>sisa</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='sisa' name='sisa' value='$sisa' readonly>
                    <span class='input-group-addon'>$satuan</span>
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>sisa</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='sisa' name='sisa' value='kapasitas jadwal tidak ditemukan' readonly>
                    <span class='input-group-addon'>Satuan jadwal tidak ditemukan</span>
                  </div>
                </div>
              </div>";
	}		
}
?> 