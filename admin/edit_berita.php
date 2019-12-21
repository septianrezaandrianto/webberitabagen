<?php

include"layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_berita']) && $_POST['edit_berita'] == "SIMPAN"){

	$judul= $_POST['judul'];	
	$kategori= $_POST['kategori'];
	$isi= $_POST['isi'];
	$gambar= $_FILES['gambar']['name'];

	if(!empty($gambar)){
	    move_uploaded_file($_FILES['gambar']['tmp_name'],"../upload/berita/".$gambar);
	    $query = mysql_query("UPDATE berita set gambar_berita = '$gambar' where id_berita = '$id'",$con);
	}
	$query = mysql_query("UPDATE berita set judul_berita = '$judul', isi_berita = '$isi', id_kategori = '$kategori' where id_berita ='$id'",$con);

	if($query){
	     header('location:list_berita.php');
	}

}
// berita
$query= mysql_query("SELECT * FROM berita where id_berita = '$id'",$con);
$data = mysql_fetch_assoc($query);
// kategori
$kategori = mysql_query("SELECT * FROM kategori order by nama_kategori ASC",$con);
$kat = mysql_fetch_assoc($kategori);
?>

<form action="" method="post" enctype="multipart/form-data">

	<lable>Judul	:</lable><input type="text" name="judul" value="<?=$data['judul_berita'];?>"><br>
	<lable>Kategori :</lable>
	<select name="kategori">
			<option value=""></option>--Pilih Kategori--</option>
			<?php do{ ?>
    <option value="<?=$kat['id_kategori'];?>" <?php if($data['id_kategori'] == $kat['id_kategori']){echo "selected";}?>>
		<?=$kat['nama_kategori']; ?>
    </option>
<?php }while($kat = mysql_fetch_assoc($kategori)); ?>
		</select><br>
	<lable>Isi :</lable><textarea name="isi"><?=$data['isi_berita'];?></textarea><br>
	<lable>Gambar :</lable><input type="file" name="gambar"><br>
	<i>Dimensi gambar harus berukuran 750px x 450px</i><br>
	<input type="submit" name="edit_berita" value="SIMPAN">
	
</form>