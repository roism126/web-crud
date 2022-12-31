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
function tambah($data){
 	//ambil data dari tiap elemen dalam form
	global $conn;
	$nip =htmlspecialchars($data["nip"]);
	$nama = htmlspecialchars($data["nama"]);
	$no_telp =htmlspecialchars($data["no_telp"]);
	$alamat = htmlspecialchars($data["alamat"]);

	//uploud gambar
	// $gambar = uploud()

		//query insert data
	$query = "INSERT INTO pegawai
				VALUES
				('', '$nip', '$nama', '$no_telp', '$alamat')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

//HAPUS

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM pegawai WHERE id = $id");
	return mysqli_affected_rows($conn);
}

//UBAH
function ubah($data) {
	//ambil data dari tiap elemen dalam form
	global $conn;
	$id = $data["id"];
	$nip =htmlspecialchars($data["nip"]);
	$nama = htmlspecialchars($data["nama"]);
	$no_telp =htmlspecialchars($data["no_telp"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "UPDATE pegawai SET
				nip = '$nip',
				nama = '$nama',
				no_telp = '$no_telp',
				alamat = '$alamat'
			  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


//CARI
function cari($keyword){
	$query = "SELECT * FROM pegawai
				WHERE
				 nama LIKE '%$keyword%' OR 
				 nip LIKE '%$keyword%' OR
				 no_telp LIKE '%$keyword%' OR 
				 alamat LIKE '%$keyword%'
				 ";
	return query($query);
}

 ?>