<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$query = mysql_query("select * from kategori order by id_kategori DESC",$con);
$data = mysql_fetch_assoc($query);

?>
<a class="btn add" href="tambah_kategori.php">Tambah Kategori</a>
<table border="1"><class="aksi">
	<thead>
	<tr>
	     <th>No.</th>
	     <th>Nama Kategori</th>
	     <th>Aksi</th>
	</tr>
    </thead>
    <tbody>
	<?php $num = 0; do{ $num++; ?>
	<tr>
	    <td><?=$num;?></td>
	    <td><?=$data['nama_kategori'];?></td>
	    <td>
		<a class="btn edit" href="edit_kategori.php?id=<?=$data['id_kategori'];?>">Edit</a>
		<a class="btn delete" href="hapus_kategori.php?id=<?=$data['id_kategori'];?>">Hapus</a>
	</tr>
	<?php } while ($data = mysql_fetch_assoc($query));?>
    </tbody>
</table>