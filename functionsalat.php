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

//TAMBAH
function tambahalat($data){
 	//ambil data dari tiap elemen dalam form
	global $conn;
	$nama =htmlspecialchars($data["nama"]);
	$noserial = htmlspecialchars($data["noserial"]);
	$merk =htmlspecialchars($data["merk"]);
	$jenis = htmlspecialchars($data["jenis"]);

	//uploud gambar
	// $gambar = uploud()

		//query insert data
	$query = "INSERT INTO data_alat
				VALUES
				('', '$nama', '$noserial', '$merk', '$jenis')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// HAPUS
function hapusalat($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_alat WHERE id = $id");
	return mysqli_affected_rows($conn);
}


//UBAH
function ubahalat($data) {
	//ambil data dari tiap elemen dalam form
	global $conn;
	$id = $data["id"];
	$nama =htmlspecialchars($data["nama"]);
	$noserial = htmlspecialchars($data["noserial"]);
	$merk =htmlspecialchars($data["merk"]);
	$jenis = htmlspecialchars($data["jenis"]);

	$query = "UPDATE data_alat SET
				nama = '$nama',
				noserial = '$noserial',
				merk = '$merk',
				jenis = '$jenis'
			  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


//CARI
function carialat($keyword){
	$query = "SELECT * FROM data_alat
				WHERE
				 nama LIKE '%$keyword%' OR 
				 noserial LIKE '%$keyword%' OR
				 merk LIKE '%$keyword%' OR 
				 jenis LIKE '%$keyword%'
				 ";
	return query($query);
}



?>