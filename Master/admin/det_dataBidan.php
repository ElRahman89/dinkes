<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../admin/sdmkBidan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$idBidan=mysqli_real_escape_string($conn, $_GET['idBidan']);


$det=mysqli_query($conn, "SELECT * from sdmkbidan where idBidan='$idBidan'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Surat Ijin Kerja bidan</td>
			<td><?php echo $d['Surat_ijin_kerja_bidan'] ?></td>
		</tr>
		<tr>
			<td>Nama Bidan</td>
			<td><?php echo $d['Nama_Bidan'] ?></td>
		</tr>
		<tr>
			<td>Kota Kelahiran</td>
			<td><?php echo $d['tlBidan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo $d['tglBidan'] ?></td>
		</tr>
		<tr>
			<td>Alamat tinggal</td>
			<td><?php echo $d['alamatBidan'] ?></td>
		</tr>
		<tr>
			<td>Kota tinggal</td>
			<td><?php echo $d['kotaBidan'] ?></td>
		</tr>
		<tr>
			<td>Nomor STR Bidan</td>
			<td><?php echo $d['nomorstrBidan'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td><?php echo $d['namasaranaBidan'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana</td>
			<td><?php echo $d['alamatsaranaBidan'] ?></td>
		</tr>
		
		<tr>
			<td>Masa Berlaku Berlaku</td>
			<td><?php echo $d['masaberlakuBidan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Cetak</td>
			<td><?php echo $d['tglcetakBidan'] ?></td>
		</tr>
		
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>