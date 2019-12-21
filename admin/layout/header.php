<?php

require '../config/koneksi.php';
require '../config/function.libs.php';
session_start();

?>
<html>
	<head>
		<title>Ruang Admin</title>
		<link rel="stylesheet" href="assets/css/style.css">	
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="logo">
					<a href="index.php"><img src="../assets/images/logobb3.png" width="120px"></a>
				</div>
			</div>
			<div class="panel">
				<ul>
					<li><a href="list_berita.php">List Berita</a></li>
					<li><a href="list_kategori.php">List Kategori</a></li>
					<li><a href="list_iklan.php">List Iklan</a></li>
					<li><a href="list_admin.php">List Admin</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<div class="content">