<?php 
session_start();

$_SESSION = [];
session_unset();

session_destroy();

setcookie('noseri', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");


 ?>