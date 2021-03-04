<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkDokter.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkDokter where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateDokter.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Dokter</td>
				<td><input type="text" class="form-control" id="namaDokter" name="namaDokter" value="<?php echo $d['namaDokter'] ?>"></td>
			</tr>
			<tr>
				<td>Kota Lahir Dokter</td>
				<td><input type="text" class="form-control" id="tempatlahirDokter" name="tempatlahirDokter" value="<?php echo $d['tempatlahirDokter'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Lahir Dokter</td>
				<td><input type="text" class="form-control" id="tgllahirDokter" name="tgllahirDokter" value="<?php echo $d['tgllahirDokter'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat Dokter</td>
				<td><input type="text" class="form-control" id="alamatDokter" name="alamatDokter" value="<?php echo $d['alamatDokter'] ?>"></td>
			</tr>
			<tr>
				<td>SIP I Dokter</td>
				<td><input type="text" class="form-control" id="sip1Dokter" name="sip1Dokter" value="<?php echo $d['sip1Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Sarana I Dokter</td>
				<td>
				<select name="namasarana1Dokter" id="namasarana1Dokter" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasarana1Dokter']) { //if the province==the user's setting, make it default 
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
				<td>Alamat Sarana I Dokter</td>
				<td><input type="text" class="form-control" id="alamatsarana1Dokter" name="alamatsarana1Dokter" value="<?php echo $d['alamatsarana1Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Cetak I Dokter</td>
				<td><input type="text" class="form-control" id="tglcetak1Dokter" name="tglcetak1Dokter" value="<?php echo $d['tglcetak1Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>SIP II Dokter</td>
				<td><input type="text" class="form-control" id="sip2Dokter" name="sip2Dokter" value="<?php echo $d['sip2Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Sarana II Dokter</td>
				<td>
				<select name="namasarana2Dokter" id="namasarana2Dokter" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasarana2Dokter']) { //if the province==the user's setting, make it default 
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
				<td>Alamat Sarana II Dokter</td>
				<td><input type="text" class="form-control" id="alamatsarana2Dokter" name="alamatsarana2Dokter" value="<?php echo $d['alamatsarana2Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Cetak II Dokter</td>
				<td><input type="text" class="form-control" id="tglcetak2Dokter" name="tglcetak2Dokter" value="<?php echo $d['tglcetak2Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>SIP III Dokter</td>
				<td><input type="text" class="form-control" id="sip3Dokter" name="sip3Dokter" value="<?php echo $d['sip3Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Sarana III Dokter</td>
				<td>
				<select name="namasarana3Dokter" id="namasarana3Dokter" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasarana3Dokter']) { //if the province==the user's setting, make it default 
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
				<td>Alamat Sarana III Dokter</td>
				<td><input type="text" class="form-control" id="alamatsarana3Dokter" name="alamatsarana3Dokter" value="<?php echo $d['alamatsarana3Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Cetak III Dokter</td>
				<td><input type="text" class="form-control" id="tglcetak3Dokter" name="tglcetak3Dokter" value="<?php echo $d['tglcetak3Dokter'] ?>"></td>
			</tr>
			
			<tr>
				<td>expDokter</td>
				<td><input type="text" class="form-control" id="expDokter" name="expDokter" value="<?php echo $d['expDokter'] ?>"></td>
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
