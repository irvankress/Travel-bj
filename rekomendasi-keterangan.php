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
                
                    <fieldset>
                        <legend>Berdasarkan</legend>
                        <lable>Dana</lable>
                        <p><b><?php echo "$_POST[dana]"; ?></b></p>
                        
                        <label>Kota Tujuan</label>
                        <p><b><?php echo "$_POST[tujuan]"; ?></b></p>

                        <legend>Rekomendasi Anda</legend>                       
                            
							<?php
								$query = "SELECT * FROM tbl_rekomendasi WHERE dana<='$_POST[dana]' AND kota='$_POST[tujuan]'";
								$result = mysqli_query($connect,$query);
								while ($set=mysqli_fetch_array($result))
								{
                                    echo "<label>Kota Tujuan</label>";
                                    echo "<p>$set[kota]</p>";
                                    echo "<lable>Dana</lable>";
                                    echo "<p>$set[dana]</p>";
									echo "<p>$set[keterangan]</p>";
							?>
                            <img src="images/rekomendasi/<?php echo $set['gambar']; ?>">
						<form name="fromrek" method="post" action="rekomendasi-pesan.php">
						<input type="hidden" name="id_rekomendasi" value="<?php echo $set['id_rekomendasi'] ?>">
						<input type="hidden" name="tujuan" value="<?php echo $set['kota'] ?>">	
                        <input type="submit" name="kirim" value="Pesan">
						</form>
						<?php } ?>
                    </fieldset>
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