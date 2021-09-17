<?php session_start();

if(isset($_SESSION['username'])){

	//koneksi terpusat
	include "config/koneksi.php";
	$username=$_SESSION['username'];
	$id_rekomendasi=$_POST[id_rekomendasi];
	$kota=$_POST[tujuan];

	if(isset($_POST['Submit']))
	{
		mysqli_query($connect,"INSERT INTO tbl_pesan (id_user, jumlah, jemput, tgl_pesan, tgl_tour, tujuan, no_tlp, tipe, status)
				value ('$_POST[id_user]','$_POST[jumlah]','$_POST[jemput]',NOW(),'$_POST[dateTour]','$_POST[tujuan]','$_POST[hp]','tour','Menunggu Verifikasi')") or die(mysql_error());
		
		header("location:bookingList.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">


    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    
    <style>
    </style>

<title>Booking Paket</title>
</head>


<body class="metro">
	<header class="bg-darkCobalt" data-load="atasan.php"></header>
    
    <div class="" data-load="sampul.html"></div>
	
<?php
	$query	=mysqli_query($connect,"SELECT * FROM tbl_user WHERE username='$username'");
	$tampil	=mysqli_fetch_array($query);

	echo "<script language=\"JavaScript\" src=\"comboBox.js\"></script>";
?>
    
    <!-- ---------------------------------------- ISI TAB ------------------------------------- -->
    <div class="container">
        <div class="grid">
		<div class="row">
			<div class="span4">
				<legend>Tentukan Tanggal Tour</legend>
                <div class="calendar" id="cal-events"></div>
				<div id="calendar-output2"></div>
            </div>
			<script>
				$(function(){
					var cal = $("#cal-events").calendar({
						multiSelect: false,
						click: function(d){
							var out = $("#dateTour").val("");
							out.val(d);
						}
					});
					cal.calendar('setDate', '2013-10-21');
					cal.calendar('setDate', '2013-10-2');
				})
            </script>
			
            <div class="span6">	
                <form name="formBooking" method="post" action="#">
                    <fieldset>
                        <legend>Silahkan Dilengkapi Form Berikut!</legend>
                        <lable>Nama Lengkap</lable>
                        <div class="input-control text" data-role="input-control">
							<input type="hidden" name="id_user" readonly
							 value="<?php echo $tampil['id_user'];?>">
                            <input type="text" name="nama" readonly
							 value="<?php echo $tampil['nama_user'];?>">
                        </div>
                        <lable>Alamat Penjemputan</lable>
                        <div class="input-control text" data-role="input-control">
							<textarea name="jemput" style="width: 100%;"></textarea>
                        </div>
                        <br><br>
						<lable>Tanggal Keberangkatan</lable>
                        <div class="input-control text" data-role="input-control">
                            <input id="dateTour" type="text" name="dateTour" required value="" placeholder="Auto value, Ketika Kalender diklik">
                            <button class="btn-clear" tabindex="-1"></button>
                        </div>
						
						<label>Kota Tujuan</label>
                        <div class="input-control text" data-role="input-control">
							<input type="hidden" name="tujuan" readonly
							 value="<?php echo $id_rekomendasi ?>">
                            <input type="text" readonly value="<?php echo $kota ?>">
                        </div>
				
						<label>Jumlah Pesanan</label>
                        <div class="input-control text" data-role="input-control">	
                        <input type="text" name="jumlah" readonly value="30">
                        </div>
						<lable>Nomer Tlp.</lable>
                        <div class="input-control text" data-role="input-control">
							<input type="text" name="hp" >
                        </div>					
                        <input type="submit" name="Submit" value="Pesan">
                    </fieldset>
                </form>
            </div>
		</div>
        </div>
    </div>
    <!-- ---------------------------------------- ISI TAB ------------------------------------- -->
    
    <footer class="dark" data-load="bawahan.html"></footer>
</body>
</html>
<?php
}else{
	session_destroy();
	header('Location:formRegistrasi.php?status=Silahkan Login');
}
?>