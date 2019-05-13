<?php

	
	// include 'config/database.php';
 
	// $username = $_POST['username'];
	// $password = md5($_POST['password']);
	 
	// $login = mysqli_query("select * from data_pelanggan where username='$username' and password='$password'");
	// $cek = mysqli_num_rows($login);
	 
	// if($cek > 0){
	// 	session_start();
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['status'] = "login";
	// 	header("location:admin/index.php=3");
	// }else{
	// 	header("location:index.php?alert=1");	
	// }

	// panggil file untuk koneksi ke database
	require_once "config/database.php";

	// ambil data hasil submit dari form
	$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
	$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

	// pastikan username dan password adalah berupa huruf atau angka.
	// if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	// 	header("Location: index.php?alert=1");
	// }
	
	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
		$query = mysqli_query($mysqli, "SELECT * FROM is_users WHERE username='$username' AND password='$password'");
		// or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
		$rows  = mysqli_num_rows($query);

	
	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nama_user'] = $data['nama_user'];
		
		// lalu alihkan ke halaman user
		//header("Location: main.php?module=beranda");
		header("Location: index.php?alert=3");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		header("Location: masuk.php?alert=1");
	}

?>