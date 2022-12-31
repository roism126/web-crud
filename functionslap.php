<?php 

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "monitoring");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

//UBAH
function ubahlap($data) {
	//ambil data dari tiap elemen dalam form
	global $conn;
	$id = $data["id"];
	$tanggal =htmlspecialchars($data["tanggal"]);
	$jam =htmlspecialchars($data["jam"]);
	$nama =htmlspecialchars($data["nama"]);
	$namaalat =htmlspecialchars($data["namaalat"]);
	$noserial = htmlspecialchars($data["noserial"]);
	$keterangan =htmlspecialchars($data["keterangan"]);
	$query = "UPDATE laporan SET
				tanggal = '$tanggal',
				jam  = '$jam',
				nama = '$nama',
				namaalat = '$namaalat',
				noserial = '$noserial',
				keterangan = '$keterangan'
			  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

//TAMBAH
function tambahlap($data){
 	//ambil data dari tiap elemen dalam form
	global $conn;
	$tanggal =htmlspecialchars($data["tanggal"]);
	$jam =htmlspecialchars($data["jam"]);
	$nama =htmlspecialchars($data["nama"]);
	$namaalat =htmlspecialchars($data["namaalat"]);
	$noserial = htmlspecialchars($data["noserial"]);
	$keterangan =htmlspecialchars($data["keterangan"]);

	//uploud gambar
	// $gambar = uploud()

		//query insert data
	$query = "INSERT INTO laporan
				VALUES
				('', '$tanggal', '$jam', '$nama', '$namaalat', '$noserial', '$keterangan')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
 }


// HAPUS
function hapuslap($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM laporan WHERE id = $id");
	return mysqli_affected_rows($conn);
}


//CARI
function carilap($keyword){
	$query = "SELECT * FROM laporan
				WHERE
				 tanggal LIKE '%$keyword%' OR 
				 jam LIKE '%$keyword%' OR
				 nama LIKE '%$keyword%' OR 
				 namaalat LIKE '%$keyword%' OR 
				 noserial LIKE '%$keyword%' OR
				 keterangan LIKE '%$keyword%'
				 ";
	return query($query);
}



	 ?>