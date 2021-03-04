<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sdmk/sdmkATLM.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from sdmkATLM where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		
		<tr>
			<td>Nama ATLM</td>
			<td><?php echo $d['namaATLM'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir ATLM</td>
			<td><?php echo $d['tempatlahirATLM'] ?></td>
		</tr>
		<tr>
			<td>tanggal Lahir ATLM</td>
			<td><?php echo $d['tgllahirATLM'] ?></td>
		</tr>
		<tr>
			<td>Alamat ATLM</td>
			<td><?php echo $d['alamatATLM'] ?></td>
		</tr>
		<tr>
			<td>SIP</td>
			<td><?php echo $d['sipATLM'] ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td><?php echo $d['namasaranaATLM'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sarana</td>
			<td><?php echo $d['alamatsaranaATLM'] ?></td>
		</tr>
		<tr>
			<td>tanggal Cetak </td>
			<td><?php echo $d['tglcetakATLM'] ?></td>
		</tr>
		
		
		<tr>
			<td>Masa Berlaku</td>
			<td><?php echo $d['expATLM'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>