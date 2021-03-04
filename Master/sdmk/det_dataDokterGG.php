<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sdmk/sdmkDoktergg.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkDoktergg where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama Doktergg</td>
			<td><?php echo $d['namaDoktergg'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir Doktergg</td>
			<td><?php echo $d['tempatlahirDoktergg'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir Doktergg</td>
			<td><?php echo $d['tgllahirDoktergg'] ?></td>
		</tr>
		<tr>
			<td>Alamat Doktergg</td>
			<td><?php echo $d['alamatDoktergg'] ?></td>
		</tr>
		<tr>
			<td>SIP I</td>
			<td><?php echo $d['sip1Doktergg'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana I</td>
			<td><?php echo $d['namasarana1Doktergg'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana I</td>
			<td><?php echo $d['alamatsarana1Doktergg'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak I </td>
			<td><?php echo $d['tglcetak1Doktergg'] ?></td>
		</tr>
		<tr>
			<td>SIP II</td>
			<td><?php echo $d['sip2Doktergg'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana II</td>
			<td><?php echo $d['namasarana2Doktergg'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana II</td>
			<td><?php echo $d['alamatsarana2Doktergg'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak II </td>
			<td><?php echo $d['tglcetak2Doktergg'] ?></td>
		</tr>
		
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expDoktergg'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>