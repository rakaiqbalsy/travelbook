
<?php
//Panggil database
require_once "../../config/database.php";

if ($_GET['act']=='insert') {
	if (isset($_POST['simpan'])) {
		//ambil data dari daftar.php
		$email_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['email_pelanggan']));
		$username_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['username_pelanggan']));
		$password_pelanggan  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password_pelanggan'])));
		$nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
        $alamat_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pelanggan']));
        $nomor_pelanggan = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['nomor_pelanggan'])));
        $hak_akses = mysqli_real_escape_string($mysqli, trim('Pelanggan'));

        //query simpan ke tabel pelanggan
        $query = mysqli_query($mysqli, "INSERT INTO is_users(email,username,password,nama_user,alamat,telepon, hak_akses)
                VALUES ('$email_pelanggan','$username_pelanggan','$password_pelanggan','$nama_pelanggan','$alamat_pelanggan','$nomor_pelanggan', '$hak_akses')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

         if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../masuk.php?alert=3");
            }   
	}
}