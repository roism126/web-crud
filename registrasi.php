<?php
require 'functions.php';

	if(isset($_POST["register"]) ) {
		if(registrasi($_POST) > 0 ) {
		echo "<script>
			alert ('user baru telah ditambahkan');

				</script>";
	} else {
		echo mysqli_error($conn);
	}
	
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman registrasi</title>
	<link href="css/styles.css" rel="stylesheet" >
	<style>
		label {
			display: block;
		}

	</style>
</head>
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
            	<main>
            	<div class="container">
            		<div class="row justify-content-center">
                            <div class="col-lg-5">
                            	<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header">
<h1 class="text-center font-weight-light my-2">Registrasi</h1>
</div>

<div class="card-body">
<form action="" method="post">
		<div class="form-group">
			<label class="small mb-1" for="username">Username </label>
			<input class="form-control py-3" type="text" name="username" id="username" autocomplete="off">
		</div>
	 	<div class="form-group">
			<label class="small mb-1" for="password">Password </label>
			<input class="form-control py-3" type="password" name="password" id="password">
		<!-- </div>	
	 		<div class="form-group">
			<label class="small mb-1" for="password2">Ulangi password </label>
			<input class="form-control py-3" type="password" name="password2" id="password2">
		</div> -->
		<div class="form-group">
			<label class="small mb-1" for="level">level (isi dengan user)</label>
			<input class="form-control py-3" type="text" name="level" id="level">
		</div>	
	 	<div class="form-group">
			<button class="btn btn-primary" type="submit" name="register">Register</button>
		</div>
	</form>
	 <div class="card-footer text-center">
                           <div class="small"><a href="login.php">Kembali</a></div>
							</div>
			 			</div>
			 		</div>
			 	</div>
		 	</div>
		 	</main>
	 	</div>
	 	<div id="layoutAuthentication_footer">
	 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tugas WEB Aplikasi Database Rois_Ins7B</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

</body>
</html>
