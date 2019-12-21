<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$query = mysql_query("select * from iklan order by id_iklan DESC",$con);

$data = mysql_fetch_assoc($query); 

?>
<a class ="btn add" href="tambah_iklan.php">Tambah Iklan</a>
<table border="1">

	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Link</th>
			<th>Gambar</th>
			<th>Tanggal Pasang</th>
			<th>Tanggal Akhir</th>
			<th>Aktif</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td><?=$num;?></td>	
			<td><?=$data['nama_iklan'];?></td>
			<td><?=$data['link_iklan'];?></td>
			<td><img src="../upload/iklan/<?=$data['gambar_iklan'];?>" style="width:100px"></td>
			<td><?=$data['tanggal_pasang'];?></td>
			<td><?=$data['tanggal_akhir'];?></td>
			<td><?=$data['aktif'];?></td>
			<td>
			<a class="btn edit" href="edit_iklan.php?id=<?=$data['id_iklan'];?>">Edit</a>
			<a class="btn delete" href="hapus_iklan.php?id=<?=$data['id_iklan'];?>">Hapus</a>
			</td>
		</tr>
	<?php }while($data = mysql_fetch_assoc($query)); ?>
	</tbody>
</table>