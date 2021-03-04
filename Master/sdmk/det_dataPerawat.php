<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sdmk/sdmkPerawat.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkPerawat where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama Perawat</td>
			<td><?php echo $d['namaPerawat'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir Perawat</td>
			<td><?php echo $d['tempatlahirPerawat'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir Perawat</td>
			<td><?php echo $d['tgllahirPerawat'] ?></td>
		</tr>
		<tr>
			<td>Alamat Perawat</td>
			<td><?php echo $d['alamatPerawat'] ?></td>
		</tr>
		<tr>
			<td>SIP</td>
			<td><?php echo $d['sipPerawat'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td><?php echo $d['namasaranaPerawat'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana</td>
			<td><?php echo $d['alamatsaranaPerawat'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak </td>
			<td><?php echo $d['tglcetakPerawat'] ?></td>
		</tr>
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expPerawat'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>