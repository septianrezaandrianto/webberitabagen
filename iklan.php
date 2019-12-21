<?php
include_once "config/koneksi.php";

$id="";
$query = mysql_query("SELECT * FROM iklan order by id_iklan");
while($data = mysql_fetch_assoc($query)) {
	$id.=$data["id_iklan"].",";
}
$idi = substr($id,0,strlen($id)-1);
$idiklan=explode(",",$idi);
$acak=rand(0,count($idiklan)-1);
$tamp = $idiklan[$acak];

//echo "$tamp";
$query2 = mysql_query("SELECT * FROM iklan where id_iklan = '$tamp'");
$data2 = mysql_fetch_assoc($query2);
echo "<a target='_blank' href='http://".$data2["link_iklan"]."'><img src='upload/iklan/".$data2["id_iklan"].".jpg'/></a>";
?>