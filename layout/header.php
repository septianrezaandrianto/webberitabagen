<?php 

require "config/koneksi.php";
require "config/function.libs.php";

$query = mysql_query("select kategori.* ,berita.* from berita left join kategori on berita.id_kategori = kategori.id_kategori order by berita.id_berita",$con);
$data = mysql_fetch_assoc($query);

$query2= mysql_query("SELECT * FROM kategori WHERE id_kategori=10",$con);
$data2= mysql_fetch_assoc($query2);

$query3= mysql_query("SELECT * FROM kategori WHERE id_kategori=11",$con);
$data3= mysql_fetch_assoc($query3);

$query4= mysql_query("SELECT * FROM kategori WHERE id_kategori=12",$con);
$data4= mysql_fetch_assoc($query4);

$query5= mysql_query("SELECT * FROM kategori WHERE id_kategori=9",$con);
$data5= mysql_fetch_assoc($query5);

session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Web Berita Bagen</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div class="container">			
			<header>
			<img src="assets/images/logobb3.png">
			<div id="nav">
				<ul class="menu">
					<a href="index.php"><li>Home</a></li>
						<li>Kategori
							<ul class="submenu">
								<li><a href="kategori.php?id=<?=$data['id_kategori'];?>"><?=$data5['nama_kategori'];?></a></li>
								<li><a href="kategori.php?id=<?=$data2['id_kategori'];?>"><?=$data2['nama_kategori'];?></a></li>
								<li><a href="kategori.php?id=<?=$data3['id_kategori'];?>"><?=$data3['nama_kategori'];?></a></li>
								<li><a href="kategori.php?id=<?=$data4['id_kategori'];?>"><?=$data4['nama_kategori'];?></a></li>
							</ul>
						</li>
					<a href="tentang.php"><li>Tentang Kami</a></li>

					<?php if(isset($_SESSION['loginuser'])) { ?>
					<a href="logout_user.php"><li>Log Out</a></li>
					<?php }else{ ?>
					<a href="login_user.php"><li>Log In</a>
					<?php } ?></li>
				</ul>
				<form action="cari.php" class="cari" method="get">
					<input type="text" name="txt_cari" placeholder="Cari">
					<button type="submit">&check;</button>
				</form>
			</div> <!-- #nav -->
	</header>
</body>
		<div class="clear"></div>
		<div class="content">
</html>