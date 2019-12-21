<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['tambah_berita']) && $_POST['tambah_berita'] == "TAMBAH"){
	
	$judul		= $_POST['judul'];
	$kategori	= $_POST['kategori'];
	$isi		= $_POST['isi'];
	$gambar		= $_FILES['gambar']['name'];

	move_uploaded_file($_FILES['gambar']['tmp_name'],"../upload/berita/".$gambar);

	$query = mysql_query("INSERT INTO berita (judul_berita,isi_berita,id_kategori,gambar_berita) VALUE ('$judul','$isi','$kategori','$gambar')",$con);

	if(query){
	header('location:list_berita.php');
	}
}

$query = mysql_query("SELECT * FROM kategori order by nama_kategori ASC",$con);
$data = mysql_fetch_assoc($query);

?>

<form action="" method="post" enctype="multipart/form-data">
	<lable>Judul :</lable><input type="text" name="judul"><br>
	<lable>Kategori :</lable><select name="kategori">
					<option value=""> --Pilih Kategori--</option>
					<?php do{ ?>
    					<option value="<?=$data['id_kategori'];?>"><?=$data['nama_kategori'];?></option>
					<?php }while ($data = mysql_fetch_assoc($query)); ?>
					</select><br>
	<lable>Isi Berita :</lable>
	<textarea name="isi"></textarea><br>
	<lable>Gambar :</lable><input type="file" name="gambar"><br>
	<i>Dimensi gambar harus berukuran 750px x 450px</i><br>
	<input type="submit" name="tambah_berita" value="TAMBAH">
</form>