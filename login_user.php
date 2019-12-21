<?php

require"layout/header.php";

    $err = '';
    if(isset($_POST['loginuser'])){
		//baca variabel pada form
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query_login = mysql_query("SELECT * FROM user WHERE user_user = '$username' AND pass_user = '$password'",$con);
		$datalogin = mysql_fetch_assoc($query_login);
			echo "$datalogin";

		if(mysql_num_rows($query_login) > 0){
			session_start();	

				$nama = $datalogin['nama_user'];

				$_SESSION['nama_user'] = $nama;
				$_SESSION['loginuser'] = true;
				header("location:index.php");

			}else{
				$err= "Username atau Password Salah";
			}
		}			
?>
<html>
	<head>
		<style>th{text-align: left;}</style>
		<link rel="stylesheet" href="assets/css/stylelogin.css">
	</head>
	<body>
		<form action="" method="post" style="border:1px solid #ccc">
		<div class="container2">
				<h2>Selamat Datang</h2>
				<p>Masukan Username dan Password anda disini</p>
			<div>

				<label for="nama">Username</label>
				<input  type="text" name="username" placeholder="Isi Username" value="" required>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Isi Password" value="" required>
			</div>
			<div>
				<a href="tambah_user.php">Daftar</a>
				<input class="login-page" type="submit" name="loginuser" value="Masuk">
			</div>
			<font color="white"><?=$err;?></font>
			</form>
	</body>
</html> 
<?php require "layout/footer.php" ?>