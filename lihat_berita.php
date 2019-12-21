<?php

include"layout/header.php";

$id=$_GET['id'];

$query = mysql_query("SELECT kategori.*,berita.* from berita left join kategori on berita.id_kategori = kategori.id_kategori where berita.id_berita = '$id'",$con);
$data = mysql_fetch_assoc($query);


?>

<div class="col-9">
	<h1><?=$data['judul_berita'];?></h1>
	<div>
		<img src="upload/berita/<?=$data['gambar_berita'];?>" style="width:700px;height:400px">
	</div>
	<div>
		<p>Kategori :<a href="kategori.php?id=<?=$data['id_kategori'];?>"><?=$data['nama_kategori'];?></a></p>
		<p>Rilis Berita : <?=tanggal($data['tanggal_berita']);?></p>
	</div>
	<div>
		<p><?=$data['isi_berita'];?></p>
	</div>
	<div class="komter">
	<h3>Komentar Terkini</h3>
	<?php include "komentar.php" ?>
	</div>
</div>
<div class="col-3">
	<h2>Berita Terkait</h2>
	<?php
		$id_berita = $data['id_berita'];
		$id_kategori = $data['id_kategori'];
		$q_terkait = mysql_query ("SELECT kategori.*, berita.* FROM berita left join kategori on berita.id_kategori = kategori.id_kategori
		where berita.id_kategori = '$id_kategori' limit 4",$con);
		$terkait = mysql_fetch_assoc($q_terkait);
		
	if(mysql_num_rows($q_terkait) >0){
	do{ 
		if($terkait['id_berita'] != $id_berita) {

	?>
	
	<div class="sidebar">
		<div class="terkait">
			<div class="image">
			<img src="upload/berita/<?=$terkait['gambar_berita'];?>">
	</div>
	<div class="atribute">
		<h5><?=$terkait['judul_berita'];?></h5>
		<p><?=$terkait['nama_kategori'];?></p>
		<a href="lihat_berita.php?id=<?=$terkait['id_berita'];?>" class="btn">LIHAT</a>
		</div>
	</div>
</div>
<?php }}while($terkait = mysql_fetch_assoc($q_terkait));}else{echo "Tidak Ada Berita Terkait";} ?>

<div class="image2">
<?php include "iklan.php"; ?>

</div>
</div>
</div>

<?php require "layout/footer.php" ?>