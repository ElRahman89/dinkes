<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkAssApoteker.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkAssApoteker where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateAssApoteker.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>namaAssApoteker</td>
				<td><input type="text" class="form-control" id="namaAssApoteker" name="namaAssApoteker" value="<?php echo $d['namaAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tempatlahirAssApoteker</td>
				<td><input type="text" class="form-control" id="tempatlahirAssApoteker" name="tempatlahirAssApoteker" value="<?php echo $d['tempatlahirAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tgllahirAssApoteker</td>
				<td><input type="text" class="form-control" id="tgllahirAssApoteker" name="tgllahirAssApoteker" value="<?php echo $d['tgllahirAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>alamatAssApoteker</td>
				<td><input type="text" class="form-control" id="alamatAssApoteker" name="alamatAssApoteker" value="<?php echo $d['alamatAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>sipAssApoteker</td>
				<td><input type="text" class="form-control" id="sipAssApoteker" name="sipAssApoteker" value="<?php echo $d['sipAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>namasaranaAssApoteker</td>
				<td>
				<select name="namasaranaAssApoteker" id="namasaranaAssApoteker" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasaranaAssApoteker']) { //if the province==the user's setting, make it default 
										  echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
										} else { //else, echo it as regular
										  echo '<option value="'.$value.'">'.$value.'</option>';
										}
									  }
									// echo '<option value="'.$d['namasaranaApoteker'].'" selected="selected">'.$qtabel['namaKlinik'].'</option>';				
								}
								?>
				</select>
				</td>
			</tr>
			<tr>
				<td>alamatsaranaAssApoteker</td>
				<td><input type="text" class="form-control" id="alamatsaranaAssApoteker" name="alamatsaranaAssApoteker" value="<?php echo $d['alamatsaranaAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tglcetakAssApoteker</td>
				<td><input type="text" class="form-control" id="tglcetakAssApoteker" name="tglcetakAssApoteker" value="<?php echo $d['tglcetakAssApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>expAssApoteker</td>
				<td><input type="text" class="form-control" id="expAssApoteker" name="expAssApoteker" value="<?php echo $d['expAssApoteker'] ?>"></td>
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
