<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkPerawat.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkperawat where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updatePerawat.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>namaPerawat</td>
				<td><input type="text" class="form-control" id="namaPerawat" name="namaPerawat" value="<?php echo $d['namaPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>tempatlahirPerawat</td>
				<td><input type="text" class="form-control" id="tempatlahirPerawat" name="tempatlahirPerawat" value="<?php echo $d['tempatlahirPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>tgllahirPerawat</td>
				<td><input type="text" class="form-control" id="tgllahirPerawat" name="tgllahirPerawat" value="<?php echo $d['tgllahirPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>alamatPerawat</td>
				<td><input type="text" class="form-control" id="alamatPerawat" name="alamatPerawat" value="<?php echo $d['alamatPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>sipPerawat</td>
				<td><input type="text" class="form-control" id="sipPerawat" name="sipPerawat" value="<?php echo $d['sipPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>namasaranaPerawat</td>
				<td><input type="text" class="form-control" id="namasaranaPerawat" name="namasaranaPerawat" value="<?php echo $d['namasaranaPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>alamatsaranaPerawat</td>
				<td><input type="text" class="form-control" id="alamatsaranaPerawat" name="alamatsaranaPerawat" value="<?php echo $d['alamatsaranaPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>tglcetakPerawat</td>
				<td><input type="text" class="form-control" id="tglcetakPerawat" name="tglcetakPerawat" value="<?php echo $d['tglcetakPerawat'] ?>"></td>
			</tr>
			<tr>
				<td>expPerawat</td>
				<td><input type="text" class="form-control" id="expPerawat" name="expPerawat" value="<?php echo $d['expPerawat'] ?>"></td>
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
