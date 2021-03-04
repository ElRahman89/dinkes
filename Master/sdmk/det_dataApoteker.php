<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sdmk/sdmkApoteker.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkApoteker where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama Apoteker</td>
			<td><?php echo $d['namaApoteker'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir Apoteker</td>
			<td><?php echo $d['tempatlahirApoteker'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir Apoteker</td>
			<td><?php echo $d['tgllahirApoteker'] ?></td>
		</tr>
		<tr>
			<td>Alamat Apoteker</td>
			<td><?php echo $d['alamatApoteker'] ?></td>
		</tr>
		<tr>
			<td>SIP</td>
			<td><?php echo $d['sipApoteker'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td><?php echo $d['namasaranaApoteker'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana</td>
			<td><?php echo $d['alamatsaranaApoteker'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak </td>
			<td><?php echo $d['tglcetakApoteker'] ?></td>
		</tr>
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expApoteker'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>