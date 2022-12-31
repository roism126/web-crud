<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$pegawai = query("SELECT * FROM pegawai");


$mpdf = new \Mpdf\Mpdf(); ///error versi composer mpdf terlalu kecil

$html = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar pegawai</title>
	<link rel="stylesheet" href="css/print.css">
</head>
<body>
	<h1>Daftar pegawai</h1>
	<table border="1" cellpadding="10", cellspacing="0">
			<tr class="">
				<th>No.</th>
				<th class="aksi">Aksi</th>
				<!-- <th>Gambar</th> -->
				<th>NIP</th>
				<th>Nama</th>
				<th>No_telp</th>
				<th>Alamat</th>
			</tr>';

		foreach ($pegawai as $row ) {
			$html .= '<tr>
				<td>'. $i++ .'</td>
				// <td><img src="img/'. $row["gambar"] .'" ></td>
				<td>'. $row["nip"]  .'</td>
				<td>'. $row["nama"]  .'</td>
				<td>'. $row["no_telp"]  .'</td>
				<td>'. $row["alamat"]  .'</td>
			</tr>';

			
		}

$html .= '</table>



</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('daftar-pegawai.pdf', 'D');

?>