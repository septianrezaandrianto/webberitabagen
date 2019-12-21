<?php
require "layout/header.php";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
/*$perpage = 2;
 		if(isset($_GET['page'])){
 			$page = $_GET['page'];
 		}else{
 			$page = 1;
 		}
 		if($page > 1){
 			$start =($page * $perpage) - $perpage;
 		}else{
 			$start = 0;
 		}*/
$query = mysql_query("SELECT kategori.* ,berita.* from berita left join kategori on berita.id_kategori = kategori.id_kategori order by berita.id_berita DESC limit 12",$con);
$data = mysql_fetch_assoc($query);

session_start();
$_SESSION['nama_user'] = $nama;

?>
<!doctype html>
<head>
		<link rel="stylesheet" type="text/css" href="assets/css/imageslider.css">
</head>
<body>

	<div id="slidercontainer">
		<div id="css3slider">
			<img src="assets/slideshow/1.jpg">
			<img src="assets/slideshow/2.jpg">
			<img src="assets/slideshow/3.jpg">
			<img src="assets/slideshow/4.jpg">
		</div>
	</div>
</body>
</html>

<?php do{ ?>
<div class="grid">
	<div class="cover-grid-news">
		<img src="upload/berita/<?=$data['gambar_berita'];?>" width="200px">
	</div>
	<div class="judul">
		<h5><a href="lihat_berita.php?id=<?=$data['id_berita'];?>"><?=$data['judul_berita'];?></a></h5>
	</div>
	<div class="attr">
		<ul>
			<li><a href="kategori.php?id=<?=$data['id_kategori'];?>"><?=$data['nama_kategori'];?></a></li>
			<li><?=tanggal($data['tanggal_berita']);?></li>
		</ul>
	</div>
	<div class="tombol-lihat">
		<a href="lihat_berita.php?id=<?=$data['id_berita'];?>">LIHAT</a>
	</div>
</div>
<?php  } while($data = mysql_fetch_assoc($query));{ ?>
<div class="bottom">
<?php

 			/*$query2 = mysql_query("SELECT * FROM  berita LIMIT $start, $perpage",$con);
			$jmlbaris = mysql_num_rows($query);
			$halaman = floor($jmlbaris/$perpage);
			for($i = 1; $i<=$halaman; $i++){
			echo "<a href='?page=$i'>$i </a>";
		} */
	} 
	?>
</div>
<?php require "layout/footer.php"; ?>