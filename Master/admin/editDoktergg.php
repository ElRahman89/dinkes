<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data</h3>
<a class="btn" href="sdmkDoktergg.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from sdmkDoktergg where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>

	<form action="updateDoktergg.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="No" value="<?php echo $d['No'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Doktergg</td>
				<td><input type="text" class="form-control" id="namaDoktergg" name="namaDoktergg" value="<?php echo $d['namaDoktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Kota Lahir Doktergg</td>
				<td><input type="text" class="form-control" id="tempatlahirDoktergg" name="tempatlahirDoktergg" value="<?php echo $d['tempatlahirDoktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Lahir Doktergg</td>
				<td><input type="text" class="form-control" id="tgllahirDoktergg" name="tgllahirDoktergg" value="<?php echo $d['tgllahirDoktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat Doktergg</td>
				<td><input type="text" class="form-control" id="alamatDoktergg" name="alamatDoktergg" value="<?php echo $d['alamatDoktergg'] ?>"></td>
			</tr>
			<tr>
				<td>SIP I Doktergg</td>
				<td><input type="text" class="form-control" id="sip1Doktergg" name="sip1Doktergg" value="<?php echo $d['sip1Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Sarana I Doktergg</td>
				<td>
				<select name="namasarana1Doktergg" id="namasarana1Doktergg" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasarana1Doktergg']) { //if the province==the user's setting, make it default 
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
				<td>Alamat Sarana I Doktergg</td>
				<td><input type="text" class="form-control" id="alamatsarana1Doktergg" name="alamatsarana1Doktergg" value="<?php echo $d['alamatsarana1Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Cetak I Doktergg</td>
				<td><input type="text" class="form-control" id="tglcetak1Doktergg" name="tglcetak1Doktergg" value="<?php echo $d['tglcetak1Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>SIP II Doktergg</td>
				<td><input type="text" class="form-control" id="sip2Doktergg" name="sip2Doktergg" value="<?php echo $d['sip2Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Sarana II Doktergg</td>
				<td>
				<select name="namasarana2Doktergg" id="namasarana2Doktergg" class="form-control">
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									foreach($qtabel as $value) {
										if ($value == $d['namasarana2Doktergg']) { //if the province==the user's setting, make it default 
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
				<td>Alamat Sarana II Doktergg</td>
				<td><input type="text" class="form-control" id="alamatsarana2Doktergg" name="alamatsarana2Doktergg" value="<?php echo $d['alamatsarana2Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Cetak II Doktergg</td>
				<td><input type="text" class="form-control" id="tglcetak2Doktergg" name="tglcetak2Doktergg" value="<?php echo $d['tglcetak2Doktergg'] ?>"></td>
			</tr>
			<tr>
				<td>Masa Berlaku Dokter Gigi</td>
				<td><input type="text" class="form-control" id="expDoktergg" name="expDoktergg" value="<?php echo $d['expDoktergg'] ?>"></td>
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
