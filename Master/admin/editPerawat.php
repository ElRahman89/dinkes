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
				<td>
				<select name="namasaranaPerawat" id="namasaranaPerawat" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasaranaPerawat']) { //if the province==the user's setting, make it default 
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
