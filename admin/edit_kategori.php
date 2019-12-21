<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id=$_GET['id'];

if(isset($_POST['simpan_kategori']) && $_POST['simpan_kategori'] == "SIMPAN"){
	$nama= $_POST['nama'];	
	$query = mysql_query("update kategori set nama_kategori = '$nama' where id_kategori ='$id'",$con);

	if($query){
	     header('location:list_kategori.php');
	}

}

$query= mysql_query("SELECT * FROM kategori where id_kategori = '$id'",$con);
$data = mysql_fetch_assoc($query);

?>
<form method="post" action="">
	<lable>Nama Kategori :</lable><input type="text2" name="nama" value="<?=$data['nama_kategori'];?>"><br>
		<input type="submit" name="simpan_kategori" value="SIMPAN">
	
</form>
