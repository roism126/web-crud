<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}


require 'functionsalat.php';

//koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "monitoring");

//cek apakah tombol submit sudah dipencet
if (isset($_POST["submit"]) ) {
	
	//cek apakah data telah berhasil or no
	if (tambahalat($_POST) >0) {
		// echo "data berhasil ditambahkan";
		echo "
			<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'data-alat.php';
			</script>
		";
	} else{
		// echo "data gagal ditambahkan";
		echo "
			<script>
			alert('data gagal ditambahkan');
			document.location.href = 'data-alat.php';
			</script>
		";
	}
}


	// var_dump(mysqli_affected_rows($conn));
	// if(mysqli_affected_rows($conn) > 0) {
	// 	echo "berhasil";
	// } else {
	// 	echo "gagal!!!";
	// 	echo "<br>";
	// 	echo mysqli_error($conn);
	// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data peralatan operasional</title>
	<?php include 'header.php' ?>
	<link href="css/styles.css" rel="stylesheet" >
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <?php include 'nav.php' ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include 'sidebar.php' ?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
	<h1>Tambah data peralatan operasional</h1>

	 </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">

	<form action="" method="post">
			<div class="form-group">
				<label class="small mb-1" for="nama">Nama </label>
				<input class="form-control py-3" type="text" name="nama" id="nama">
			</div>
	 		<div class="form-group">
				<label class="small mb-1" for="noserial">No serial </label>
				<input class="form-control py-3" type="text" name="noserial" id="noserial">
			</div>
	 		<div class="form-group">
				<label class="small mb-1" for="merk">Merk  </label>
				<input class="form-control py-3" type="text" name="merk" id="merk">
			</div>
	 		<div class="form-group">
				<label class="small mb-1" for="jenis">Jenis </label>
				<input class="form-control py-3" type="text" name="jenis" id="jenis">
			</div>
	 		<div class="form-group">
				<button class="btn btn-primary" type = "submit" name="submit">Tambah data</button>
			</div>
	</form>
	</div>
			 <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	<?php include 'footer.php' ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/script.js"></script>
</body>
</html>