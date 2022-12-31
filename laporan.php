<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}

require 'functionslap.php';


$lap = query("SELECT * FROM laporan");

//jika tombol cari di klik
if (isset($_POST["cari"])) {
		$lap = carilap($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan monitoring peralatan</title>
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
	 <?php include 'header.php' ?>
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
	

	<h1>Laporan harian monitoring peralatan</h1>
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
	<a href="tambah-lap.php" class="tambah btn btn-primary">Tambahkan data </a> <a href="cetak2.php" target="_blank" class=" btn btn-primary">Cetak</a>
	<br><br>

	<form action="" method="post" class="form-cari">
		<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">cari</button>
		<img src="img/loader.gif" class="loader">

	</form>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

	<table border="1" cellpadding="10", cellspacing="0">
		<tr class="">
			<th>No.</th>
			<!-- <th>Gambar</th> -->
			<th>Tanggal</th>
			<th>Jam (WIB)</th>
			<th>Nama</th>
      <th>Nama alat</th>
      <th>No serial</th>
			<th>Keterangan</th>
			<th class="aksi">Aksi</th>
		</tr>
		</thead>


		<?php $i = 1; ?>
		<?php foreach ($lap as $row ) : ?>
			

		<tr>
			<td><?= $i ?></td>
			<!-- <td><img src="img/munir.jpeg" width="50" ></td> -->
			<!-- <td><img src="img/ <?= $row["gambar"]; ?>" width="50" ></td -->
			<td><?= $row["tanggal"] ?></td>
			<td><?= $row["jam"] ?></td>
      <td><?= $row["nama"] ?></td>
      <td><?= $row["namaalat"] ?></td>
      <td><?= $row["noserial"] ?></td>
			<td><?= $row["keterangan"] ?></td>
			<td class="aksi">
				<a href="ubah-lap.php? id=<?= $row["id"]; ?>" class="btn btn-warning">ubah</a> |
				<a href="hapus-lap.php? id=<?= $row["id"]; ?>" onclick="return confirm('apakah data ingin dihapus ?');" class="btn btn-danger">hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	 </table>
  </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
</html>