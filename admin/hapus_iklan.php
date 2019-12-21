<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$query = mysql_query("delete from iklan where id_iklan = '$id'",$con);

if($query){
    header('location:list_iklan.php');
}

?>