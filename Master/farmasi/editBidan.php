<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkBidan.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$idBidan=mysqli_real_escape_string($conn, $_GET['idBidan']);
$det=mysqli_query($conn, "SELECT * from sdmkBidan where idBidan='$idBidan'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateBidan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="idBidan" value="<?php echo $d['idBidan'] ?>"></td>
			</tr>
			<tr>
				<td>Surat_ijin_kerja_bidan</td>
				<td><input type="text" class="form-control" id="Surat_ijin_kerja_bidan" name="Surat_ijin_kerja_bidan" value="<?php echo $d['Surat_ijin_kerja_bidan'] ?>"></td>
			</tr>
			<tr>
				<td>Nama_Bidan</td>
				<td><input type="text" class="form-control" id="Nama_Bidan" name="Nama_Bidan" value="<?php echo $d['Nama_Bidan'] ?>"></td>
			</tr>
			<tr>
				<td>tlBidan</td>
				<td><input type="text" class="form-control" id="tlBidan" name="tlBidan" value="<?php echo $d['tlBidan'] ?>"></td>
			</tr>
			<tr>
				<td>tglBidan</td>
				<td><input type="text" class="form-control" id="tglBidan" name="tglBidan" value="<?php echo $d['tglBidan'] ?>"></td>
			</tr>
			<tr>
				<td>alamatBidan</td>
				<td><input type="text" class="form-control" id="alamatBidan" name="alamatBidan" value="<?php echo $d['alamatBidan'] ?>"></td>
			</tr>
			<tr>
				<td>kotaBidan</td>
				<td><input type="text" class="form-control" id="kotaBidan" name="kotaBidan" value="<?php echo $d['kotaBidan'] ?>"></td>
			</tr>
			<tr>
				<td>nomorstrBidan</td>
				<td><input type="text" class="form-control" id="nomorstrBidan" name="nomorstrBidan" value="<?php echo $d['nomorstrBidan'] ?>"></td>
			</tr>
			<tr>
				<td>namasaranaBidan</td>
				<td><input type="text" class="form-control" id="namasaranaBidan" name="namasaranaBidan" value="<?php echo $d['namasaranaBidan'] ?>"></td>
			</tr>
			<tr>
				<td>alamatsaranaBidan</td>
				<td><input type="text" class="form-control" id="alamatsaranaBidan" name="alamatsaranaBidan" value="<?php echo $d['alamatsaranaBidan'] ?>"></td>
			</tr>
			<tr>
				<td>kotasaranaBidan</td>
				<td><input type="text" class="form-control" id="kotasaranaBidan" name="kotasaranaBidan" value="<?php echo $d['kotasaranaBidan'] ?>"></td>
			</tr>
			<tr>
				<td>masaberlakuBidan</td>
				<td><input type="text" class="form-control" id="masaberlakuBidan" name="masaberlakuBidan" value="<?php echo $d['masaberlakuBidan'] ?>"></td>
			</tr>
			<tr>
				<td>tglcetakBidan</td>
				<td><input type="text" class="form-control" id="tglcetakBidan" name="tglcetakBidan" value="<?php echo $d['tglcetakBidan'] ?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit2" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
}
?>
<?php include 'footer.php'; ?>
