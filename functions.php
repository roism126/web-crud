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
				('', '$nama', '$nip', '$no_telp, '$alamat')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
 }


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
				('', '$tanggal', '$jam', '$nama', '$namaalat', '$noserial', '$keterangan)
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
 }


 
function uploud(){

	$nameFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	//cek apakah data terkirim
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
				</script>";
		return false;
	}
}



function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM pegawai WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapusalat($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_alat WHERE id = $id");
	return mysqli_affected_rows($conn);
}




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



function registrasi($data){
	global $conn;


	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	// $password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$level = mysqli_real_escape_string($conn, $data["level"]);


	//cek username udah ada belum
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if ( mysqli_fetch_assoc ($result)) {
		echo "
			<script>
				alert('username telah terdaftar')
			</script>
		";
		return false;
	}

	// //cek konfirmasi password
	// if ( $password !== $password2) {
	// 	echo "
	// 		<script>
	// 			alert('Password tidak sesuai');
	// 		</script>
	// 	";
	// 	return false;
	// }


	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password', '$level')");

	return mysqli_affected_rows($conn);



}



 ?>