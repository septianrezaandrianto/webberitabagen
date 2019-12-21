<?php

include_once "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}
$query = mysql_query("SELECT * FROM iklan order by id_iklan Desc",$con);
$data = mysql_fetch_assoc($query);

//if(isset($_POST['tambah_iklan']) && $_POST['tambah_iklan'] == "TAMBAH"){
if(isset($_POST['tambah_iklan']) && $_POST['tambah_iklan'] == "TAMBAH"){
if($_POST["nama"]!="" && $_FILES["gambar"]["name"]!=="" && $_POST["link"]!="" && $_POST["lama"]!=""){
		$tgl1=(date("d") + $_POST["lama"]) / 30;
		$tgl=(date("d") + $_POST["lama"]) - (floor($tgl1) * 30);
		$bln1=(date("m") + floor($tgl1)) / 12;
		$bln=(date("m") + floor($tgl1)) - (floor($bln1) * 12);
		$thn=(date("Y") + floor($bln1));
		if(strlen($tgl)<2){$tgl2="0".$tgl;}else{$tgl2=$tgl;}
		if(strlen($bln)<2){$bln2="0".$bln;}else{$bln2=$bln;}
		//echo $thn.$bln2.$tgl2;
	$gambar		= $_FILES['gambar']['name'];
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../upload/iklan/".$gambar);

	$query=mysql_query("INSERT INTO iklan set nama_iklan='".$_POST["nama"]."', link_iklan='".$_POST["link"]."', gambar_iklan='".$_FILES["gambar"]["name"]."', tanggal_pasang='".date("Ymd")."', tanggal_akhir='".$thn.$bln2.$tgl2."',aktif='1'");
	echo "Data Sudah Masuk";
	}
	if(query){
header('location:list_iklan.php');
}
}
?>
<form action="" method="post" enctype="multipart/form-data">
	<lable>Nama Iklan :</lable><input type="text" name="nama"><br>
	<lable>Gambar :</lable><input type="file" name="gambar"><br>
	<i>Dimensi gambar harus berukuran 300px x 225px</i><br>
	<lable>Link :</lable><input type="text" name="link"><br>
	<lable>Lama Iklan :</lable><input type="text" name="lama"><br>
	<i>Isikan angka untuk lamanya iklan tampil dalam hitungan hari</i><br>
	<br>
	<input type="submit" name="tambah_iklan" value="TAMBAH">
</form>