<?php
	error_reporting(0);
	include "config/koneksi.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM komentar WHERE id_berita = '$id' ";
	$que = mysql_query($sql);
	while ($res = mysql_fetch_array($que)) { ?>
	
	<div class="iskom" align="left"><pre><?php echo $res['tanggal_komentar']?>
	<pre>Nama    : <?php echo $res['nama']?>
	<pre><?php echo $res['isi_komentar']?>
	</div>
	</pre>
<?php } ?>
<br>
<form method="post">
	<input type="text" name="nama" required placeholder="Masukan Nama Anda" class="nakom">
	<textarea name="isi" required placeholder="Masukan Komentar Anda" class="komis"></textarea>

	<?php if(isset($_SESSION['loginuser'])) { ?>
	<input type="submit" value="Kirim" name="btnkomen" class="btn">
	<?php }else{ 
	echo "Jika Ingin Kirim Komentar, Silahkan Login Dulu!"; } ?>

</form>
<?php
	if (isset($_POST['btnkomen'])) {
		$nama = $_POST['nama'];
		$isi = $_POST['isi'];
		$tanggal = date("d-m-Y");
		
		$sql = "INSERT INTO komentar VALUES (' ', '$id', '$nama', '$tanggal', '$isi')";
		$que = mysql_query($sql);
		echo "Sukses";
		echo "<meta http-equiv='refresh' content='16;url=lihat_berita.php?id=".$id."'>";
	}
?>