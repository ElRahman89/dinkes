<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sdmk/sdmkDokter.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkDokter where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama Dokter</td>
			<td><?php echo $d['namaDokter'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir Dokter</td>
			<td><?php echo $d['tempatlahirDokter'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir Dokter</td>
			<td><?php echo $d['tgllahirDokter'] ?></td>
		</tr>
		<tr>
			<td>Alamat Dokter</td>
			<td><?php echo $d['alamatDokter'] ?></td>
		</tr>
		<tr>
			<td>SIP I</td>
			<td><?php echo $d['sip1Dokter'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana I</td>
			<td><?php echo $d['namasarana1Dokter'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana I</td>
			<td><?php echo $d['alamatsarana1Dokter'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak I </td>
			<td><?php echo $d['tglcetak1Dokter'] ?></td>
		</tr>
		<tr>
			<td>SIP II</td>
			<td><?php echo $d['sip2Dokter'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana II</td>
			<td><?php echo $d['namasarana2Dokter'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana II</td>
			<td><?php echo $d['alamatsarana2Dokter'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak II </td>
			<td><?php echo $d['tglcetak2Dokter'] ?></td>
		</tr>
		<tr>
			<td>SIP II</td>
			<td><?php echo $d['sip3Dokter'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana II</td>
			<td><?php echo $d['namasarana3Dokter'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana II</td>
			<td><?php echo $d['alamatsarana3Dokter'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak II </td>
			<td><?php echo $d['tglcetak3Dokter'] ?></td>
		</tr>
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expDokter'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>