<?php

require "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_iklan']) && $_POST['edit_iklan'] == "SIMPAN"){

		$tgl1=(date("d") + $_POST["lama"]) / 30;
		$tgl=(date("d") + $_POST["lama"]) - (floor($tgl1) * 30);
		$bln1=(date("m") + floor($tgl1)) / 12;
		$bln=(date("m") + floor($tgl1)) - (floor($bln1) * 12);
		$thn=(date("Y") + floor($bln1));
		if(strlen($tgl)<2){$tgl2="0".$tgl;}else{$tgl2=$tgl;}
		if(strlen($bln)<2){$bln2="0".$bln;}else{$bln2=$bln;}
		//echo $thn.$bln2.$tgl2;
	$nama= $_POST['nama'];	
	$link= $_POST['link'];
	$gambar= $_FILES['gambar']['name'];
	$pasang = $_POST['tanggal_pasang'];
	$akhir = $_POST['tanggal_akhir'];

	if(!empty($gambar)){
	    move_uploaded_file($_FILES['gambar']['tmp_name'],"../upload/iklan/".$gambar);
	    $query = mysql_query("UPDATE iklan set gambar_iklan = '$gambar' where id_iklan = '$id'",$con);
	}
	$query = mysql_query("UPDATE iklan set nama_iklan = '$nama', link_iklan = '$link', id_iklan = '$id', tanggal_pasang='$pasang".date("Ymd")."', tanggal_akhir='$akhir".$thn.$bln2.$tgl2."',aktif='1'");

	if($query){
	     header('location:list_iklan.php');
	}
}
if($_GET["id"]!=""){
	$query2 = mysql_query("SELECT * FROM iklan where id_iklan ='".$_GET["id"]."'");
	$data2 = mysql_fetch_assoc($query2);
	$nama= $data2['nama_iklan'];	
	$link= $data2['link_iklan'];
	$pasang = $data2['tanggal_pasang'];
	$akhir = $data2['tanggal_akhir'];

}
?>
<form action="" method="post" enctype="multipart/form-data">
	<lable>Nama Iklan :</lable><input type="text" name="nama" value="<?=$data2['nama_iklan'];?>"><br>
	<lable>Gambar :</lable><input type="file" name="gambar"><br>
	<i>Dimensi gambar harus berukuran 300px x 225px</i><br>
	<lable>Link :</lable><input type="text" name="link" value="<?=$data2['link_iklan'];?>"><br>
	<lable>Lama Iklan :</lable><input type="text" name="lama"><br>
	<i>Isikan angka untuk lamanya iklan tampil dalam hitungan hari</i><br>
		<input type="hidden" name="tanggal_pasang" value="<?=$data2['tanggal_pasang'];?>">
		<input type="hidden" name="tanggal_akhir" value="<?=$data2['tanggal_akhir'];?>">
	<input type="submit" name="edit_iklan" value="SIMPAN">
</form>