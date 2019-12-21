<?php
include"layout/header.php";

$id=$_GET['id'];
$query = mysql_query("SELECT * FROM berita where id_kategori = '$id' order by id_berita DESC",$con);
$data = mysql_fetch_assoc($query);

?>

<?php do { ?>
<div class="grid">
	<div class="cover-grid-news">
		<img src="upload/berita/<?=$data['gambar_berita'];?>" width="200px">
	</div>
	<div class="judul">
		<h5><a href="lihat_berita.php?id=<?=$data['id_berita'];?>"><?=$data['judul_berita'];?></a></h5>
	</div>
	<div class="attr">
		<ul>
		<li><?=tanggal($data['tanggal_berita']);?></li>
		</ul></li>
	</div>
	<div class="tombol-lihat">
		<a href="lihat_berita.php?id=<?=$data['id_berita'];?>">LIHAT</a>
	</div>
</div>
<?php }while($data = mysql_fetch_assoc($query));?>

<?php require "layout/footer.php"; ?>