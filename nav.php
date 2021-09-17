<?php 
session_start();
	
	include "../config/koneksi.php";
	$username=$_SESSION['user_admin'];
	
	$comot_admin=mysqli_query($connect,"select nama from tbl_admin where user_admin='$username'");   
	$ngisi_admin=mysqli_fetch_array($comot_admin);
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">Admin Page</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $ngisi_admin['nama']; ?>
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>

        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li><a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <li><a href="cekTransaksi.php"><i class="fa fa-book fa-fw"></i> Validasi</a>
                    <li><a href="printTransaksi.php"><i class="fa fa-print"></i> Cetak pesan</a>
                
                <li class="dropdown-header">Setup Konten</li>
                <li><a href="setupBeranda.php"><i class="fa fa-home fa-fw"></i> Setup Beranda</a>
                <li><a href="setupTujuan.php"><i class="fa fa-map-marker"></i> Setup Kota Tujuan</a>
                <li><a href="setupRekomendasi.php"><i class="fa fa-star" aria-hidden="true"></i> Setup Rekomendasi</a>


            </ul>
            <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>