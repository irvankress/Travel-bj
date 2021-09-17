<?php session_start();
include "config/koneksi.php";
if(isset($_SESSION['username'])){

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
            <div class="span6">
                <form name="formBooking" method="post" action="rekomendasi-keterangan.php">
                    <fieldset>
                        <legend>Silahkan Dilengkapi Form Berikut!</legend>
                        <lable>Dana</lable>
                        <div class="input-control text" data-role="input-control">
							<input type="text" name="dana" >
                        </div>
						
						<label>Kota Tujuan</label>
                        <div class="input-control select" data-role="input-control">						
							<select name='tujuan' onChange='DinamisDaerah(this);' class="cmb">
							<option value="">--Pilih Tujuan-</option>
							<?php
								$query = "select DISTINCT kota FROM tbl_rekomendasi";
								$result = mysqli_query($connect,$query);
                                $no=0;
								while ($set=mysqli_fetch_array($result))
								{
                                 echo "<option value=$set[kota]>$set[kota]</option>";
								} 
                                $no++;
								echo"</select>";
							?>
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