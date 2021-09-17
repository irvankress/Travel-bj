<?php session_start();

if(isset($_SESSION['user_admin'])){

	//koneksi terpusat
	include "../config/koneksi.php";
	$username	=$_SESSION['user_admin'];
	$level		=$_SESSION['level'];
	
	
	if(isset($_POST['Tambah'])){
		mysqli_query($connect,"INSERT INTO tbl_kota (id_kota, kota) value ('', '$_POST[kota]')") or die(mysqli_error());
		
	}
	
	else if(isset($_POST['Edit'])){		
			mysqli_query($connect,"UPDATE tbl_kota SET kota ='$_POST[kota]' WHERE id_kota = '$_POST[id]'");
		}
	
	else if(isset($_POST['Delete'])){
		mysqli_query($connect,"DELETE FROM tbl_kota WHERE id_kota = '$_POST[id]'");
	
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Kota Tujuan</title>
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Setup Tujuan</h3></div>
                    <div class="panel-body">
                        <div class="row col-lg-10">
                        	<form name="setupBeranda" action="setupTujuan.php" method="post" enctype="multipart/form-data">
							<?php
                                if (isset($_GET['id']))
                                {
                                $comot_id=mysqli_query($connect,"select * from tbl_kota where id_kota=".$_GET['id']);   
                                $ngisi=mysqli_fetch_row($comot_id);
                                }                       
                            ?>
                                <fieldset>
                                    <input name="id" type="hidden" value="<?php echo $ngisi[0]; ?>">
                                	<div class="form-group">
                                    	<label>Kota Tujuan</label>
                                        <input class="form-control" name="kota" type="text" placeholder="Input nama Kota" 
                                        	value="<?php echo $ngisi[1]; ?>" required>
                                    </div>
                                	<?php
                                        if (isset($_GET['id'])){
                                    ?>			
                                	<div class="btn-group">
                                    <input name="Tambah" type="submit" value="Tambah" class="btn" disabled>
                                    </div>
                                	<div class="btn-group">
                                    <input name="Edit" type="submit" value="Ubah" class="btn btn-info" data-hint="Klik untuk Hapus Post">
                                    <input name="Delete" type="submit" value="Hapus" class="btn btn-danger" data-hint="Klik untuk Edit Post">
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                	<div class="btn-group">
                                    <input name="Tambah" type="submit" value="Tambah" class="btn btn-success" data-hint="Klik untuk Tambah Post">
                                    </div>
                                	<div class="btn-group">
                                    <input name="Edit" type="submit" value="Ubah" class="btn" disabled>
                                    <input name="Delete" type="submit" value="Hapus" class="btn" disabled>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <div class="row col-lg-10">
                        	<table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">#</th>
                                        <th class="text-left">Kota Tujuan</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
									$no=1;
                                    $comot=mysqli_query($connect,"SELECT * FROM tbl_kota ORDER BY id_kota DESC");
                                    while($isi_tbl=mysqli_fetch_row($comot))
                                    {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $isi_tbl[1]; ?></td>
                                        <td>
                                        <div class="tooltip-demo">
                                            <a href="setupTujuan.php?id=<?php echo $isi_tbl[0]; ?>"><button type="button" class="btn btn-primary btn-xs"data-toggle="tooltip" data-placement="top" title="Edit/Hapus Content Beranda" style="float: right;"><i class="fa fa-wrench"></i></button></a>
                                   		</div>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                
                            </table>
                        </div>
					</div>
                    
                </div>
                <!--.panel end -->
			</div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script>
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
	<!-- tinyMCE-->
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
    tinymce.init({
            selector: "textarea",
            plugins: [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template textcolor paste textcolor filemanager"
            ],
    
            toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    
            menubar: false,
            toolbar_items_size: 'small',
            image_advtab: true,
            style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
    
            templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
            ]
    });
    </script>
</body>

</html>
<?php
}else{
	session_destroy();
	header('Location:index.php?status=Silahkan Login');
}
?>