<?php

require "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}	
?>
<h1>Selamat Datang Administrator</h1>