<?php

include "layout/header.php";



if(isset($_POST['tambah_admin']) && $_POST['tambah_admin'] == "DAFTAR"){
	
	$nama		= $_POST['nama'];
	$user		= $_POST['user'];
	$pass		= MD5($_POST['pass']);
	
	$query = mysql_query("INSERT INTO admin (nama_admin,user_admin,pass_admin) VALUES ('$nama','$user','$pass')",$con);

	if(query){
	header('location:list_admin.php');
	}
}

?>
<form action="" method="post">
	<lable>Nama  :</lable><input name="nama" type="text2"><br>
	<lable>Username   :</lable><input name="user" type="text2"><br>
	<lable>Password   :</lable><input name="pass" type="password"><br>
	<input type="submit" name="tambah_admin" value="DAFTAR">

</form>