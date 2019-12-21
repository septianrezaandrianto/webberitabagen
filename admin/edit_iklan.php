<?php

include"layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_iklan']) && $_POST['edit_iklan'] == "SIMPAN"){

	$nama= $_POST['nama'];	
	$link= $_POST['link'];
	$aktif= $_POST['aktif'];
	$gambar= $_FILES['gambar']['name'];

	if(!empty($gambar)){
	    move_uploaded_file($_FILES['gambar']['tmp_name'],"../upload/iklan/".$gambar);
	    $query = mysql_query("UPDATE iklan set gambar_iklan = '$gambar' where id_iklan = '$id'",$con);
	}
	$query = mysql_query("UPDATE iklan set nama_iklan = '$nama', link_iklan = '$link', id_iklan = '$id' where id_iklan ='$id'",$con);

	if($query){
	     header('location:list_iklan.php');
	}
}
$query= mysql_query("SELECT * FROM iklan where id_iklan = '$id'",$con);
$data = mysql_fetch_assoc($query);

?>
<form action="" method="post" enctype="multipart/form-data">
	<lable>Nama Iklan :</lable><input type="text" name="nama" value="<?=$data['nama_iklan'];?>"><br>
	<lable>Gambar :</lable><input type="file" name="gambar"><br>
	<i>Dimensi gambar harus berukuran 300px x 225px</i><br>
	<lable>Link :</lable><input type="text" name="link" value="<?=$data['link_iklan'];?>"><br>
	<lable>Lama Iklan :</lable><input type="text" name="lama"><br>
	<i>Isikan angka untuk lamanya iklan tampil dalam hitungan hari</i><br>
		<input type="hidden" name="tanggal_pasang" value="<?php echo $pasang;?>">
		<input type="hidden" name="tanggal_akhir" value="<?php echo $akhir;?>">
	<input type="submit" name="edit_iklan" value="SIMPAN">
</form>