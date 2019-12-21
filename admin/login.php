<?php
    include "../config/koneksi.php";
    $err = '';
    if(isset($_POST['login']) && $_POST['login'] == "Masuk"){
	
		$name = $_POST['user'];
		$pass = MD5($_POST['pass']);

		$query = mysql_query("select * from admin where user_admin = '$name' and pass_admin = '$pass'",$con);
		$data = mysql_fetch_assoc($query);
	
		if(mysql_num_rows($query) > 0){
			session_start();	
			
			$_SESSION['id_admin'] = $data['id_admin'];
			$_SESSION['login'] = true;
			header ('location:index.php');
			}
			if(empty($_POST['user'])){
			$err = "Username Belum Diisi";
		}
		else if(empty($_POST['pass'])){
			$err = "Password Belum Diisi";
			}else {
				$err= "Username atau Password Salah";
			}
		}			
?>
<html>
	<head>
		<title>Login Admin</title>
		<link rel="stylesheet" href="assets/css/stylelogin.css">	
	</head>
	<body style="background-image:url(../assets/images/background.jpg)">
		<div class="login-page">
			<form action="" method="post">
				<h1 align="center"><img src="../assets/images/loginadmin.png" width="100px">Silahkan Login</h1>
				<input name="user" type="text" placeholder="Isi Username"><br>
				<input name="pass" type="password" placeholder="Isi Password"><br>
				<a href="tambah_admin.php">Daftar</a>
				<input type="submit" name="login" value="Masuk">
				<br>
				<font color="white"><?=$err;?></font>
			</form>
		</div>
	</body>
</html>
