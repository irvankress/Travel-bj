<?php
	//koneksi terpusat
	include "../config/koneksi.php";
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>BINTANG JUNIOR TRAVEL</title>
</head>
<body>
	<?php 
		$comot=mysqli_query($connect,"SELECT * FROM tbl_pesan, tbl_user, tbl_kota WHERE
			tbl_pesan.id_user=tbl_user.id_user AND tbl_pesan.tujuan=tbl_kota.id_kota AND
			tbl_pesan.id_pesan='$_GET[id]'");
		while($isi_tbl=mysqli_fetch_array($comot))
	{
	?>
<div style="text-align: center;">
	<h2>BINTANG JUNIOR TRAVEL</h2>
	<p>|Winong, Jatisawit|</p>
	<h3>Tanggal Penjemputan (<?php echo date("d/F/Y", strtotime($isi_tbl['tgl_tour'])); ?>)</h3>
</div>
<div style="margin-right: 20%; margin-left: 20%;">
	<table width="100%">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $isi_tbl['nama_user'] ?></td>
		</tr>
		<tr>
			<td>Alamat Penjemputan</td>
			<td>:</td>
			<td><?php echo $isi_tbl['jemput'] ?></td>
		</tr>
		<tr>
			<td>Tujuan</td>
			<td>:</td>
			<td><?php echo $isi_tbl['kota'] ?></td>
		</tr>
		<tr>
			<td>Nomer Telpon</td>
			<td>:</td>
			<td><?php echo $isi_tbl['no_tlp'] ?></td>
		</tr>
	</table>
<?php 
} 
?>
</div>
</body>
</html>
		<script>
		window.print();
	</script>