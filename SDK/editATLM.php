<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkATLM.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkATLM where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateATLM.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>namaATLM</td>
				<td><input type="text" class="form-control" id="namaATLM" name="namaATLM" value="<?php echo $d['namaATLM'] ?>"></td>
			</tr>
			<tr>
				<td>tempatlahirATLM</td>
				<td><input type="text" class="form-control" id="tempatlahirATLM" name="tempatlahirATLM" value="<?php echo $d['tempatlahirATLM'] ?>"></td>
			</tr>
			<tr>
				<td>tgllahirATLM</td>
				<td><input type="text" class="form-control" id="tgllahirATLM" name="tgllahirATLM" value="<?php echo $d['tgllahirATLM'] ?>"></td>
			</tr>
			<tr>
				<td>alamatATLM</td>
				<td><input type="text" class="form-control" id="alamatATLM" name="alamatATLM" value="<?php echo $d['alamatATLM'] ?>"></td>
			</tr>
			<tr>
				<td>sipATLM</td>
				<td><input type="text" class="form-control" id="sipATLM" name="sipATLM" value="<?php echo $d['sipATLM'] ?>"></td>
			</tr>
			<tr>
				<td>namasaranaATLM</td>
				<td><input type="text" class="form-control" id="namasaranaATLM" name="namasaranaATLM" value="<?php echo $d['namasaranaATLM'] ?>"></td>
			</tr>
			<tr>
				<td>alamatsaranaATLM</td>
				<td><input type="text" class="form-control" id="alamatsaranaATLM" name="alamatsaranaATLM" value="<?php echo $d['alamatsaranaATLM'] ?>"></td>
			</tr>
			<tr>
				<td>tglcetakATLM</td>
				<td><input type="text" class="form-control" id="tglcetakATLM" name="tglcetakATLM" value="<?php echo $d['tglcetakATLM'] ?>"></td>
			</tr>
			<tr>
				<td>expATLM</td>
				<td><input type="text" class="form-control" id="expATLM" name="expATLM" value="<?php echo $d['expATLM'] ?>"></td>
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
