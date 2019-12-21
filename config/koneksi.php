<?php
$con = mysql_connect('localhost','root','');
$db = mysql_select_db('berita_bagen',$con);

if($db){
	echo " ";
}else{
	echo "database tidak ditemukan";
}
?>
