<?php
error_reporting(0);
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'dbtravel';
$connect = mysqli_connect($host, $user, $pass, $db);
if ($connect){
	$message = 'Koneksi berhasil';
}
else{
	$message = 'Koneksi gagal: ';
	$error = mysqli_connect_error();
	$no_error = mysqli_connect_errno();
	include '../view/error/error.php';
}
// echo "$message";
?>