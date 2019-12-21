<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$query = mysql_query("delete from kategori where id_kategori = '$id'",$con);

if($query){
    header('location:list_kategori.php');
}

?>
