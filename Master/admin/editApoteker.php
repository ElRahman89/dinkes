<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkApoteker.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkApoteker where No= $No")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateApoteker.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>namaApoteker</td>
				<td><input type="text" class="form-control" id="namaApoteker" name="namaApoteker" value="<?php echo $d['namaApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tempatlahirApoteker</td>
				<td><input type="text" class="form-control" id="tempatlahirApoteker" name="tempatlahirApoteker" value="<?php echo $d['tempatlahirApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tgllahirApoteker</td>
				<td><input type="text" class="form-control" id="tgllahirApoteker" name="tgllahirApoteker" value="<?php echo $d['tgllahirApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>alamatApoteker</td>
				<td><input type="text" class="form-control" id="alamatApoteker" name="alamatApoteker" value="<?php echo $d['alamatApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>sipApoteker</td>
				<td><input type="text" class="form-control" id="sipApoteker" name="sipApoteker" value="<?php echo $d['sipApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>namasaranaApoteker</td>
				<td>
				<select name="namasaranaApoteker" id="namasaranaApoteker" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasaranaApoteker']) { //if the province==the user's setting, make it default 
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
				<td>alamatsaranaApoteker</td>
				<td><input type="text" class="form-control" id="alamatsaranaApoteker" name="alamatsaranaApoteker" value="<?php echo $d['alamatsaranaApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>tglcetakApoteker</td>
				<td><input type="text" class="form-control" id="tglcetakApoteker" name="tglcetakApoteker" value="<?php echo $d['tglcetakApoteker'] ?>"></td>
			</tr>
			<tr>
				<td>expApoteker</td>
				<td><input type="text" class="form-control" id="expApoteker" name="expApoteker" value="<?php echo $d['expApoteker'] ?>"></td>
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
