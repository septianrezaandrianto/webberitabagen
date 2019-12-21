<?php
require"layout/header.php";


if(isset($_POST['daftar_user']) && $_POST['daftar_user'] == "DAFTAR"){

	$nama 		= $_POST['nama'];
	$email 		= $_POST['email'];
	$telepon 	= $_POST['telepon'];
	$kelamin	= $_POST['kelamin'];
	$user 		= $_POST['username'];
	$pass 		= $_POST['password'];

	$query = mysql_query("INSERT INTO user (nama_user,email_user,no_telp,jenis_kelamin,user_user,pass_user) VALUES ('$nama','$email','$telepon','$kelamin','$user','$pass')",$con);
	if($query){
		header ('location:index.php');
	}
}
?>

<html>
<head>
	<style>th{text-align: left;}</style>
	<link rel="stylesheet" href="assets/css/styledaftar.css">
</head>
<body>
<form action="" method="post" style="border:1px solid #ccc">
	<div class="container2">
		<h1>Daftar Member</h1>
		<p>Silahkan Isi Data Dibawah Ini</p>
		<hr>
<table>
	<tr>
		<th><label for="nama"><b>Nama Lengkap</th></b></label>
		<td><input type="text2" name="nama" placeholder="Isi Nama Lengkap" required></td>
	</tr>

	<tr>
		<th><label for="email"><b>Email</th></b></label>
		<td><input type="text2" name="email" placeholder="Isi Email" required></td>
	</tr>

	<tr>
		<th><label for="telepon"><b>No. Telepon</th></b></label>
		<td><input type="text2" name="telepon" placeholder="Isi No. Telepon" required></td>
	</tr>

	<tr>
		<th><label for="kelamin"><b>Jenis Kelamin</th></b></label>
		<td><input type="radio" name="kelamin" value="Laki-laki" required>Laki-Laki
		<input type="radio" name="kelamin" value="Perempuan" required>Perempuan</td>
	</tr>

	<tr>
		<th><label for="usernmae"><b>Username</th></b></label>
		<td><input type="text2" name="username" placeholder="Isi Username" required></td>
	</tr>
		
	<tr>	
		<th><label for="password"><b>Password</th></b></label>
		<td><input type="password" name="password" placeholder="Isi Password" required></td>
	</tr>
</table>
		<div class ="clearfix">
		<button type="submit" name="daftar_user" value="DAFTAR" class="signupbtn">Daftar</button>
		</div>
	</div>
	</form>
</body>	

</html>

<?php require "layout/footer.php" ?>