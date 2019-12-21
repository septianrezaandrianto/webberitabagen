<?php

	include "layout/header.php";
	if(!$_SESSION['login']){
		header('location:login.php');
	}
	
	$id =$_GET['id'];
	if(isset($_POST['simpan_admin']) && $_POST['simpan_admin'] == "SIMPAN"){
		$cond	= "";
		$nama	= $_POST['nama'];
		$user	= $_POST['user'];
		$cond .= "nama_admin = '$nama', user_admin = '$user'";
		
		if(!empty($_POST['pass'])){
			$pass	= MD5($_POST['pass']);
			$cond .= ",pass_admin = '$pass'";
		}

		$query = mysql_query("update admin set $cond where id_admin = '$id'",$con);
		if(query){
			header('location:list_admin.php');
	}
}

$query = mysql_query("select * from admin where id_admin = '$id'",$con);
$data = mysql_fetch_assoc($query);

?>
<form action="" method="post">
	<lable>Nama :</lable><input type="text2" name="nama" value="<?=$data['nama_admin'];?>"><br>
	<lable>Username   :</lable><input type="text2" name="user" value="<?=$data['user_admin'];?>"><br>
	<lable>Password   :</lable><input name="pass" type="password"><br>
	<input type="submit" name="simpan_admin" value="SIMPAN">

</form>