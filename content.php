<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";

if ($_GET['module'] == 'beranda') {
		include "modules/daftar/daftar.php";
}
