<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['tambah_kategori']) && $_POST['tambah_kategori'] == "TAMBAH"){
    $nama = $_POST['nama'];
    $query= mysql_query("insert into kategori (nama_kategori) value ('$nama')",$con);

    if($query){
	header('location:list_kategori.php');
    }
}

?>


<form method="post" action="">
    <lable>Nama Kategori :</lable><input type="text2" name="nama"><br>
    <input type="submit" name="tambah_kategori" value="TAMBAH">
</form>