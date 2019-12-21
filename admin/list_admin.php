<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$query = mysql_query("Select *from admin order by id_admin DESC",$con);
$data = mysql_fetch_assoc($query);

?>

<a class="btn add" href="tambah_admin.php">Tambah Admin</a>

<table border="1">
    <thead>
	<tr>
	<th>No.</th>
	<th>Nama Admin</th>
	<th>Username</th>
	<th>Password</th>
	<th>Aksi</th>
	</tr>
    </thead>
    <tbody>
	<?php $num = 0; do{ $num++; ?>	
	<tr>
	    <td><?=$num;?></td>
	    <td><?=$data['nama_admin'];?></td>
	    <td><?=$data['user_admin'];?></td>
	    <td><?=$data['pass_admin'];?></td>
	    <td>
		<a class="btn edit" href="edit_admin.php?id=<?=$data['id_admin'];?>">Edit</a>
		<a class="btn delete" href="hapus_admin.php?id=<?=$data['id_admin'];?>">Hapus</a>
	    </td>
	</tr>
	<?php }while($data = mysql_fetch_assoc($query));?>
     </tbody>

</table>