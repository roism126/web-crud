<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}

require 'functionsalat.php';


$id = $_GET["id"];

if(hapusalat($id) > 0){
	echo "
			<script>
			alert('data berhasil dihapus');
			document.location.href = 'data-alat.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('data gagal dihapus');
			document.location.href = 'data-alat.php';
			</script>
		";
}


 ?>