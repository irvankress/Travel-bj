<?php session_start();

if(isset($_SESSION['user_admin'])){
	include "../config/koneksi.php";
	$username=$_SESSION['user_admin'];
		
		mysql_query("DELETE FROM tbl_pesan WHERE id_pesan =".$_GET['id']); 
	
	header ("location:cekTransaksi.php");
}
?>