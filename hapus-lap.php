<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}

require 'functionslap.php';


$id = $_GET["id"];

if(hapuslap($id) > 0){
	echo "
			<script>
			alert('data berhasil dihapus');
			document.location.href = 'laporan.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('data gagal dihapus');
			document.location.href = 'laporan.php';
			</script>
		";
}


 ?>