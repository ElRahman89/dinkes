<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../admin/sdmkAssApoteker.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkAssApoteker where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama AssApoteker</td>
			<td><?php echo $d['namaAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir AssApoteker</td>
			<td><?php echo $d['tempatlahirAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir AssApoteker</td>
			<td><?php echo $d['tgllahirAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>Alamat AssApoteker</td>
			<td><?php echo $d['alamatAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>SIP</td>
			<td><?php echo $d['sipAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td><?php echo $d['namasaranaAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana</td>
			<td><?php echo $d['alamatsaranaAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak </td>
			<td><?php echo $d['tglcetakAssApoteker'] ?></td>
		</tr>
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expAssApoteker'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>