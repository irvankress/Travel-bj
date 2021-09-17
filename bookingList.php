<?php session_start();

if(isset($_SESSION['username'])){

	//koneksi terpusat
	include "config/koneksi.php";
	$username=$_SESSION['username'];
	
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
    
    <!-- ---------------------------------------- ISI TAB ------------------------------------- -->
    <div class="container grid">
		<div class="row">
				<table class="table striped">
                	<thead>
                    	<tr class="info fg-white">
                        	<th class="text-left">ID Pesan</th>
                            <th class="text-left">Tanggal Pesan</th>
                            <th class="text-left">Tanggal Tour</th>
                            <th class="text-left">Alamat Penjemputan</th>
                            <th class="text-left">Tipe Perjalanan</th>
                            <th class="text-left">status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $query  =mysqli_query($connect,"SELECT * FROM tbl_user WHERE username='$username'");
                    while ($row=mysqli_fetch_array($query)) {
                        
						$comot=mysqli_query($connect,"SELECT * FROM tbl_pesan WHERE id_user='$row[id_user]'");
						
						while($isi_tbl=mysqli_fetch_array($comot))
						{
						
					?>
                    	<tr>
                        	<td>BJ-00<?php echo $isi_tbl['id_pesan']; ?></td>
                            <td><?php echo $isi_tbl['tgl_pesan']; ?></td>
                            <td><?php echo $isi_tbl['tgl_tour']; ?></td>
                            <td><?php echo $isi_tbl['jemput']; ?></td>
                            <td><?php echo $isi_tbl['tipe']; ?></td>
                            <td><?php echo $isi_tbl['status']; ?></td>
                        </tr>
                    <?php
						}}
					?>
                    </tbody>
                    
                </table>
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