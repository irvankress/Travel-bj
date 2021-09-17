<?php session_start();

if(isset($_SESSION['user_admin'])){

	//koneksi terpusat
	include "../config/koneksi.php";
	$username	=$_SESSION['user_admin'];
	$level		=$_SESSION['level'];
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style type="text/css"></style>

</head>

<body>

    <div id="wrapper">
		
		<?php
			if($level=='admin'){
				include"nav.php";
			}else if($level=='operator'){
				include"nav_operator.php";
			}else{
				echo "Anda tidak punya hak access!! Hayoo!! sapa Loe??";
			}
		?>

        <div id="page-wrapper">
        	<div class="row col-lg-12">
            	<h1 class="page-header">Dashboard <?php echo $level; ?></h1>
            </div>
            
            <div class="row">
            
            <div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">
                	<i class="fa fa-bar-chart-o fa-fw"></i> Transaksi Terkini
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
                        <table class="table table-hover table-striped" id="dataTables-transaksi">
                            <thead>
                                <tr>
                                    <th class="text-left">ID</th>
                                    <th class="text-left">Tgl Pesan</th>
                                    <th class="text-left">Tgl Tour</th>
                                    <th class="text-left">Nama Pelanggan</th>
                                    <th class="text-left">Status</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                                $comot=mysqli_query($connect,"SELECT * FROM tbl_pesan, tbl_user, tbl_kota WHERE
                                                        tbl_pesan.id_user=tbl_user.id_user AND tbl_pesan.tujuan=tbl_kota.id_kota ORDER BY tgl_pesan DESC LIMIT 5");
                                while($isi_tbl=mysqli_fetch_array($comot))
                                {
                                $now= date("Y-m-d");
                            ?>
                                <tr>
                                    <td><?php echo $isi_tbl['id_pesan'] ?></td>
                                        <td><?php echo $isi_tbl['tgl_pesan']; ?></td>
                                        <td><?php
                                        if($isi_tbl['tgl_tour']<$now){
                                            $txtS="Kadaluarsa!!";
                                            echo "<div class='tooltip-demo'><span data-toggle='tooltip' data-placement='top' title='".$txtS."'><div class='text-danger'><i class='fa fa-warning'></i>&nbsp".$isi_tbl['tgl_tour']."</div></span></div>";
                                        }else{
                                            echo $isi_tbl['tgl_tour']; 
                                        }?></td>
                                        <td><?php echo $isi_tbl['nama_user']; ?></td>
                                        <td><?php echo $isi_tbl['status']; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            
                        </table>
                	</div>
                </div>
            </div>
			<!------------------------------------------------------------------------------------------------>
			
            </div>
            
		
			<div class="col-lg-8">
            
            </div>
            
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
	<script>
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
	</script>
</body>

</html>
<?php
}else{
	session_destroy();
	header('Location:index.php?status=Silahkan Login');
}
?>