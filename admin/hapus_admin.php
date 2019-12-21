<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$query = mysql_query("delete from admin where id_admin = '$id'");

if($query){
    header('location:list_admin.php');
}

?>
