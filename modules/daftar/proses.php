
<?php
//Panggil database
require_once "../../config/database.php";

if ($_GET['act']=='insert') {
	if (isset($_POST['simpan'])) {
		//ambil data dari daftar.php
		$id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
		$email_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['email_pelanggan']));
		$username_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['username_pelanggan']));
		$password_pelanggan  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password_pelanggan'])));
		$nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
        $alamat_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pelanggan']));
        $nomor_pelanggan = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['nomor_pelanggan'])));

        //query simpan ke tabel pelanggan
        $query = mysqli_query($mysqli, "INSERT INTO data_pelanggan(id_pelanggan,email,username,password,nama_pelanggan,alamat,no_telp)
                VALUES ('$id_pelanggan','$email_pelanggan','$username_pelanggan','$password_pelanggan','$nama_pelanggan','$alamat_pelanggan','$nomor_pelanggan')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

         if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../index.php?alert3");
            }   
	}
}