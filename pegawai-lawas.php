<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}

require 'functions.php';


$pegawai = query("SELECT * FROM pegawai");

//jika tombol cari di klik
if (isset($_POST["cari"])) {
		$pegawai = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pegawai</title>
	<style>
		.loader {
			width: 80px;
			position: absolute;
			top: 125px;
			left: 233px;
			z-index: -1;
			display: none;
		}


		@media print{
			.logout, .form-cari, .tambah, .aksi{
				display: none;
			}



		}

	</style>
</head>
<body>

	<a href="logout.php" class="logout">Logout</a> | <a href="cetak2.php" target="_blank">cetak</a>
	

	<h1>Daftar Pegawai</h1>

	<a href="tambah.php" class="tambah">Tambah data pegawai</a>
	<br><br>

	<form action="" method="post" class="form-cari">
		<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">cari</button>
		<img src="img/loader.gif" class="loader">



	</form>
	<br>

<div id="container">

	<table border="1" cellpadding="10", cellspacing="0">
		<tr class="">
			<th>No.</th>
			<!-- <th>Gambar</th> -->
			<th>NIP</th>
			<th>Nama</th>
			<th>No_telp</th>
			<th>Alamat</th>
			<th class="aksi">Aksi</th>
		</tr>


		<?php $i = 1; ?>
		<?php foreach ($pegawai as $row ) : ?>
			

		<tr>
			<td><?= $i ?></td>
			<!-- <td><img src="img/munir.jpeg" width="50" ></td> -->
			<!-- <td><img src="img/ <?= $row["gambar"]; ?>" width="50" ></td -->
			<td><?= $row["nip"] ?></td>
			<td><?= $row["nama"] ?></td>
			<td><?= $row["no_telp"] ?></td>
			<td><?= $row["alamat"] ?></td>
			<td class="aksi">
				<a href="ubah.php? id=<?= $row["id"]; ?>" >ubah</a> |
				<a href="hapus.php? id=<?= $row["id"]; ?>" onclick="return confirm('apakah data ingin dihapus ?');">hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
</div>

<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/script.js"></script>
</html>