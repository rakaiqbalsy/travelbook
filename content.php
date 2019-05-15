<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view masuk
	if ($_GET['module'] == 'pesan') {
		include "modules/pesan/view.php";
	}