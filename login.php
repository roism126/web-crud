<?php 
session_start();
require 'functions.php';


//cek cookie
// if ( isset($_COOKIE['login'])) {
// 	if ($_COOKIE['login'] == 'true') {
// 		$_SESSION['login'] = true;
// 	}
// }

//cek cookie
if ( isset($_COOKIE['noseri']) && isset($_COOKIE['key']) ) {
	$noseri = $_COOKIE['noseri'];
	$key = $_COOKIE['key'];
	
	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE 
		id = $noseri");
	$row = mysqli_fetch_assoc($result);


	//cek cookie dan username
	if ($key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}



if (isset($_SESSION["login"])) {
	header("Location:index.php");
	exit();
}





if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' " );

	//cek username
	if ( mysqli_num_rows($result) === 1 ) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if ($row['level']=="user") {
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "user";
		$_SESSION["login"] = true;
		header("Location:user/index.php");
		exit;
		}
		else if ($row['level']=="admin") {
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "admin";
		$_SESSION["login"] = true;
		header("Location:index.php");
		exit;
		}


		// if($row['level'] == "admin" && password_verify($password, $row["password"] ) 
	 // ) {
		// 	//set session
		// 	$_SESSION["login"] = true;


		// 	//cek remember me
		// 	if ( isset($_POST['remember']) ) {
		// 		//buat cookie
		// 		setcookie('noseri', $row['id'], time()+60 );
		// 		setcookie('key',hash('sha256', $row['username']),  time()+60 );
		// 		// setcookie('login', 'true', time()+60);

		// 	}


		// 	header("Location:index.php");
		// 	exit;
		// }

	//cek username
	// else ( mysqli_num_rows($result) === 1 && ($row['level'] == "user" && password_verify($password, $row["password"] ) 
	// )  ) {
	// 	//cek password
	// 	// $row = mysqli_fetch_assoc($result);

	// 		//set session
	// 		$_SESSION["login"] = true;


	// 		// //cek remember me
	// 		// if ( isset($_POST['remember']) ) {
	// 		// 	//buat cookie
	// 		// 	setcookie('noseri', $row['id'], time()+60 );
	// 		// 	setcookie('key',hash('sha256', $row['username']),  time()+60 );
	// 		// 	// setcookie('login', 'true', time()+60);

	// 		// }


	// 		header("Location:indeks.php");
	// 		exit;
	// 	}
}
	$error = true;


}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Halaman Login </title>
 	<link href="css/styles.css" rel="stylesheet" >
 	<style>
 		.tulisanerror{
 			color: red; 
 			font-style: italic;
 			text-align: center;
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
 	<h1 class="text-center font-weight-light my-2">Login</h1>
 </div>

 <?php 
 if (isset($error) ) : ?>
  	<p class="tulisanerror" >username / password salah </p>
  <?php endif; ?>

  	<div class="card-body">
	 	<form action="" method="post">
	 		
	 		<div class="form-group">	
	 			<label class="small mb-1" for="username">Username  </label>
	 			<input class="form-control py-3" type="text" name="username" id="username" autocomplete="off">
	 		</div>
	 		<div class="form-group">	
	 			<label class="small mb-1" for="password">Password  </label>
	 			<input class="form-control py-3" type="password" name="password" id="password">
	 		</div>
	 		<div class="form-group">	
	 			<input type="checkbox" name="remember" id="remember">
	 			<label for="remember">Remember me </label>
	 		</div>	
	 		<div class="form-group">	
	 			<button class="btn btn-primary" type="submit" name="login">Login</button>
			 					</div>
	 	</form>
	 						</div>
	 				 <div class="card-footer text-center">
                           <div class="small"><a href="registrasi.php">Need an account? Sign up!</a></div>
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